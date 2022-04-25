<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest as ProductRequest;
use App\Admin\Product;
use App\Admin\TypeProduct;
use App\Shop;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('created_at', 'desc')->get();
        return view('back-end.admin.product.list',['data'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_products = TypeProduct::orderby('name')->where('status',1)->get();
        $type_products_2 = config('product.type_extra');
        $shops = Shop::orderby('tencs')->where('status',1)->get();
        return view('back-end.admin.product.create',['type_products'=>$type_products, 'type_products_2'=>$type_products_2, 'shops'=>$shops]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $last_product = Product::orderby('id','desc')->first();
        if($last_product == null) $last_id = 0;
        else $last_id = $last_product->id;
        $data = [];
        $data = $request->all();
        $data['product_code'] = 'SP'.str_pad($last_id + 1, 5, '0', STR_PAD_LEFT);
        $images = $request->images;
        $arr_image = [];
        foreach($images as $key=>$value){
            $name_file = \Str::random(10).time().'.'.$value->getClientOriginalExtension();
            $value->storeAs('products/'.$data['product_code'], $name_file);
            $arr_image[] = $name_file;
        }
        $str_image = implode(";", $arr_image);
        $data['images'] = $str_image;
        $admin = auth()->guard('admin')->user();
        $data['created_by'] = $admin->id;
        Product::create($data);
        Session::flash('success-product', 'Tạo mới sản phẩm thành công!');
        return redirect()->route('admin-product.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('admin-product.edit',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if($product == null) abort(404);
        $type_products = TypeProduct::orderby('name')->where('status',1)->get();
        $type_products_2 = config('product.type_extra');
        $shops = Shop::orderby('tencs')->where('status',1)->get();
        return view('back-end.admin.product.edit',['type_products'=>$type_products, 'type_products_2'=>$type_products_2, 'shops'=>$shops, 'obj'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if($product == null) abort(404);
        $data = [];
        $data = $request->all();
        $images = $request->images;
        $arr_image = [];
        if(isset($images) && sizeof($images) > 0){
            foreach($images as $key=>$value){
                $name_file = \Str::random(10).time().'.'.$value->getClientOriginalExtension();
                $value->storeAs('products/'.$data['product_code'], $name_file);
                $arr_image[] = $name_file;
            }
            if (sizeof($arr_image) > 0){
                $str_image = implode(";", $arr_image);
                $data['images'] = $str_image;
            }
        }
        $product->update($data);
        Session::flash('success-product', 'Thay đổi thông tin thành công.');
        return redirect()->route('admin-product.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Product::find($id);
        if($obj == null){
            Session::flash('error-product', 'Không tìm thấy dữ liệu.');
            return redirect()->route('admin-product.index');
        }
        $obj->delete();
        Session::flash('success-product', 'Xóa thông tin thành công.');
        return redirect()->route('admin-product.index');
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
                $obj = Product::find($data[$i]);
                if($obj != null)
                {
                    $obj->status = $status;
                    $obj->update();
                }
            }
        }else{
            for($i = 0; $i < sizeof($data); $i++)
            {
                $obj = Product::find($data[$i]);
                if($obj != null)
                {
                    $obj->delete();
                }
            }
        }
        Session::flash('success-product', 'Update đồng loạt thành công.');
        return redirect()->route('admin-product.index');
    }

    public function deleteProduct()
    {
        # code...

        $allShop = Shop::all();

        $deletedShop = Shop::whereNotIn('id',[2,4,5,6])->get();

        // dd($allShop->count(), $deletedShop->count());
        $products = $deletedShop->first()->products;

        $product = Product::where('product_code','SP00186')->first();


        Storage::disk('images-upload')->delete($product->images);

        // File::delete($product->images);


        dd($product);
    }
}
