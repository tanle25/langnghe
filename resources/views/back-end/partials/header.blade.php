 <div class="row border-bottom">
    <input type="hidden" id="base_url" value="{{config('admin.base_url')}}">
    <input type="hidden" id="ckeditor_path" value="{{env('CKEDITOR_PATH','')}}">
    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form><i class="fa fa-sign-out"></i>Đăng xuất
                </a>
            </li>
        </ul>

    </nav>
</div>