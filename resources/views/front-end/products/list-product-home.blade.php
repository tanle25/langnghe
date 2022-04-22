@if($type == 1)
<div class="wrap-product">
	<div class="row is-flex">
		@foreach($products as $product)
		@include('front-end.products.item-home',['product'=>$product])
		@endforeach
	</div>
</div>
@elseif ($type == 2)
<div class="wrap-product">
	<div class="row is-flex">
		@foreach($shops as $shop)
		@foreach($shop->products()->where('status',1)->where('type_product_id_2', 2)->take(1)->get() as $product)
		@include('front-end.products.item-home',['product'=>$product])
		@endforeach
		@endforeach
	</div>
</div>
@elseif ($type == 3)
<div class="wrap-product">
	<div class="row is-flex">
		@foreach($dulichs as $dulich)
		@include('front-end.products.item-home',['product'=>$dulich])
		@endforeach
	</div>
</div>
@endif
