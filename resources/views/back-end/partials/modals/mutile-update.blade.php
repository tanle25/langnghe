<div class="modal fade" id="mutile-update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="ps-form--checkout" id="modal-form" role="form" action="" 
        enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="data_selected[]" value="" id="data-selected">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Lựa chọn tác vụ</h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group" >
            <select class="form-control m-b" name="status" id="status" required>
              <option value="2">Xóa đồng loạt</option>
              <option value="1">Update trạng thái sử dụng</option>
              <option value="0">Update trạng thái tạm dừng</option>
            </select>     
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-success" type="submit" >Thực hiện</button>
        </div>
      </form>
    </div>
  </div>
</div>