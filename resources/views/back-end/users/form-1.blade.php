<div class="panel-body">
    <fieldset class="form-horizontal">
    	 <input type="hidden" name="_id" id="user_id" value="{{isset($obj) ? $obj->id : ''}}">
         <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Tên đăng nhập (*) </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="username" id="username" 
                value="{{isset($obj) ? $obj->username : old('username')}}" required>
            </div>
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Email (*) </label>
            <div class="col-sm-5">
                <input type="email" class="form-control" name="email" id="email" 
                value="{{isset($obj) ? $obj->email : old('email')}}" required>
            </div>
        </div>
        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Số điện thoại (*) </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="phone" id="phone" 
                value="{{isset($obj) ? $obj->phone : old('phone')}}" required>
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
                value="{{old('password')}}" required>
                @endif
            </div>
        </div>
        @include('back-end.partials.status')
    </fieldset>
</div>