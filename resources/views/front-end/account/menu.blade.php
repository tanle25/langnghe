<aside class="main-sidebar main-sidebar-left">
 	<section class="sidebar" style="height: auto;">
 		<div class="user-panel">
 			<div class="pull-left image">
 				<div class="image-sidebar"><img src="{{get_avatar($user)}}" height="45" width="45" class="img-circle">
 				</div>
 			</div>
 			<div class="pull-left info">
 				<p class="name-static">Trang cá nhân của</p>
 				<div class="org-name"><a href="{{route('profile.get')}}">{{$user->name}}</a>
 				</div>
 			</div>
 		</div>
 		<div class="user-menu-left">
 			<div class="my-business-wrap">
 				<div class="my-business-menu-item  {{$flag == "tindang"  ? "menu-checked" : ""}}">
 					<a class="my-business-menu-wrap-item" href="{{route('userTinDang', ['id'=>auth()->user()->id])}}" title="Tất cả tin đăng">
 						<i class="sdc fa fa-random"></i>
 						<span class="my-business-menu-content">Tin của bạn</span>
 					</a>
 				</div>

 				<div class="my-business-menu-item {{$flag == "dangtin"  ? "menu-checked" : ""}}">
 					<a class="my-business-menu-wrap-item" href="{{route('dangtin')}}" title="Đăng tin cung cầu">
 						<i class="sdc fa fa-random"></i>
 						<span class="my-business-menu-content">Đăng tin cung cầu</span>
 					</a>
 				</div>
 				<div class="my-business-menu-item {{$flag == "acc"  ? "menu-checked" : ""}}">
 					<a class="my-business-menu-wrap-item" href="{{route('profile.get')}}" title="Thông tin cá nhân">
 						<i class="sdc fa fa-user"></i>
 						<span class="my-business-menu-content">Thông tin cá nhân</span>
 					</a>
 				</div>
 			</div>
 		</div>
 	</section>
</aside>