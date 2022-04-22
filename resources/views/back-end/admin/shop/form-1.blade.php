<div class="panel-body">
    <fieldset class="form-horizontal">
    	<input type="hidden" name="user_id" value="{{isset($obj) ? $obj->id : ''}}">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Email (*) </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="email" id="email" 
                value="{{isset($obj) ? $obj->email : old('email')}}" required>
            </div>
        </div>
        <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Tên truy cập (*) </label>
            <div class="col-sm-5">
                @if(isset($obj))
                <input type="text" class="form-control" name="username" id="username" 
                value="{{isset($obj) ? $obj->username : old('username')}}" required>
                @else
                <input type="text" class="form-control" name="username" id="username" 
                value="{{old('username')}}" required>
                @endif
                
            </div>
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Mật khẩu {{isset($obj) ? "" : "(*)"}}</label>
            <div class="col-sm-5">
                @if(isset($obj))
                <input type="password" style="font-style: italic;" class="form-control" name="password_new" id="password_new" 
                value="{{old('password_new')}}" placeholder="Nhập mật khẩu mới nếu muốn thay đổi">
                @else
                <input type="password" class="form-control" name="password" id="password" 
                value="{{old('password')}}">
                @endif
            </div>
        </div>     
        <div class="form-group">
            <label class="col-sm-2 control-label">Thứ tự</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="pos" id="pos" 
                value="{{isset($obj) ? $obj->pos : 999}}">
            </div>
        </div>
        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Trạng thái (*) </label>
            <div class="col-sm-5">
               <select class="form-control" name="status" required>
                   <option value="1" {{isset($obj) ? ($obj->status == 1 ? 'selected' : '') : (old('status') == 1 ? 'selected' : '')}}>Đang sử dụng</option>
                   <option value="2" {{isset($obj) ? ($obj->status == 2 ? 'selected' : '') : (old('status') == 2 ? 'selected' : '')}}>Chờ xét duyệt</option>
                   <option value="0" {{isset($obj) ? ($obj->status == 0 ? 'selected' : '') : (old('status') == 0 ? 'selected' : '')}}>Ngưng hoạt động</option>
               </select>
            </div>
        </div>
    </fieldset>
</div>