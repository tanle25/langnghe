<li class="nav-header">
    <div class="dropdown profile-element"> <span>
        <img alt="image" class="img-circle" src="{{asset('backend/img/profile_small.jpg')}}" />
    </span>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
        </span> <span class="text-muted text-xs block">Quản trị viên<b class="caret"></b></span> </span> </a>
        <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a href="{{route('admin.profile')}}">Thông tin cá nhân</a></li>
            <li class="divider"></li>
            <li><a href="{{ route('admin.logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>Đăng xuất
                </a>
            </li>
        </ul>
    </div>
    <div class="logo-element">
        IN+
    </div>
</li>