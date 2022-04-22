<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    @include('back-end.partials.alert-msg')
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1">Thông tin đăng nhập</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-3">Phân quyền</a></li>
                </ul>
                <div class="tab-content">
                    <!-- THONG TIN CHUNG -->
                    <div id="tab-1" class="tab-pane active">
                        @include('back-end.staff.form-1')  
                    </div>
                    <!-- KHUYEN MAI -->
                    <div id="tab-3" class="tab-pane">
                        @include('back-end.staff.form-3')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>