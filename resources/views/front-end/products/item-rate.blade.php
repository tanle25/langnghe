<div class="item">
	<div class="top">
		<div class="container-star starCtn pull-left" >
			<span>
				@for($i = 1; $i <= $rate->star; $i++)
				<div class="rating-symbol">
					<div class="rating-symbol-background fa fa-star-o fa-2x"></div>
					<div class="rating-symbol-foreground" ><span class="fa fa-star fa-2x"></span>
					</div>
				</div>
				@endfor
			</span>
		</div>
		<span class="title left"></span>
		<span class="right">{{$rate->created_date}}</span>
	</div>
	<div class="middle">
		<span>bởi
			<a href='#'>{{$rate->user != null ? $rate->user->name : ''}}</a>
		</span>
	</div>
	<div class="content">
	</div>
	<div class="bottom">
	</div>
</div>