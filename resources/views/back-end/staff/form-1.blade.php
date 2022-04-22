<div class="panel-body">
    <fieldset class="form-horizontal">
    	<input type="hidden" name="user_id" value="{{isset($obj) ? $obj->id : ''}}">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Email (*) </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="email" id="email" 
                value="{{isset($obj) ? $obj->email : old('email')}}" required>
            </div>
        </div>
        <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Username (*) </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="username" id="username" 
                value="{{isset($obj) ? $obj->username : old('username')}}" required>
            </div>
        </div>
        <div class="form-group" >
            <label class="col-sm-2 control-label">Xã</label>
            <div class="col-md-4">
                <select class="form-control m-b" name="xa_id" id="xa_id" >
                    <option label=""></option>
                    @foreach($xas as $xa)
                    <option value="{{$xa->id}}" {{isset($obj) ? ($obj->xa_id == $xa->id ? 'selected' : '') :
                    (old('xa_id') == $xa->id ? 'selected' : '')}}>
                    {{$xa->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label"> {{isset($obj) ? "New password" : "Password(*)"}}</label>
            <div class="col-sm-4">
                @if(isset($obj))
                <input type="password" style="font-style: italic;" class="form-control" name="password_new" id="password_new" 
                value="{{old('password_new')}}" placeholder="new password (only fill when you want to change)">
                @else
                <input type="password" class="form-control" name="password" id="password" 
                value="{{old('password')}}" required>
                @endif
            </div>
        </div>
        @include('back-end.partials.status')
    </fieldset>
</div>