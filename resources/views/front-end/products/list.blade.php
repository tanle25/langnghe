<div class="wrap-product product-both">
    <div class="posts row is-flex ">
		@foreach($products as $product)
		@include('front-end.products.item-list',['product'=>$product])
		@endforeach
	</div>
</div>
{{$products->links()}}