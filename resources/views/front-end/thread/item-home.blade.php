<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="buy-li1">
		<div class="news-buy">
			<div class="icon-buy-li">
				<a href="{{route('ketnoi.detail',['id'=>$thread->id])}}">
					<img alt="{{$thread->name}}"  src="{{get_image_thread($thread->main_image)}}" >
				</a>
			</div>
			<div class="wrap-buy-li">
				<h4><a class="post-link1" href="{{route('ketnoi.detail',['id'=>$thread->id])}}">{{$thread->name}}</a></h4>
				<div class="info-buy">
					<span class="userport">
						<span><i class="fa fa-user" aria-hidden="true"></i>
							<a href="#
							">
							{{$thread->user != null ? $thread->user->name : ''}}
						</a>
					</span>
				</span>
				<span>|</span>
				<span class="port-time">
					<span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$thread->created_at}}</span>
				</span>
				<span>|</span>
				<span class="port-time">
					<span><i class="fa fa fa-bars" aria-hidden="true"></i>@if($thread->type == 1) Cần mua
                    @elseif ($thread->type == 2) Cần bán @else Tìm đối tác @endif</span>
				</span>
			</div>
			<div class="post-desc">
				{!!$thread->content!!}
			</div>
		</div>
	</div>
</div>