<div class="item">
	<div class="top">
		<div class="container-star starCtn pull-left">
			<input type="range" value="{{$product_rate->star}}" step="1" id="rate_product_{{$product_rate->id}}" data-rateit-readonly="true" style="display: none">
		    <div class="rateit" data-rateit-backingfld="#rate_product_{{$product_rate->id}}" data-rateit-resetable="false"  data-rateit-ispreset="true"
				data-rateit-min="0" data-rateit-max="5" data-rateit-readonly="true" id="new_rate_product_{{$product_rate->id}}">
			</div>
		</div>
		<span class="title left"></span>
		<span class="right">{{$product_rate->created_at->format('d/m/Y')}}</span>
	</div>
	<div class="middle">
		<span>bởi {{$product_rate->user->name}}
			<!-- <a href='{{url("")}}/user-activity/{{$product_rate->user->email}}'>{{$product_rate->user->name}}</a> -->
		</span>
	</div>
	<div class="content">{{$product_rate->content}}</div>
	<div class="bottom"></div>
</div>
<script>
	$(document).ready(function(){
		$('#new_rate_product_{{$product_rate->id}}').rateit();
	})
</script>