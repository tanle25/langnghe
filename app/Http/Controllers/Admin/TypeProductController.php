<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeProductRequest as TypeProductRequest;
use App\Admin\TypeProduct;
use Session;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = TypeProduct::all();
        return view('back-end.TypeProduct.list')->with('data',$objs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeProduct::where('status',1)->where('type',1)->get();
        return view('back-end.TypeProduct.create',['types'=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeProductRequest $request)
    {
        TypeProduct::create($request->all());
        Session::flash('success-TypeProduct', 'Tạo mới loại sản phẩm "'.$request->name.'" thành công.');
        return redirect(route('type-product.create'));
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
        $obj = TypeProduct::find($id);
        if($obj == null){
            Session::flash('error-TypeProduct', 'Không tìm thấy dữ liệu.');
            return redirect()->route('type-product.index');
        }
        $types = TypeProduct::where('status',1)->where('type',1)->get();
        return view('back-end.TypeProduct.edit',['obj'=>$obj,'types'=>$types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeProductRequest $request, $id)
    {
        $obj = TypeProduct::find($id);
        if($obj == null){
            Session::flash('error-TypeProduct', 'Không tìm thấy dữ liệu.');
            return redirect()->route('type-product.index');
        }
        $obj->update($request->all());
        Session::flash('success-TypeProduct', 'Thay đổi thông tin thành công.');
        return redirect(route('type-product.edit',  $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = TypeProduct::find($id);
        if($obj == null){
            Session::flash('error-TypeProduct', 'Không tìm thấy dữ liệu.');
            return redirect()->route('type-product.index');
        }
        $obj->delete();
        Session::flash('success-TypeProduct', 'Xóa thông tin thành công.');
        return redirect()->route('type-product.index');
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
                $obj = TypeProduct::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = TypeProduct::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }
        Session::flash('success-TypeProduct', 'Update đồng loạt thành công.');
        return redirect()->route('type-product.index');
    }
}
