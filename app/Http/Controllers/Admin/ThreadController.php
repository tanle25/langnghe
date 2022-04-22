<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadRequest as ThreadRequest;
use App\Admin\Thread;
use Illuminate\Support\Str;
use Session;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('admin')->user();
        if($user->xa == null)
        $objs = Thread::orderby('created_at', 'desc')->get();
        else
        $objs = Thread::orderby('created_at', 'desc')->where('xa', $user->xa_id)->get();
        return view('back-end.admin.thread.list',['data'=>$objs]);
    }

    public function active($id)
    {
        $obj = Thread::find($id);
        if($obj == null){
            Session::flash('error-thread', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('thread.index');  
        }
        $obj->update(['status'=>1]);
        $slug = Str::slug($obj->name, '-').str_random(5);
        $obj->slug = $slug;
        $obj->update();
        Session::flash('success-thread', 'Đã chấp nhận tin đăng : '.$obj->name);
        return redirect()->route('thread.index');    
    }

    public function deactive($id)
    {
        $obj = Thread::find($id);
        if($obj == null){
            Session::flash('error-thread', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('thread.index');  
        }
        $obj->update(['status'=>0]);
        Session::flash('success-thread', 'Đã từ chối tin đăng : '.$obj->name);
        return redirect()->route('thread.index');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('thread.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('thread.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('thread.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return redirect()->route('thread.index');
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
        return redirect()->route('thread.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Thread::find($id);
        if($obj == null){
            Session::flash('error-thread', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('post.index');  
        }
        $obj->delete();
        Session::flash('success-thread', 'Xóa tin đămh thành công.');  
        return redirect()->route('thread.index');  
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
                $obj = Thread::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Thread::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-thread', 'Update đồng loạt thành công.');
        return redirect()->route('thread.index');
    }
}
