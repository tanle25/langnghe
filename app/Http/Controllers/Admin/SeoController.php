<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeoRequest as SeoRequest;
use App\Admin\Seo;
use Session;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Seo::all();
        return view('back-end.seo.list',['data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeoRequest $request)
    {
        //
        $arr_data = $request->all();
        Seo::create($arr_data);
        Session::flash('success-seo', 'Tạo mới seo thành công.');
        return redirect(route('seo.create'));
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
        $obj = Seo::find($id);
        if($obj == null){
            Session::flash('error-seo', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('seo.index');  
        }
        return view('back-end.seo.edit',['obj'=>$obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeoRequest $request, $id)
    {
        $obj = Seo::find($id);
        if($obj == null){
            Session::flash('error-seo', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('seo.index');  
        }
        $arr_data = $request->all();
        $obj->update($arr_data);
        Session::flash('success-seo', 'Thay đổi thông tin thành công.');
        return redirect(route('seo.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Seo::find($id);
        if($obj == null){
            Session::flash('error-seo', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('seo.index');  
        }
        $obj->delete();
        Session::flash('success-seo', 'Xóa thông tin thành công.');  
        return redirect()->route('seo.index');  
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
                $obj = Seo::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Seo::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-seo', 'Update đồng loạt thành công.');
        return redirect()->route('seo.index');
    }
}
