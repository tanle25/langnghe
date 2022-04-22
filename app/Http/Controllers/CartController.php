<?php

namespace App\Http\Controllers;

use App\Admin\CartDb;
use App\Admin\CheckOut;
use App\Admin\Product;
use App\Shop;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;

class CartController extends Controller
{
    public function addCartAjax(Request $request)
    {
        $id = $request->input('product_id');
        $qty = $request->input('num');
        $product = Product::find($id);
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $qty,
            'weight' => 0,
            'options' => array(
                'image' => $product->main_image,
                'code' => $product->product_code,
                'sale_off' => $product->sale_off,
                'shop_id' => $product->shop != null ? $product->shop->id : null,
            ),
        ));
        $count = Cart::count();
        return response()->json(['count' => $count]);
    }

    public function changeCartAjax(Request $request)
    {
        $id = $request->input('product_id');
        $qty = $request->input('num');
        $type = $request->input('type');
        $product = Product::find($id);
        if ($type == 'del') {
            $item = Cart::search(function ($cart, $key) use ($id) {
                return $cart->id == $id;
            })->first();
            Cart::remove($item->rowId);
        } else {
            if ($qty == 0) {
                $item = Cart::search(function ($cart, $key) use ($id) {
                    return $cart->id == $id;
                })->first();
                Cart::remove($item->rowId);
            } elseif ($qty > 0) {
                $old_quantity = Cart::get($id)->quantity;
                Cart::update($id, ['qty' => (int) $qty]);
            }
        }
        $carts = Cart::content();
        $html = view('front-end.cart.list', ['carts' => $carts])->render();
        return response(['status' => 1, 'html' => $html]);
    }

    public function hoverCartAjax(Request $request)
    {
        $carts = Cart::content();
        return view('front-end.partials.small-cart', ['carts' => $carts]);
    }

    public function getCart()
    {
        $carts = Cart::content();
        return view('front-end.cart.cart-detail', ['carts' => $carts]);
    }

    public function checkOut()
    {
        $user = auth()->user();
        if (auth()->check()) {
            $carts = CartDb::where('payment_id', null)->where('user_id', $user->id)->get();
        } else {
            $carts = Cart::content();
        }
        return view('front-end.cart.check-out', ['carts' => $carts, 'user' => $user]);
    }

    public function checkOutPost(Request $request)
    {
        $carts = Cart::content();
        if (Cart::count() <= 0) {
            return redirect()->back();
        }
        $data = [];
        $shops = [];
        foreach ($carts as $cart) {
            $id = $cart->id;
            $product = Product::where('id', $id)->where('status', 1)->first();
            if ($product != null) {
                $shop = $product->shop()->where('status', 1)->first();
                if ($shop != null) {

                    if (isset($data[$shop->username])) {
                        $data[$shop->username]['products'][] = [
                            'product_id' => $product->id,
                            'product_code' => $product->code,
                            'price' => isset($product->sale_off) ? $product->sale_off : $product->price,
                            'quantity' => $cart->qty,
                        ];
                        $data[$shop->username]['total'] += floatval($cart->price) * intval($cart->qty);
                    } else {
                        $data[$shop->username] = [];
                        $data[$shop->username]['products'][] = [
                            'product_id' => $product->id,
                            'product_code' => $product->code,
                            'price' => isset($product->sale_off) ? $product->sale_off : $product->price,
                            'quantity' => $cart->qty,
                        ];
                        $data[$shop->username]['total'] = floatval($cart->price) * intval($cart->qty);
                    }
                }
            }
        }
        $checkout = [];
        foreach ($data as $key => $value) {
            $count = CheckOut::where('shop_id', $key)->count();
            $count = $count + 1;
            $_shop = Shop::where('username', $key)->first();
            $code = 'HD-' . $_shop->id . '-' . Carbon::now()->timestamp;
            $_checkout = CheckOut::create([
                'shop_id' => $_shop->id,
                'code' => $code,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'sum' => $value['total'],
                'status' => 0,
            ]);
            foreach ($value['products'] as $index => $product) {
                $_cart = CartDb::create([
                    'product_id' => $product['product_id'],
                    'price' => $product['price'],
                    'order_id' => $_checkout->id,
                    'quantity' => (int) $product['quantity'],
                ]);

            }

            $total_cost = $value['total'];
            $table_body = '';
            foreach ($value['products'] as $index => $product) {
                $product_instance = Product::find($product['product_id']);
                $quantity = $product['quantity'];
                $total = $product['price'] * $product['quantity'] ?? 0;
                $index = $index + 1;
                $table_body .= "
                <tr>
                    <td>{$index}</td>
                    <td>{$product_instance->name}</td>
                    <td>{$quantity}</td>
                    <td>{$total}</td>
                </tr>
                ";
            }

            $table = "
            <table>
                <thead>
                    <tr>
                        <td><strong>TT</strong> </td>
                        <td><strong>Tên sản phẩm</strong></td>
                        <td><strong>Số lượng</strong></td>
                        <td><strong>Thành tiền</strong></td>
                    </tr>
                </thead>
                <tbody>
                    {$table_body}
                    <tr>
                        <td colspan='3'><strong>Tổng tiền</strong></td>
                        <td><strong>{$total_cost}</strong><sup>đ</sup></td>
                    </tr>
                </tbody>
            </table>";

            $email = $_shop->email;
            $title = '[LÀNG NGHỀ THANH HÓA] Đơn hàng : ' . $_checkout->code;
            $subject = '[LÀNG NGHỀ THANH HÓA] Đơn hàng : ' . $_checkout->code;
            $content = 'Khách hàng: ' . $_checkout->name . '<br>';
            $content = $content . 'Số điện thoại: ' . $_checkout->phone . '<br>';
            $content = $content . 'Email: ' . $_checkout->email . '<br>';
            $content = $content . 'Địa chỉ: ' . $_checkout->address . '<br>';
            $content = $content . 'Thực hiện mua đơn hàng với tổng tiền là:' . number_format($_checkout->sum, 0, '.', '.') . ' ₫ <br>';
            $content .= $table;
            send_mail($email, $title, $subject, $content);

            $content = '';
            $customer_mail = $request->email;
            $title = '[LÀNG NGHỀ THANH HÓA] Đơn hàng : ' . $_checkout->code;
            $subject = "[LÀNG NGHỀ THANH HÓA] Đơn hàng : " . $_checkout->code;
            $content = 'Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi <br>';
            $content = 'Tư vấn viên của chúng tôi sẽ liên hệ với quý khách để xác nhận đơn hàng <br>';
            //$content = $content . 'Số điện thoại: ' . $_checkout->phone . '<br>';
            //$content = $content . 'Email: ' . $_checkout->email . '<br>';
            //$content = $content . 'Địa chỉ: ' . $_checkout->address . '<br>';
            $content .= 'Chi tiết đơn hàng của quý khách: <br>';
            $content .= 'Tên cơ sở: ' . $_shop->tencs;
            //$content = $content . 'Thực hiện mua đơn hàng với tổng tiền là:' . number_format($_checkout->sum, 0, '.', '.') . ' ₫ <br>';
            $content .= $table;
            send_mail($customer_mail, $title, $subject, $content);
        }
        Cart::destroy();
        Session::flash('success-user-check-out', 'Bạn đã đăng kí mua hàng thành công.');
        return redirect()->back();
    }
}