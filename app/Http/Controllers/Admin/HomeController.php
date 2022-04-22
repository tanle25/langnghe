<?php

namespace App\Http\Controllers\Admin;

use App\Admin\CheckOut;
use App\Admin\UserReq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;

class HomeController extends Controller
{
    //
    public function adminHome()
    {
        return view('back-end.pages.home');
    }

    public function createSlug(Request $request)
    {
        $slug = Str::slug($request->input('str'), '-');
        return response()->json(array('slug' => $slug), 200);
    }

    public function listCheckOut()
    {
        $data = CheckOut::all();
        return view('back-end.admin.checkout.list', ['data' => $data]);
    }

    public function detailCheckout($code)
    {
        $checkout = CheckOut::where('code', $code)->first();
        return view('back-end.admin.checkout.detail_checkout', ['checkout' => $checkout]);
    }

    public function listReq()
    {
        $data = UserReq::all();
        return view('back-end.admin.req.list', ['data' => $data]);
    }

    public function editCheckout($code, Request $request)
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
                return redirect()->route('admin.checkout');
            } else {
                Session::flash('error-update', 'Chỉnh sửa đơn hàng không thành công');
                return redirect()->back();
            }
        }
        $checkout = CheckOut::with(['products', 'products.product'])->where('code', $code)->first();
        //dd($checkout->products);
        return view('back-end.admin.checkout.edit_checkout', ['checkout' => $checkout]);
    }
}