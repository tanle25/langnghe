<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest as TagRequest;
use App\Admin\Tag;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Tag::all();
        return view('back-end.tag.list')->with('data',$objs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->all());
        Session::flash('success-tag', 'Tạo mới tag "'.$request->name.'" thành công.');
        return redirect(route('tag.create'));
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
        $obj = Tag::find($id);
        if($obj == null){
            Session::flash('error-tag', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('tag.index');  
        }
        return view('back-end.tag.edit',['obj'=>$obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $obj = Tag::find($id);
        if($obj == null){
            Session::flash('error-tag', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('tag.index');  
        }
        $obj->update($request->all());
        Session::flash('success-tag', 'Thay đổi thông tin thành công.');
        return redirect(route('tag.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Tag::find($id);
        if($obj == null){
            Session::flash('error-tag', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('tag.index');  
        }
        $obj->delete();
        Session::flash('success-tag', 'Xóa thông tin thành công.');  
        return redirect()->route('tag.index');  
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
                $obj = Tag::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Tag::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-tag', 'Update đồng loạt thành công.');
        return redirect()->route('tag.index');
    }
}
