<label class="col-md-4 col-form-label text-md-right">Xa:</label>
<div class="col-lg-8 col-sm-8">
    <select class="js-example-basic-single col-lg-12" id="xa" name="xa" required>
        <option label=""></option>
        @if($data != null)
            @foreach($data as $xa)
            <option value="{{$xa->id}}" {{isset($user) ? ($user->xa == $xa->id ? 'selected' : '') :
            (old('xa_id') == $xa->id ? 'selected' : '')}}>
            {{$xa->name}}
            </option>
            @endforeach
        @endif
    </select>
</div>