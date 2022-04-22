<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Admin\Product;
use App\Admin\TypeProduct;
use App\Admin\ProductRate;
use Auth;

class ProductController extends Controller
{
    public function detail(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if($product == null) abort(404);
$array_product = $request->session()->get('product_ids');
        // dd($array_product);
        if(!isset($array_product) || array_search($product->id, $array_product) === false){
            if(!isset($array_product)) $array_product = [];
            $array_product[] = $product->id;
            Product::where('id', $product->id)->update(['views' => $product->views + 1]);
            $request->session()->put('product_ids', $array_product);
        }
        $quymos = config('shop.quymo'); 
        $shop = $product->shop;
        if($shop == null) abort(404);
        $products = $shop->products()->where('status',1)->where('id','<>',$product->id)->get();
        $products_2 = Product::where('status',1)->where('type_product_id', $product->type_product_id)->where('shop_id','<>',$product->shop_id)->get();
        return view('front-end.products.detail',['product'=>$product, 'products'=>$products, 'products_2'=>$products_2, 'quymos'=>$quymos]);
    }

    public function fillterAjax(Request $request)
    {
    	$num = $request->input('num');
    	$cat = $request->input('cat');
    	$sort = $request->input('sort');
    	\Session::put('number_product',$num);
        \Session::put('order_by',$sort);
    	$obj = TypeProduct::where('id', $cat)->where('status',1)->first();
    	if($obj == null) {
    		$slug = $cat;
        	$tmp = config('product.type_extra');
			$tmp2 = config('product.type_extra_slug');
			$data = [];
			$data2 = [];
			foreach($tmp as $key=>$value){
				if(isset($tmp2[$key])){
					$data[$tmp2[$key]] = $value;
					$data2[$tmp2[$key]] = $key;
				}
			}
			if(!isset($data[$slug])) return abort(404);
			$products = Product::where('status',1)->where('type_product_id_2', $data2[$slug]);
			$num = \Session::get('number_product',0);
	        $order_by = \Session::get('order_by',0);
	        switch ($order_by) {
	        	case '0':
	        		break;
	        	case '1':
	        		$products = $products->orderby('name');
	        		break;
	        	case '2':
	        		$products = $products->orderby('name', 'desc');
	        	case '3':
	        		$products = $products->orderby('price');
	        	case '4':
	        		$products = $products->orderby('price', 'desc');
	        		break;
        	}
        	if($num == 0) $num = 12;
        	$products = $products->paginate($num);
	        return view('front-end.products.list',['products'=>$products]);
	    }
    	$child_id = $obj->child->pluck('id')->all();
        $child_id[] = $obj->id;
        $products = Product::where('status',1)->whereIn('type_product_id', $child_id);
        switch ($sort) {
        	case '0':
        		break;
        	case '1':
        		$products = $products->orderby('name');
        		break;
        	case '2':
        		$products = $products->orderby('name', 'desc');
        	case '3':
        		$products = $products->orderby('price');
        	case '4':
        		$products = $products->orderby('price', 'desc');
        		break;
        }
        if($num == 0) $num = 10;
        $products = $products->paginate($num);
    	return view('front-end.products.list',['products'=>$products]);
    }


