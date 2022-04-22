<?php

namespace App\Http\Controllers\Shop;

use App\Admin\CheckOut;
use App\Admin\UserReq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class HomeController extends Controller
{

    public function listCheckOut()
    {
        $shop = auth()->guard('shop')->user();
        $data = $shop->check_out()->get();
        return view('back-end.shop.checkout.list', ['data' => $data]);
    }

    public function listReq()
    {
        $shop = auth()->guard('shop')->user();
        $arr_product = $shop->products()->where('status', 1)->get()->pluck('id')->all();
        $data = UserReq::wherein('product_id', $arr_product)->get();
        return view('back-end.shop.req.list', ['data' => $data]);
    }

    public function checkoutDetail($code, Request $request)
    {
        if ($request->isMethod('post')) {
            // $user = Auth::user();
            $validator = Validator::make($request->all(), [
                'code' => 'required',
                'name' => 'required',
                'phone' => 'required',
                // 'email' => 'required',
                'address' => 'required',
                'status' => 'required|integer',
            ], [
                'code.required' => 'Mã đơn hàng không được để trống',
                'name.required' => 'Tên khách hàng không được để trống',
                'phone.required' => 'Số điện thoại không được để trống',
                'address.required' => 'Địa chỉ không được để trống',
                'status.required' => 'Trạng thái không được để trống',
            ]);

            if ($validator->fails()) {
                Session::flash('error-update', $validator->errors()->first());
                return redirect()->back();
            }
            $data_update = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'status' => $request->status,
            ];
            $updated = CheckOut::where('code', $code)->update($data_update);
            if ($updated) {
                Session::flash('success-update', 'Chỉnh sửa đơn hàng thành công');
                return redirect()->back();
            } else {
                Session::flash('error-update', 'Chỉnh sửa đơn hàng không thành công');
                return redirect()->back();
            }
        }
        $checkout = CheckOut::with(['products', 'products.product'])->where('code', $code)->first();
        return view('back-end.shop.checkout.detail', ['checkout' => $checkout]);
    }

}