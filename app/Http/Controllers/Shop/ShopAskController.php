<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\ShopAsk;
use Session;

class ShopAskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('shop')->user();
        $asks = ShopAsk::where('shop_id',$user->id)->get();
        return view('back-end.shop.shop-ask.list',['data'=>$asks]);
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
        $obj = ShopAsk::where('id',$id)->where('shop_id',$user->id)->first();
        if($obj == null){
            Session::flash('error-admin-shop-ask', 'Không tìm thấy dữ liệu.');
            return redirect()->route('admin-shop-ask.index');
        }
        $obj->delete();
        Session::flash('success-admin-shop-ask', 'Xóa thông tin thành công.');
        return redirect()->route('admin-shop-ask.index');
    }
}
