<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\IconRequest as IconRequest;
use App\Admin\Icon;
use App\Admin\Page;
use Session;

class IconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Icon::all();
        $pages = Page::where('status',1)->get();
        return view('back-end.icon.list',['pages'=>$pages, 'data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::where('status',1)->get();
        return view('back-end.icon.create',['pages'=>$pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IconRequest $request)
    {
        //
        $arr_data = $request->all();
        if(isset($arr_data['page']))
            $arr_data['page'] = implode(";",  $arr_data['page']);
        Icon::create($arr_data);
        Session::flash('success-icon', 'Tạo mới icon thành công.');
        return redirect(route('icon.create'));
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
        $obj = Icon::find($id);
        if($obj == null){
            Session::flash('error-icon', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('icon.index');  
        }
        $pages = Page::where('status',1)->get();
        return view('back-end.icon.edit',['obj'=>$obj, 'pages'=>$pages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IconRequest $request, $id)
    {
        $obj = Icon::find($id);
        if($obj == null){
            Session::flash('error-banner', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('icon.index');  
        }
        $arr_data = $request->all();
        if(isset($arr_data['page']))
            $arr_data['page'] = implode(";",  $arr_data['page']);
        $obj->update($arr_data);
        Session::flash('success-icon', 'Thay đổi thông tin thành công.');
        return redirect(route('icon.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Icon::find($id);
        if($obj == null){
            Session::flash('error-icon', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('icon.index');  
        }
        $obj->delete();
        Session::flash('success-icon', 'Xóa thông tin thành công.');  
        return redirect()->route('icon.index');  
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
                $obj = Icon::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Icon::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-icon', 'Update đồng loạt thành công.');
        return redirect()->route('icon.index');
    }
}
