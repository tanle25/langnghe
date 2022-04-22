@extends('back-end.layouts.main')

@section('title')
Trang quản lý files hệ thống
@endsection


@section('content')
<!-- HEADER POST -->
<div class="wrapper wrapper-content">
	<iframe src="{{url('../filemanager/dialog.php?type=0&field_id=thumb_0')}}" style="width: 100%; height: 800px; overflow: hidden; border: none;"></iframe>
</div>
@stop
