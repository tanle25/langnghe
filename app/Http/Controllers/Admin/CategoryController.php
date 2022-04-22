<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest as CategoryRequest;
use App\Admin\Category;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Category::all();
        return view('back-end.category.list')->with('data',$objs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::where('status',1)->where('type',1)->get();
        return view('back-end.category.create',['cats'=>$cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        Session::flash('success-category', 'Tạo mới chuyên mục "'.$request->name.'" thành công.');
        return redirect(route('category.create'));
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
        $obj = Category::find($id);
        if($obj == null){
            Session::flash('error-category', 'Không tìm thấy dữ liệu.');
            return redirect()->route('category.index');
        }
        $cats = Category::where('status',1)->where('type',1)->get();
        return view('back-end.category.edit',['obj'=>$obj,'cats'=>$cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $obj = Category::find($id);
        if($obj == null){
            Session::flash('error-category', 'Không tìm thấy dữ liệu.');
            return redirect()->route('category.index');
        }
        $obj->update($request->all());
        Session::flash('success-category', 'Thay đổi thông tin thành công.');
        return redirect(route('category.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Category::find($id);
        if($obj == null){
            Session::flash('error-category', 'Không tìm thấy dữ liệu.');
            return redirect()->route('category.index');
        }
        $obj->delete();
        Session::flash('success-category', 'Xóa thông tin thành công.');
        return redirect()->route('category.index');
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
                $obj = Category::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Category::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }
        Session::flash('success-category', 'Update đồng loạt thành công.');
        return redirect()->route('category.index');
    }
}
