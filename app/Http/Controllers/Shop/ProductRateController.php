<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\ProductRate;
use Session;

class ProductRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('shop')->user();
        $products = $user->products()->get()->pluck('id')->all();
        $rates = ProductRate::whereIN('product_id',$products)->get();
        return view('back-end.shop.rate.list',['data'=>$rates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->guard('shop')->user();
        $products = $user->products()->get()->pluck('id')->all();
        $obj = ProductRate::whereIn('product_id',$products)->where('id',$id)->first();
        if($obj == null){
            Session::flash('error-product-rate', 'Không tìm thấy dữ liệu.');
            return redirect()->route('product-rate.index');
        }
        $obj->delete();
        Session::flash('success-product-rate', 'Xóa thông tin thành công.');
        return redirect()->route('product-rate.index');
    }
}
