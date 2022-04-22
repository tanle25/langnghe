<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest as PageRequest;
use App\Admin\Page;
use App\Admin\Seo;
use Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Page::all();
        // dd($objs);
        return view('back-end.page.list')->with('data',$objs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $data = $request->all();
        $page = Page::create($data);
        $data['type'] = 1;
        $data['obj_id'] = $page->id;
        Seo::create($data);
        Session::flash('success-page', 'Tạo mới trang "'.$request->name.'" thành công.');
        return redirect(route('page.create'));
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
        $obj = Page::find($id);
        if($obj == null){
            Session::flash('error-page', 'Không tìm thấy dữ liệu.');
            return redirect()->route('page.index');
        }
        return view('back-end.page.edit',['obj'=>$obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $obj = Page::find($id);
        if($obj == null){
            Session::flash('error-page', 'Không tìm thấy dữ liệu.');
            return redirect()->route('page.index');
        }
        $data = $request->all();
        $obj->update($data);
        $data['type'] = 1;
        $data['obj_id'] = $obj->id;
        $seo = $obj->seo();
        if($seo != null) $seo->update($data);
        else Seo::create($data);
        Session::flash('success-page', 'Thay đổi thông tin thành công.');
        return redirect(route('page.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Page::find($id);
        if($obj == null){
            Session::flash('error-page', 'Không tìm thấy dữ liệu.');
            return redirect()->route('page.index');
        }
        $seo = $obj->seo();
        if($seo != null) $seo->delete();
        $obj->delete();
        Session::flash('success-page', 'Xóa thông tin thành công.');
        return redirect()->route('page.index');
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
                $obj = Page::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Page::find($data[$i]);
                if($obj != null)
                {
                    $seo = $obj->seo();
                    if($seo != null) $seo->delete();
                    $obj->delete();
                }
            }
        }
        Session::flash('success-page', 'Update đồng loạt thành công.');
        return redirect()->route('page.index');
    }
}