    public function getByCategory(Request $request, $slug)
    {
        $danh_muc = TypeProduct::where('slug', $slug)->where('status',1)->first();
        $count = Product::where('status',1)->count();
        $types_product = TypeProduct::where('status',1)->where('type',1)->get();
        if($danh_muc != null ){
            $arr_id = $danh_muc->child->where('status',1)->get()->pluck('id')->all();
            $arr_id[] = $danh_muc->id;

            $products = Product::join('type_products', 'type_products.id', '=', 'products.type_product_id')
            ->join('shops', 'shops.id', '=', 'products.shop_id')
            ->where('shops.status', 1)
            ->where('type_products.status', 1)
            ->where('products.status', 1)
            ->whereIn('products.type_product_id', $arr_id);
            $num = \Session::get('number_product',0);
            $order_by = \Session::get('order_by',0);
            switch ($order_by) {
                case '0':
                    break;
                case '1':
                    $products = $products->orderby('products.name');
                    break;
                case '2':
                    $products = $products->orderby('products.name', 'desc');
                case '3':
                    $products = $products->orderby('products.price');
                case '4':
                    $products = $products->orderby('products.price', 'desc');
                    break;
            }
            if($num == 0) $num = 12;
            $products = $products->select('products.*')->paginate($num);
            return view('front-end.products.list-by-category',['num'=>$num, 'sort'=>$order_by, 'slug'=>$slug, 'obj'=> $danh_muc,'count'=>$count,'products'=>$products, 'types'=>$types_product]);
        }


   //      $cat = TypeProduct::where('slug', $slug)->where('status',1)->first();
   //      if($cat == null) {
			// if(!isset($data[$slug])) return abort(404);
			// $list_parent = [];
			// $count = Product::where('status',1)->count();
			// $types_product = TypeProduct::where('status',1)->where('type',1)->get();
			// $products = Product::join('type_products', 'type_products.id', '=', 'products.type_product_id')
   //          ->join('shops', 'shops.id', '=', 'products.shop_id')
   //          ->where('shops.status', 1)
   //          ->where('type_products.status', 1)
   //          ->where('product.status', 1);
			// $num = \Session::get('number_product',0);
	  //       $order_by = \Session::get('order_by',0);
	  //       switch ($order_by) {
	  //       	case '0':
	  //       		break;
	  //       	case '1':
	  //       		$products = $products->orderby('name');
	  //       		break;
	  //       	case '2':
	  //       		$products = $products->orderby('name', 'desc');
	  //       	case '3':
	  //       		$products = $products->orderby('price');
	  //       	case '4':
	  //       		$products = $products->orderby('price', 'desc');
	  //       		break;
   //      	}
   //      	if($num == 0) $num = 12;
   //      	$products = $products->paginate($num);
	  //       return view('front-end.products.list-by-category',['num'=>$num, 'sort'=>$order_by, 'slug'=>$slug, 'name'=> $data[$slug],'count'=>$count, 'types'=>$types_product, 'products'=>$products, 'list_parent'=>$list_parent]);
	  //   }


   //      $list_parent = [];
   //      $tmp = $cat->parent;
   //      while($tmp != null)
   //      {
   //      	$list_parent[] = $tmp;
   //      	$tmp = $tmp->parent;
   //      }
   //      $count = Product::where('status',1)->count();
   //      $types_product = TypeProduct::where('status',1)->where('type',1)->get();
   //      $child_id = $cat->child->pluck('id')->all();
   //      $child_id[] = $cat->id;
   //      $products = Product::where('status',1)->whereIn('type_product_id', $child_id);
   //      $num = \Session::get('number_product',0);
   //      $order_by = \Session::get('order_by',0);
   //      switch ($order_by) {
   //      	case '0':
   //      		break;
   //      	case '1':
   //      		$products = $products->orderby('name');
   //      		break;
   //      	case '2':
   //      		$products = $products->orderby('name', 'desc');
   //      	case '3':
   //      		$products = $products->orderby('price');
   //      	case '4':
   //      		$products = $products->orderby('price', 'desc');
   //      		break;
   //      }
   //      if($num == 0) $num = 12;
   //      $products = $products->paginate($num);
   //      return view('front-end.products.list-by-category',['num'=>$num, 'sort'=>$order_by, 'obj'=>$cat, 'count'=>$count, 'types'=>$types_product, 'products'=>$products, 'list_parent'=>$list_parent]);
    }

    public function rateProduct(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'rate_val' => 'required|integer|max:5',
            ],[
                'product_id.required' => 'Vui lòng nhập product ID',
                'rate_val.required' => 'Vui lòng nhập số sao',
                'rate_val.max' => 'Số sao không được lớn hơn 5',
                'rate_val.integer' => 'Số sao không đúng định dạng'
            ]);
    
            if ($validator->fails()) {
                return response(['status' => 1, 'msg' => $validator->errors()->first()]);
            }
            $data_insert = [
                'user_id' => $user->id,
                'product_id' => $request->product_id,   
                'content' => $request->content_rate,
                'star' => $request->rate_val,
            ];
            $product_rate = ProductRate::create($data_insert);
            if($product_rate) return response(['status' => 1, 'msg' => 'Đánh giá sản phẩm thành công']);
            else return response(['status' => 1, 'msg' => 'Đánh giá sản phẩm không thành công']);
        }
        return response(['status' => 0, 'msg' => 'Vui lòng đăng nhập trước khi đánh giá!']);
    }
}
