 <div class="container-fluil wrap-ncc">
    <div class="container">
        <div class="box-ncc">
            <div class="box-header">
                <a  href="{{route('shop.list')}}">Cơ sở sản xuất, kinh doanh</a>
            </div>
            <div class="wrap-cssx">
                <div class="business-list row">
                    @foreach($shops as $shop)
                        @include('front-end.shop.item-home',['shop'=>$shop])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
