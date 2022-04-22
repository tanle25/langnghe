<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest as UserRequest;
use App\User;
use App\Admin\Huyen;
use App\Admin\Xa;
use Session;

class UserController extends Controller
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
        $objs = User::orderby('created_at', 'desc')->get();
        else
        $objs = User::orderby('created_at', 'desc')->where('xa', $user->xa_id)->get();
        return view('back-end.users.list')->with('data',$objs);
    }

    public function xaAjax(Request $request)
    {
        $huyen_id = $request->input('huyen');
        $user_id = $request->input('user');
        $user = User::find($user_id);
        $res = [];
        $huyen = Huyen::find($huyen_id);
        if($huyen != null) $res = $huyen->xas()->get();
        return view('back-end.users.xa',['data'=>$res, 'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $huyens = Huyen::all();
        return view('back-end.users.create',['huyens'=>$huyens]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $tmp = $request->all();
        $tmp['password'] =  bcrypt($tmp['password']);
        User::create($tmp);
        Session::flash('success-user', 'Tạo mới người dùng "'.$request->name.'" thành công.');
        return redirect(route('user.create'));
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
        $obj = User::find($id);
        if($obj == null){
            Session::flash('error-user', 'Không tìm thấy dữ liệu.');
            return redirect()->route('user.index');
        }
        $user = auth()->guard('admin')->user();
        if($user->xa == null || $user->xa == '' || $user->xa != $obj->xa){
            Session::flash('error-user', 'Bạn không có quyền sửa thông tin người dùng này.');
            return redirect()->route('user.index');
        }
        $huyens = Huyen::all();
        $huyen = $obj->huyens;
        if ($huyen != null) $data = $huyen->xas()->get();
        else $data = null;
        return view('back-end.users.edit',['obj'=>$obj, 'user'=>$obj, 'huyens'=>$huyens,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        if (!isset($user)){
            Session::flash('error-user', 'Không tìm thấy người dùng cần sửa.');
            return redirect(route('user.index'));
        }
        $tmp = $request->all();
        if(isset($tmp['password_new']) && $tmp['password_new'] != ""){
            $tmp['password'] = bcrypt($tmp['password_new']);   
        }
        $user->update($tmp);
        Session::flash('success-user', 'Thay đổi thông tin thành công.');
        return redirect(route('user.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = User::find($id);
        if($obj == null){
            Session::flash('error-user', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('user.index');  
        }
        $obj->delete();
        Session::flash('success-user', 'Xóa người dùng thành công.');  
        return redirect()->route('user.index');  
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
                $user = User::find($data[$i]);
                if($user != null)
                {
                    $user->status = $status;
                    $user->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $user = User::find($data[$i]);
                if($user != null)
                {
                    $user->delete();
                }
            }
        }       
        Session::flash('success-user', 'Update đồng loạt thành công.');
        return redirect()->route('user.index');
    }
}
