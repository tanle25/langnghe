<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Xa;
use App\Shop;
use App\User;
use App\Http\Requests\ThreadRequest as ThreadRequest;
use App\Admin\TypeProduct;
use App\Admin\Thread;
use Illuminate\Support\Str;
use Session;

class ConnectController extends Controller
{
    public function getList(){
    	$threads = Thread::orderby('created_at','desc')->where('status',1)->paginate(10);
    	$shops = Shop::orderby('point','desc')->where('status',1)->take(5)->get();
    	return view('front-end.connect.list',['threads'=>$threads, 'shops'=>$shops]);
    }

    public function ajaxType(Request $request){
        $type = $request->input('type');
        $threads = Thread::where('type', $type)->orderby('created_at', 'desc')->paginate(10);
        return view('front-end.connect.list-connect',['threads'=>$threads]);
    }

    public function search(Request $request){
        $keyword = mb_strtolower($request->keyword, 'UTF-8');
        $threads = Thread::whereRaw('lower(name) like (?)',["%{$keyword}%"])->paginate(10);
        $shops = Shop::orderby('point','desc')->where('status',1)->take(5)->get();
        return view('front-end.connect.list',['threads'=>$threads, 'shops'=>$shops]);
    }

    public function getForm(Request $request){
        $type = $request->input('type');
        $type_product = TypeProduct::where('type',1)->where('status',1)->get();
        $xas = Xa::all();
        switch ($type) {
            case '2':
                return view('front-end.account.elements.ban',['xas'=>$xas, 'types'=>$type_product]);
                break;
            case '3':
                return view('front-end.account.elements.timdoitac',['xas'=>$xas, 'types'=>$type_product]);
                break;
            default:
               return view('front-end.account.elements.mua',['xas'=>$xas, 'types'=>$type_product]);
                break;
        }
    }

    public function userTinDang($id){
        if(auth()->check()){
            $user = auth()->user();
            $threads = $user->threads()->orderby('created_at','desc')->get();
            return view('front-end.account.checkout',['user'=>$user, 'threads'=>$threads, 'flag'=>'tindang']);
        }
        return redirect()->back();
    }

    public function getDetail($id){
        $thread = Thread::where('status', 1)->where('id', $id)->first();
        if($thread == null) return abort(404);
        $user = null;
        $user = $thread->user;
        $threads = Thread::orderby('created_at','desc')->where('status',1)->where('id', '<>', $id)->paginate(10);
        $shops = Shop::orderby('point','desc')->where('status',1)->take(5)->get();
        return view('front-end.connect.detail',['user'=>$user, 'thread'=>$thread,'threads'=>$threads, 'shops'=>$shops]);
    }

    public function create(){
    	$user = auth()->user();
    	$type_product = TypeProduct::where('type',1)->where('status',1)->get();
    	$xas = Xa::all();
    	return view('front-end.account.create-new',['xas'=>$xas, 'types'=>$type_product,'user'=>$user, 'flag'=>'dangtin']);
    }

    public function edit($id){
        $obj = Thread::find($id);
        if($obj == null) return redirect()->back();
        if($obj->user_id != auth()->user()->id) {
            Session::flash('error-creat-thread-user','Bạn không có quyền sửa dữ liệu này.');
            return redirect()->back();
        }
        $user = auth()->user();
        $type_product = TypeProduct::where('type',1)->where('status',1)->get();
        $xas = Xa::all();
        return view('front-end.account.create-new',['xas'=>$xas, 'types'=>$type_product,'user'=>$user, 'flag'=>'dangtin', 'obj'=>$obj]);
    }

    public function del($id){
        $obj = Thread::find($id);
        if($obj == null) return redirect()->back();
        if($obj->user_id != auth()->user()->id) {
            Session::flash('error-creat-thread-user','Bạn không có quyền xóa dữ liệu này.');
            return redirect()->back();
        }
        $obj->delete();
        Session::flash('success-creat-thread-user','Xóa dữ liệu thành công thành công.');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        $obj = Thread::find($id);
        if($obj == null) return redirect()->back();
        $data = $request->all();
        $images = $request->images;
        $arr_image = [];
        if($images != null && sizeof($images) > 0)
        {
            foreach($images as $key=>$value){
                $name_file = Str::random(16).'.'.$value->getClientOriginalExtension();
                $value->storeAs('threads', $name_file);
                $arr_image[] = $name_file;
            }
        }
        if(sizeof($arr_image) > 0){
            $str_image = implode(";", $arr_image);
            $data['images'] = $str_image;
        }else unset($data['images']);
        if(auth()->check()){
            $user = auth()->user();
            $data['user_id'] = $user->id;
        }
        $obj->update($data);
        Session::flash('success-creat-thread-user','Thay đổi thông tin thành công.');
        return redirect()->back();
    }

    public function store(ThreadRequest $request){
        $data = $request->all();
        $images = $request->images;
        $arr_image = [];
        foreach($images as $key=>$value){
            $name_file = Str::random(16).'.'.$value->getClientOriginalExtension();
            $value->storeAs('threads', $name_file);
            $arr_image[] = $name_file;
        }
        $str_image = implode(";", $arr_image);
        $data['images'] = $str_image;
        $data['status'] = 1;
        if(auth()->check()){
            $user = auth()->user();
            $data['user_id'] = $user->id;
        }
        Thread::create($data);
        Session::flash('success-creat-thread-user','Đăng tin thành công.');
        return redirect()->route('dangtin');
    }

}
