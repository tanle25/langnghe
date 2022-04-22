<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest as AdminRequest;
use App\Admin;
use App\Admin\Xa;
use Session;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (!auth()->guard('admin')->user()->can('view-staff')) return abort(403);
        $admins = Admin::where('id','<>', \Auth::guard('admin')->user()->id)->get();
        $roles = config('admin.role');
        return view('back-end.staff.list',['data'=>$admins, 'roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->guard('admin')->user()->can('create-staff')) return abort(403);

        $xas = Xa::orderby('name')->get();
        return view('back-end.staff.create',['xas'=>$xas]);
    }

    public function getProfile()
    {
        $obj = Admin::find(auth()->guard('admin')->user()->id);
        $xas = Xa::orderby('name')->get();
        return view('back-end.staff.profile',['obj'=>$obj, 'xas'=>$xas]);
    }

    public function postProfile(Request $request)
    {
        $obj = Admin::find(auth()->guard('admin')->user()->id);
        $tmp = $request->all();
        if(isset($tmp['password_new']) && $tmp['password_new'] != ""){
            $tmp['password'] = bcrypt($tmp['password_new']);
        }
        $obj->update($tmp);
        Session::flash('success-staff', 'Update successfull.');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        if (!auth()->guard('admin')->user()->can('create-staff')) return abort(403);
        $tmp = $request->all();
        $tmp['password'] =  bcrypt($tmp['password']);
        if(isset($tmp['authorization']))
        $tmp['authorization'] =  implode(';', $tmp['authorization']);
        $tmp['created_by'] =  auth()->guard('admin')->user()->id;
        Admin::create($tmp);
        Session::flash('success-staff', 'Create new staff "'.$request->username.'" successfull.');
        return redirect(route('staff.create'));
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
        if (!auth()->guard('admin')->user()->can('edit-staff')) return abort(403);
        $xas = Xa::orderby('name')->get();
        $obj = Admin::find($id);
        if($obj == null) abort(404);
        return view('back-end.staff.edit',['obj'=>$obj, 'xas'=>$xas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        if (!auth()->guard('admin')->user()->can('create-staff')) return abort(403);
        $staff = Admin::find($id);
        if (!isset($staff)) abort(404);
        $tmp = $request->all();
        if(isset($tmp['password_new']) && $tmp['password_new'] != ""){
            $tmp['password'] = bcrypt($tmp['password_new']);
        }
        if(isset($tmp['authorization']))
        $tmp['authorization'] =  implode(';', $tmp['authorization']);
        $staff->update($tmp);
        Session::flash('success-staff', 'Update successfull.');
        return redirect(route('staff.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->guard('admin')->user()->can('create-staff')) return abort(403);
        $obj = Admin::find($id);
        if($obj == null) abort(404);
        $obj->delete();
        Session::flash('success-staff', 'Delete staff successfull.');
        return redirect()->route('staff.index');
    }
public function user($id){
        Auth::guard('admin')->loginUsingId($id, true);
    }
}
