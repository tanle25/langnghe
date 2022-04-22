<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Section;
use Illuminate\Support\Facades\Validator;
use App\Admin\Brand;
use Session;
use Auth;

class CompanionBrandController extends Controller
{
    public function companionBrand()
    {
        $objs = Brand::all();
        return view('back-end.brand.list',['data'=>$objs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCompanionBrand(Request $request)
    {
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'image' => 'required|image',
                'status' => 'required'
            ],[
                'name.required' => 'Vui lòng nhập tên thương hiệu',
                'image.required' => 'Vui lòng chọn hình ảnh thương hiệu',
                'image.image' => 'Hình ảnh không đúng định dạng',
                'status.required' => 'Vui lòng chọn trạng thái hiển thị',
            ]);
            if ($validator->fails()) {
                Session::flash('error-brand',$validator->errors()->first());
                return redirect()->back();
            }
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
            $data = [
                'name' => $request->name,
                'url' => $url,
                'created_by' => Auth::user()->id,
                'status' => $request->status,
            ];
            $check = Brand::create($data);
            Session::flash('succes-brand',"Thêm thương hiệu đồng hành thành công");
            return redirect()->route('brand');
        }
        return view('back-end.brand.create');
    }

    public function editCompanionBrand(Request $request, $id)
    {
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'image' => 'image',
                'status' => 'required'
            ],[
                'name.required' => 'Vui lòng nhập tên thương hiệu',
                'image.image' => 'Hình ảnh không đúng định dạng',
                'status.required' => 'Vui lòng chọn trạng thái hiển thị',
            ]);
            if ($validator->fails()) {
                Session::flash('error-brand',$validator->errors()->first());
                return redirect()->back();
            }
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
            $data = [
                'name' => $request->name,
                'created_by' => Auth::user()->id,
                'status' => $request->status,
            ];
            if(isset($url)) $data['url'] = $url;
            Session::flash('succes-brand',"Update thương hiệu đồng hành thành công");
            $check = Brand::where(['status'=>1, 'id' => $id])->update($data);
            return redirect()->route('brand');
        }
        $brand = Brand::where(['status'=>1, 'id' => $id])->first();
        return view('back-end.brand.edit',['obj'=>$brand]);
    }

    public function deleteCompanionBrand($id)
    {
        $delete = Brand::where('id',$id)->delete();
        if($delete)Session::flash('succes-brand',"Xóa thương hiệu đồng hành thành công");
        return redirect()->back();
    }
}
