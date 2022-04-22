 <div class="buy-center" >
    <div class="box-mark">
        <div class="row wrap-box-mark">
            <div class="col-md-4 col-xs-4">
                <div class="col-mark">
                    <a style="cursor: pointer;" class="connect-image" data-value="1">
                        <img src="https://www.nongsanantoanthanhhoa.vn/css/images/canmua.png" >
                        <div class="headingmark">Cần mua</div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-4">
                <div class="col-mark">
                    <a style="cursor: pointer;"  class="connect-image" data-value="2">
                        <img src="https://www.nongsanantoanthanhhoa.vn/css/images/canban.png" >
                        <div class="headingmark">Cần bán</div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-4">
                <div class="col-mark">
                    <a style="cursor: pointer;"  class="connect-image" data-value="3">
                        <img src="https://www.nongsanantoanthanhhoa.vn/css/images/timdoitac.png" >
                        <div class="headingmark">Tìm đối tác</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('ketnoi.search')}}" method="GET">
    <div class="search-kncc">
        <div class=""></div>
        <div class="form-inline" >
            <div class="clearfix"></div>
        <div class="col-md-7 col-100">
            <div class="form-group">
                <div class="input-group">
                    <input value="" type="text" class="form-control" name="keyword" placeholder="Bạn cần tìm gì ?" required>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-100">
            <div class="form-group">
                <div class="input-group">
                    <button type="submit" class="btn-grid-search" id="btn-search-ads">Tìm kiếm</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>