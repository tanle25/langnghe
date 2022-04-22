 <li class="buy-li">
    <div class="col-md-9 col-sm-9 buy-left">
        <div class="news-buy">
            <div class="icon-buy-li">
                <a href="{{route('ketnoi.detail',['id'=>$thread->id])}}">
                  <img src="{{get_image_thread($thread->main_image)}}">
              </a>
          </div>
          <div class="wrap-buy-li">
            <h4><a class="help-center-link" href="{{route('ketnoi.detail',['id'=>$thread->id])}}">{{$thread->name}}</a></h4>
            <div class="info-buy">
                <span class="userport">
                    <span><i class="fa fa-user" aria-hidden="true"></i><a href="#">{{$thread->user != null ? $thread->user->name : ''}}</a></span> 
                </span>
                <span >|</span>
                <span class="port-time">
                    <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$thread->created_at}}</span>
                </span>
                <span>|</span>
                <span class="port-time">
                    <span><i class="fa fa fa-bars" aria-hidden="true"></i>@if($thread->type == 1) Cần mua
                    @elseif ($thread->type == 2) Cần bán @else Tìm đối tác @endif</span>
                </span>
                <span>|</span>
               <!--  <span class="port-time">
                    <span><i class="fa fa fa-television" aria-hidden="true"></i> 8 lượt xem</span>
                </span> -->
            </div>
            <div class="post-desc">
               {!!$thread->content!!}
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 col-sm-3 text-l">
    <div class="post-area">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
       {{$thread->xa_model != null ? $thread->xa_model->name : ''}}
    </div>
</div>
<div class="clearfix"></div>
</li>