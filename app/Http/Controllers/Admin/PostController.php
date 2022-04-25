<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Admin\Post;
use App\Admin\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostRequest as PostRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Post::all();
        return view('back-end.post.list',['data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::where('status',1)->get();
        return view('back-end.post.create',['cats'=>$cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        // dd($request->all());
        $arr_data = $request->all();
        $arr_data['created_by'] = \Auth::user()->id;
        $file = $request->image;
        $a = getimagesize($file);
        $image_type = $a[2];
        $url ="";

        $arr_data['slug'] = Str::slug($request->name);

        if($request->hasFile('image')){

            $name_file = time().'_'.$file->getClientOriginalName();
            $url = $file->move('images', $name_file );
        }else{
            return redirect()->back();
        }
        // if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
        // {
        //     $name_file = time().'_'.$file->getClientOriginalName();
        //     $url = $file->move('public/images', $name_file);
        // }else{
        //     dd('error');
        //     return redirect()->back();
        // }
        $arr_data['image'] = $url;
        Post::create($arr_data);
        Session::flash('success-post', 'Tạo mới bài viết thành công.');
        return redirect()->route('post.create');
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
        $obj = Post::find($id);
        if($obj == null){
            Session::flash('error-post', 'Không tìm thấy dữ liệu.');
            return redirect()->route('post.index');
        }
        $cat = Category::where('status',1)->get();
        return view('back-end.post.edit',['obj'=>$obj,'cats'=>$cat]);

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
        $obj = Post::find($id);
        if($obj == null){
            Session::flash('error-post', 'Không tìm thấy dữ liệu.');
            return redirect()->route('post.index');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'image',
            'des_s'  => 'required',
            'cat_id'  => 'required',
        ],[
            'name.required' => 'Tên không được để trống.',
            'des_s.required' => 'Miêu tả ngắn không được để trống.',
            'cat_id.required' => 'Chuyên mục không được để trống.',
            'image.image' => 'Hình ảnh không đúng định dạng',
        ]);
        if ($validator->fails()) {
            Session::flash('error-post',$validator->errors()->first());
            return redirect()->back();
        }
        $arr_data = $request->all();
        if(isset($request->image)){
            $file = $request->image;
            $a = getimagesize($file);
            $image_type = $a[2];
            if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
            {
                $name_file = time().'_'.$file->getClientOriginalName();
                $url = $file->move('public/images', $name_file);
            }else{
                return redirect()->back();
            }
        }
        $arr_data['created_by'] = \Auth::user()->id;
        if(isset($url)) $data['image'] = $url;
        $obj->update($arr_data);
        Session::flash('success-post', 'Cập nhật bài viết thành công.');
        return redirect()->route('post.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Post::find($id);
        if($obj == null){
            Session::flash('error-post', 'Không tìm thấy dữ liệu.');
            return redirect()->route('post.index');
        }
        $obj->delete();
        Session::flash('success-post', 'Xóa bài viết thành công.');
        return redirect()->route('post.index');
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
                $obj = Post::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Post::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }
        Session::flash('success-post', 'Update đồng loạt thành công.');
        return redirect()->route('post.index');
    }
}
