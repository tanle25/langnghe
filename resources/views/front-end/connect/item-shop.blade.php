 <div class="wrap-ncc-r match-my-cols is-flex1">
    <div class="ncc-rightlist media">
        <a class= "pull-left" href="#" >
            <img class="img-ncc-right-list" title="" alt="" src="{{$shop->getThumb($shop->image)}}">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="{{route('shop.chitiet',['username'=>$shop->username])}}">{{$shop->tencs}}</a></h4>
            <p><b>Địa chỉ: </b>{{$shop->xom}}</p>
        </div>
    </div>
</div>