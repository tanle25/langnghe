<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest as BannerRequest;
use App\Admin\Banner;
use App\Admin\Page;
use Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Banner::all();
        $pages = Page::all();
        return view('back-end.banner.list',['pages'=>$pages, 'data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        return view('back-end.banner.create',['pages'=>$pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        //
        $arr_data = $request->all();
        Banner::create($arr_data);
        Session::flash('success-banner', 'Tạo mới banner thành công.');
        return redirect(route('banner.create'));
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
        $obj = Banner::find($id);
        if($obj == null){
            Session::flash('error-banner', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('banner.index');  
        }
        $pages = Page::all();
        return view('back-end.banner.edit',['obj'=>$obj, 'pages'=>$pages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $obj = Banner::find($id);
        if($obj == null){
            Session::flash('error-banner', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('banner.index');  
        }
        $arr_data = $request->all();
        $obj->update($arr_data);
        Session::flash('success-banner', 'Thay đổi thông tin thành công.');
        return redirect(route('banner.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Banner::find($id);
        if($obj == null){
            Session::flash('error-banner', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('banner.index');  
        }
        $obj->delete();
        Session::flash('success-banner', 'Xóa thông tin thành công.');  
        return redirect()->route('banner.index');  
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
                $obj = Banner::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Banner::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-banner', 'Update đồng loạt thành công.');
        return redirect()->route('banner.index');
    }
}
