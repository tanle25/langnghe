<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest as AlbumRequest;
use App\Admin\Album;
use App\Admin\Post;
use App\Admin\Category;
use App\Admin\Tag;
use Illuminate\Support\Facades\Storage;
use Session;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Album::all();
        return view('back-end.album.list',['data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = [];
        $tags = array_merge($tags, Tag::all()->pluck('name')->toArray());
        $tags = array_merge($tags, Post::all()->pluck('name')->toArray());
        $tags = array_merge($tags, Category::all()->pluck('name')->toArray());
        return view('back-end.album.create',['tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        $arr_data = $request->all();
        if(isset($arr_data['tags']))
            $arr_data['tags'] = implode(";",  $arr_data['tags']);
        $arr_data['created_by'] = \Auth::user()->id;
        Album::create($arr_data);
        Session::flash('success-album', 'Tạo mới album thành công.');
        return redirect()->route('album.create');
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
        $obj = Album::find($id);
        if($obj == null){
            Session::flash('error-album', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('album.index');  
        }
        $tags = [];
        $tags = array_merge($tags, Tag::all()->pluck('name')->toArray());
        $tags = array_merge($tags, Post::all()->pluck('name')->toArray());
        $tags = array_merge($tags, Category::all()->pluck('name')->toArray());
        return view('back-end.album.edit',['obj'=>$obj, 'tags'=> $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, $id)
    {
        $obj = Album::find($id);
        if($obj == null){
            Session::flash('error-album', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('album.index');  
        }
        $arr_data = $request->all();
        if(isset($arr_data['tags']))
            $arr_data['tags'] = implode(";",  $arr_data['tags']);
        $arr_data['created_by'] = \Auth::user()->id;
        $obj->update($arr_data);
        Session::flash('success-album', 'Cập nhật album thành công.'); 
        return redirect()->route('album.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Album::find($id);
        if($obj == null){
            Session::flash('error-album', 'Không tìm thấy dữ liệu.');  
            return redirect()->route('album.index');  
        }
        $obj->delete();
        Session::flash('success-album', 'Xóa album thành công.');  
        return redirect()->route('album.index');  
    }

    public function getImage(Request $request)
    {
        //
        $code = $request->input('query');
        $id = $request->input('album');
        $album = null;
        if($id != null && $id != ''){
            $album = Album::find($id);
        }
        $files = Storage::disk('album')->files($code);
        $res = [];
        foreach ($files as $key => $value) {
            $res[config('admin.base_url').'FILES/source/album/'.$value] = $value;
        }
        return view('back-end.partials.album-main-image',['files'=>$res, 'album'=>$album]);
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
                $obj = Album::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Album::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }       
        Session::flash('success-album', 'Update đồng loạt thành công.');
        return redirect()->route('album.index');
    }
}
