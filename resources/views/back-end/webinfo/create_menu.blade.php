@extends('back-end.layouts.main')

@section('title')
{{$page_name}}
@parent
@stop

@section('css')
@stop

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                {{-- Header table --}}
                <div class="ibox-title">
                    <h5 style="display: inline">Bảng danh sách</h5>
                </div>
                {{-- END Header table --}}
                <div class="ibox-content">
                    @include('back-end.partials.alert-msg')
                    <form action="{{route('menu_create')}}" method="POST">
                        @csrf
                        <fieldset class="form-horizontal">
                            <input type="hidden" name="_id" value="">
                            <div class="form-group ">
                                <label class="col-md-2 control-label">Tên Menu (*) </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" id="name" value="" placeholder="Tên Menu">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Menu cha</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="parent" id="parent" >
                                        <option value="">Không có</option>
                                        @foreach($parent_menu as $menu)
                                        <option value="{{$menu->id}}">
                                            {{$menu->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Trạng thái</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected>Sử dụng</option>
                                        <option value="0">Không sử dụng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <button class="btn btn-success pull-right">Tạo mới</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('back-end.partials.modals.delete')
@include('back-end.partials.modals.mutile-update')
@stop
@section('js')
<!-- iCheck -->
<script src="{{asset('js/select-all.js')}}"></script>
<script src="{{asset('backend/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('js/delete-modal.js')}}"></script>
<script src="{{asset('js/mutile-update.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#name').on('change', function(){
            $('#slug').val(str)
        })
    });
</script>
@stop