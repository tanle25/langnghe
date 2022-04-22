<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Huyen;
use App\Admin\Xa;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterShopRequest as RegisterShopRequest;
use App\Http\Requests\ShopRequest as ShopRequest;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = auth()->guard('admin')->user();
        $shops = Shop::orderby('created_at', 'desc')->orderby('status', 'desc');
        if ($admin->role != 1) {
            $shops = $shops->where('xa', $admin->xa_id);
        }
        $shops = $shops->get();
        return view('back-end.admin.shop.list', ['data' => $shops]);
    }

    public function registerShop(RegisterShopRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $image_1 = $request->file('image_1');
        $image_2 = $request->file('image_2');
        $destinationPath = 'shops/thumbs';

        if ($image_2 != null) {
            $data['image_2'] = Str::random(16) . '.' . $image_2->extension();
            $img = Image::make($image_2->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $data['image_2']);
            $image_2->move(storage_path('app/public/shops/images'), $data['image_2']);
        }
        $data['image'] = Str::random(16) . '.' . $image->extension();
        $data['image_1'] = Str::random(16) . '.' . $image_1->extension();

        $img = Image::make($image->path());
        $img->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $data['image']);
        $image->move(storage_path('app/public/shops/images'), $data['image']);

        $img = Image::make($image_1->path());
        $img->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $data['image_1']);
        $image_1->move(storage_path('app/public/shops/images'), $data['image_1']);

        if (auth()->check()) {
            $data['user_id'] = auth()->user()->id;
        }

        $data['status'] = 2;

        Shop::create($data);
        Session::flash('success-shop', 'Gửi đơn đăng ký thành công ! Vui lòng chờ phản hồi qua email hoặc số điện thoại đã đăng ký.');
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaidns = config('shop.loaidn');
        $nganhqls = config('shop.nganhql');
        $loaigiaytos = config('shop.loaigiayto');
        $quymos = config('shop.quymo');
        $huyens = Huyen::all();
        $xas = Xa::all();
        return view('back-end.admin.shop.create', ['loaidns' => $loaidns, 'nganhqls' => $nganhqls, 'loaigiaytos' => $loaigiaytos, 'quymos' => $quymos, 'huyens' => $huyens, 'xas' => $xas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterShopRequest $request)
    {
        $data = [];
        $data = $request->all();
        $text_password = $data['password'];
        $data['password'] = bcrypt($data['password']);

        $image = $request->file('image');
        $image_1 = $request->file('image_1');
        $image_2 = $request->file('image_2');
        $destinationPath = 'shops/thumbs';

        if ($image_2 != null) {
            $data['image_2'] = Str::random(16) . '.' . $image_2->extension();
            $img = Image::make($image_2->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $data['image_2']);
            $image_2->move(storage_path('app/public/shops/images'), $data['image_2']);
        }
        $data['image'] = Str::random(16) . '.' . $image->extension();
        $data['image_1'] = Str::random(16) . '.' . $image_1->extension();

        $img = Image::make($image->path());
        $img->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $data['image']);
        $image->move(storage_path('app/public/shops/images'), $data['image']);

        $img = Image::make($image_1->path());
        $img->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $data['image_1']);
        $image_1->move(storage_path('app/public/shops/images'), $data['image_1']);

        $data['status'] = 1;
        $data['created_by'] = $admin = auth()->guard('admin')->user()->id;
        Shop::create($data);

        $_msg = "Admin đã tạo thành công gian hàng trên hệ thống https://giaothuong.langnghethanhhoa.vn.<br> Vui lòng truy cập vào hệ thống quản lý qua link: https://giaothuong.langnghethanhhoa.vn/admin <br> Với username : " . $data['username'] . " và password : " . $text_password . "<br>";
        $title = 'Admin đã tạo thành công gian hàng trên hệ thống https://giaothuong.langnghethanhhoa.vn !';
        $subject = 'Admin đã tạo thành công gian hàng trên hệ thống https://giaothuong.langnghethanhhoa.vn !';
        $content = 'Xin chào!<br>' . $_msg . 'Xin cảm ơn !';
        send_mail($data['email'], $title, $subject, $content);
        Session::flash('success-shop', 'Tạo mới cơ sở thành công!');
        return redirect()->route('shop.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
        if ($shop == null) {
            abort(404);
        }

        $loaidns = config('shop.loaidn');
        $nganhqls = config('shop.nganhql');
        $loaigiaytos = config('shop.loaigiayto');
        $quymos = config('shop.quymo');
        $huyens = Huyen::all();
        $xas = Xa::all();
        return view('back-end.admin.shop.edit', ['loaidns' => $loaidns, 'nganhqls' => $nganhqls, 'loaigiaytos' => $loaigiaytos, 'quymos' => $quymos, 'huyens' => $huyens, 'xas' => $xas, 'obj' => $shop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopRequest $request, $id)
    {

        $shop = Shop::find($id);
        $old_status = $shop->status;
        if ($shop == null) {
            abort(404);
        }

        $data = $request->all();
        if ($data['password_new'] != null || $data['password_new'] != '') {
            $data['password'] = bcrypt($data['password_new']);
        } else {
            unset($data['password']);
        }

        $image = $request->file('image');
        $image_1 = $request->file('image_1');
        $image_2 = $request->file('image_2');
        $destinationPath = 'shops/thumbs';

        if ($image_2 != null) {
            $data['image_2'] = Str::random(16) . '.' . $image_2->extension();
            $img = Image::make($image_2->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $data['image_2']);
            $image_2->move(storage_path('app/public/shops/images'), $data['image_2']);
        } else {
            unset($data['image_2']);
        }

        if ($image_1 != null) {
            $data['image_1'] = Str::random(16) . '.' . $image_1->extension();
            $img = Image::make($image_1->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $data['image_1']);
            $image_1->move(storage_path('app/public/shops/images'), $data['image_1']);
        } else {
            unset($data['image_1']);
        }

        if ($image != null) {
            $data['image'] = Str::random(16) . '.' . $image->extension();
            $img = Image::make($image->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $data['image']);
            $image->move(storage_path('app/public/shops/images'), $data['image']);
        } else {
            unset($data['image']);
        }

        $shop->update($data);
        if ($old_status == 2 && $data['status'] != 2) {
            if ($data['status'] == 1) {
                $_msg = "Xin chúc mừng đơn đăng ký của bạn đã được đồng ý.<br> Vui lòng truy cập vào hệ thống quản lý qua link: https://giaothuong.langnghethanhhoa.vn/admin <br> Với username và password đã đăng ký.<br>";
            } else {
                $_msg = "Rất tiệc đơn đăng ký của bạn đã bị từ chối.<br> Vui lòng liên hệ với ban quản trị để biết thông tin chi tiết.<br>";
            }

            $title = 'Phản hồi đơn đăng ký mở gian hàng trên hệ thống https://giaothuong.langnghedthanhhoa.vn !';
            $subject = 'Phản hồi đơn đăng ký mở gian hàng trên hệ thống https://giaothuong.langnghethanhhoa.vn !';
            $content = 'Xin chào!<br>' . $_msg . 'Xin cảm ơn !';
            send_mail($shop->email, $title, $subject, $content);
        }
        Session::flash('success-shop', 'Thay đổi thông tin cơ sở thành công!');
        return redirect()->route('shop.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Shop::find($id);
        if ($obj == null) {
            Session::flash('error-shop', 'Không tìm thấy dữ liệu.');
            return redirect()->route('product.index');
        }
        $obj->delete();
        Session::flash('success-shop', 'Xóa thông tin thành công.');
        return redirect()->route('shop.index');
    }

    public function mutileUpdate(Request $request)
    {
        $status = $request->status;
        $data = $request->data_selected;
        $data = explode(",", $data[0]);
        if ($status != 2) {
            for ($i = 0; $i < sizeof($data); $i++) {
                $obj = Shop::find($data[$i]);
                if ($obj != null) {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        } else {
            for ($i = 0; $i < sizeof($data); $i++) {
                $obj = Shop::find($data[$i]);
                if ($obj != null) {
                    $obj->delete();
                }
            }
        }
        Session::flash('success-shop', 'Update đồng loạt thành công.');
        return redirect()->route('shop.index');
    }
}