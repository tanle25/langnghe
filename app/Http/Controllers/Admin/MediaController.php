<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Image;
use App\Admin\Page;
use Session;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Image::all();
        // $pages = Page::where('status',1)->get();
        $pages = Page::all();
        return view('back-end.media.list',['pages'=>$pages, 'data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pages = Page::where('status',1)->get();
        $pages = Page::all();
        return view('back-end.media.create',['pages'=>$pages]);
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
        $arr_data = $request->all();
        if(isset($arr_data['page']))
            $arr_data['page'] = implode(";",  $arr_data['page']);
        Image::create($arr_data);
        Session::flash('success-media', 'Tạo mới media thành công.');
        return redirect(route('media.create'));
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
        $obj = Image::find($id);
        if($obj == null){
            Session::flash('error-media', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('media.index');  
        }
        // $pages = Page::where('status',1)->get();
        $pages = Page::all();
        return view('back-end.media.edit',['obj'=>$obj, 'pages'=>$pages]);
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
        $obj = Image::find($id);
        if($obj == null){
            Session::flash('error-media', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('media.index');  
        }
        $arr_data = $request->all();
        if(isset($arr_data['page']))
            $arr_data['page'] = implode(";",  $arr_data['page']);
        $obj->update($arr_data);
        Session::flash('success-media', 'Thay đổi thông tin thành công.');
        return redirect(route('media.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Image::find($id);
        if($obj == null){
            Session::flash('error-media', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('media.index');  
        }
        $obj->delete();
        Session::flash('success-media', 'Xóa thông tin thành công.');  
        return redirect()->route('media.index');  
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
                $obj = Image::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Image::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-media', 'Update đồng loạt thành công.');
        return redirect()->route('media.index');
    }
}
