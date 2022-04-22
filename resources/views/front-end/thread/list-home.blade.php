<div class="container-fluil wrap-ncc">
	<div class="container">
		<div class="box-connections">
			<div class="head-buy-index row">
				<div class="col-md-6 col-sm-6 col-xs-7 res-tt5">
					<h3 class="h3-head-buy-index"><a href="{{route('ketnoi')}}">Kết nối cung cầu</a></h3>
				</div>
			</div>
			<div class="buy-center-linked-list-columns-index">
				<div class="row is-flex">
					@foreach($threads as $thread)
						@include('front-end.thread.item-home',['thread=>$thread'])
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>