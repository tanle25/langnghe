 <div class="modal fade" id="modal-lienhe" data-backdrop="static">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal" role="form" action="{{route('require-buy.post')}}" 
                enctype="multipart/form-data" method="POST">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"> Thông tin yêu cầu </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" id="name" name="name"  placeholder="Nhập tên liên hệ" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" id="phone" name="phone"  placeholder="Nhập số điện thoại liên hệ" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" id="email" name="email"  placeholder="Nhập email liên hệ">
                    </div>
                    <div class="form-group">
                        <textarea id="address" name="address" rows="3"  class="form-control" placeholder="Địa chỉ liên hệ" required></textarea>
                    </div>
                     <div class="form-group">
                        <textarea id="content" name="content" rows="3"  class="form-control" placeholder="Nội dung yêu cầu" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Hủy</button>
                    <button id="btn-send-request-product" type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Gửi</button>
                </div>
            </div>
            <input type="hidden" id="product_id" name="product_id" />
        </form>
    </div>
</div>