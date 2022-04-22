@extends('admin.layouts.default')

@section('title')
Chi tiết người dùng
@parent
@stop

@section('css')

@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
        <h2>Thông tin người dùng</h2>
        <ol class="breadcrumb">
	        <li>
	            <a href="{{route('home')}}">Home</a>
	        </li>
	        <li>
	            <a href="{{route('list-user')}}">Danh sách người dùng</a>
	        </li>
	        <li class="active">
	            <strong>Thông tin người dùng</strong>
	        </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
        	<a href="#" class="btn btn-white"><i class="fa fa-check "></i> Save </a>
            <a href="" class="btn btn-primary">This is action area</a>
        </div>
    </div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		{{-- START Detail  --}}
		<div class="col-md-4">
			<div class="ibox float-e-margins">
			 	<div class="ibox-title">
                    <h5>Thông tin người dùng</h5>
                </div>
                <div class="ibox-content no-padding border-left-right">
                    <img alt="image" class="img-responsive" src="{{asset('assets/img/profile_big.jpg')}}">
                </div>
                <div class="ibox-content profile-content">
                    <h4><strong>Monica Smith</strong></h4>
                    <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
                    <h5>
                        About me
                    </h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                    </p>
                    <div class="row m-t-lg">
                        <div class="col-md-4">
                            <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                            <h5><strong>169</strong> Posts</h5>
                        </div>
                        <div class="col-md-4">
                            <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                            <h5><strong>28</strong> Following</h5>
                        </div>
                        <div class="col-md-4">
                            <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span>
                            <h5><strong>240</strong> Followers</h5>
                        </div>
                    </div>
                    <div class="user-button">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                            </div>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
        {{-- END Detail --}}

        {{-- START Active  --}}
        <div class="col-md-8"> 
        	<div class="ibox float-e-margins">
        		<div class="ibox-title">
                    <h5>Activites</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div>
                        <div class="feed-activity-list">
                        <div class="feed-element">
                            <a href="#" class="pull-left">
                                <img alt="image" class="img-circle" src="{{asset('assets/img/a1.jpg')}}">
                            </a>
                            <div class="media-body ">
                            <small class="pull-right text-navy">1m ago</small>
                            <strong>Sandra Momot</strong> started following <strong>Monica Smith</strong>. <br>
                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            <div class="actions">
                                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                <a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> Love</a>
                            </div>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
        {{-- END Active --}}	
	</div>		
</div>
{{-- END Main Content --}}

@stop
{{-- Page content --}}

@section('script')
	
@stop