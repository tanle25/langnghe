<?php
    $brands = App\Admin\Brand::where('status', 1)->get();
?>
<div class="container-fluil wrap-ncc">
    <div class="container">
        <div class="box-ncc">
            <div class="box-header-ncc">Thương hiệu đồng hành</div>
            <div class="wrap-th">
                <div class="row">
                    @foreach($brands as $key => $value)
                    <div class="col-md-2 col-sm-4 col-xs-6 item">
                        <div class="logoncc">
                            <a target="_blank" href="javascript:void(0)">
                                <img src="{{asset($value->url)}}" alt="{{$value->name}}" />
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>