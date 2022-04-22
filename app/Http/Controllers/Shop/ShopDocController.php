<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\Admin\ShopDoc;
use Session;

class ShopDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('shop')->user();
        $shop_docs = ShopDoc::where('shop_id',$user->id)->get();
        return view('back-end.shop.shop-doc.list',['data'=>$shop_docs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.shop.shop-doc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $data = $request->all();
        $image = $request->image;
        $name_file = time().'.'.$image->getClientOriginalExtension();
        $data['image'] = $name_file;
        $image->storeAs('shop-docs', $name_file);
        $data['status'] = 1;
        $data['created_by'] =  auth()->guard('shop')->user()->id;
        ShopDoc::create($data);
        Session::flash('success-shop-doc', 'Tạo mới giấy tờ cơ sở thành công!');
        return redirect()->route('doc.create');
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
        $user = auth()->guard('shop')->user();
        $obj = ShopDoc::where('id',$id)->where('shop_id',$user->id)->first();
        if($obj == null) abort(404);
        return view('back-end.shop.shop-doc.edit',['obj'=>$obj]);
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
        $user = auth()->guard('shop')->user();
        $shop= ShopDoc::where('id',$id)->where('shop_id',$user->id)->first();
        if($shop == null) abort(404);
        $data = $request->all();
        $image = $request->image;
        if($image != null){
            $name_file = time().'.'.$image->getClientOriginalExtension();
            $data['image'] = $name_file;
            $image->storeAs('shop-docs', $name_file);
        }else unset($data['image']);
        $shop->update($data);
        Session::flash('success-shop-doc', 'Thay đổi thông tin giấy tờ cơ sở sxkd thành công!');
        return redirect()->route('doc.edit',['id'=>$id]);
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
        $obj = ShopDoc::where('id',$id)->where('shop_id',$user->id)->first();
        if($obj == null){
            Session::flash('error-shop-doc', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('doc.index');  
        }
        $obj->delete();
        Session::flash('success-shop-doc', 'Xóa thông tin thành công.');  
        return redirect()->route('doc.index');  
    }

    public function mutileUpdate(Request $request)
    {
        $status = $request->status;
        $data = $request->data_selected;
        $data = explode(",", $data[0]);
        if($status != 2)
        {
            for($i = 0; $i < sizeof($data); $i++)
            {
                $user = auth()->guard('shop')->user();
                $obj = ShopDoc::where('id',$data[$i])->where('shop_id',$user->id)->first();
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $user = auth()->guard('shop')->user();
                $obj = ShopDoc::where('id',$data[$i])->where('shop_id',$user->id)->first();
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-shop-doc', 'Update đồng loạt thành công.');
        return redirect()->route('doc.index');
    }
}
