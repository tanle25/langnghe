<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            @include('back-end.partials.nav-header')
            <li class={{in_array($flag, ['thong-tin-chung', 'header', 'menu', 'page', 'banner', 'section', 'content', 'files', 'brand']) ? "active" : ""}}>
                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">Thiết lập website</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "thong-tin-chung"  ? "active" : ""}}><a href="{{route('thong-tin-chung')}}">Thông tin chung</a></li>
                    <li class={{$flag == "page"  ? "active" : ""}}><a href="{{route('page.index')}}">Danh sách trang</a></li>
                    <li class={{$flag == "header"  ? "active" : ""}}><a href="{{route('header')}}">Header / Footer</a></li>
                    <li class={{$flag == "menu"  ? "active" : ""}}><a href="{{route('menu')}}">Menu</a></li>
                    <li class={{$flag == "banner"  ? "active" : ""}}><a href="{{route('banner.index')}}">Banner</a></li>
                    <li class={{$flag == "section"  ? "active" : ""}}><a href="{{route('section.index')}}">Cấu hình Section</a></li>
                    <li class={{$flag == "content"  ? "active" : ""}}><a href="{{route('content.index')}}">Cấu hình Content</a></li>
                    <li class={{$flag == "files"  ? "active" : ""}}><a href="{{route('admin.files')}}">Source Files</a></li>
                    <li class={{$flag == "brand"  ? "active" : ""}}><a href="{{route('brand')}}">Thương hiệu đồng hành</a></li>
                </ul>
            </li>
            <li class={{$flag == "TypeProduct" || $flag == "admin-product" || $flag == "admin-views"  || $flag == "admin-rate" ||  $flag == "admin-like" ||  $flag == "admin-ask" ? "active" : ""}}>
                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">SẢN PHẨM</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "admin-product"  ? "active" : ""}}><a href="{{route('admin-product.index')}}">Tất cả sản phẩm</a></li>
                    <li class={{$flag == "TypeProduct"  ? "active" : ""}}><a href="{{route('type-product.index')}}">Danh mục sản phẩm</a></li>
                    <li class={{$flag == "admin-views"  ? "active" : ""}}><a href="{{route('admin-views.index')}}">Danh sách lượt xem</a></li>
                    <li class={{$flag == "admin-rate"  ? "active" : ""}}><a href="{{route('admin-rate.index')}}">Danh sách đánh giá</a></li>
                    <li class={{$flag == "admin-like"  ? "active" : ""}}><a href="{{route('admin-like.index')}}">Danh sách yêu thích</a></li>
                    <li class={{$flag == "admin-ask"  ? "active" : ""}}><a href="{{route('admin-ask.index')}}">Danh sách Q&A</a></li>
                </ul>
            </li>
            <li class={{$flag == "shop" || $flag == "admin-shop-doc" || $flag == "admin-shop-views"  || $flag == "admin-shop-rate" ||  $flag == "admin-shop-like" ||  $flag == "admin-shop-ask" ? "active" : ""}}>
                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">CƠ SỞ KD</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "shop"  ? "active" : ""}}><a href="{{route('shop.index')}}">Tất cả cơ sở</a></li>
                    <li class={{$flag == "admin-shop-doc"  ? "active" : ""}}><a href="{{route('shop-doc.index')}}">Giấy tờ</a></li>
                    <li class={{$flag == "admin-shop-views"  ? "active" : ""}}><a href="{{route('admin-shop-views.index')}}">Danh sách lượt xem</a></li>
                    <li class={{$flag == "admin-shop-rate"  ? "active" : ""}}><a href="{{route('admin-shop-rate.index')}}">Danh sách đánh giá</a></li>
                    <li class={{$flag == "admin-shop-like"  ? "active" : ""}}><a href="{{route('admin-shop-like.index')}}">Danh sách yêu thích</a></li>
                    <li class={{$flag == "admin-shop-ask"  ? "active" : ""}}><a href="{{route('admin-shop-ask.index')}}">Danh sách Q&A</a></li>
                </ul>
            </li>
            <li class={{$flag == "admin-checkout" || $flag == "admin-req"  ? "active" : ""}}>
                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">ĐƠN HÀNG/ YÊU CẦU</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "admin-checkout"  ? "active" : ""}}><a href="{{route('admin.checkout')}}">Tất cả đơn hàng</a></li>
                    <li class={{$flag == "admin-req"  ? "active" : ""}}><a href="{{route('admin.req')}}">Tất cả yêu cầu</a></li>
                </ul>
            </li>
            <li class={{$flag == "thread"  ? "active" : ""}}>
                <a href="{{route('thread.index')}}"><i class="fa fa-file-text-o"></i> <span class="nav-label">TIN ĐĂNG CUNG/CẦU</span></a>
            </li>
            <li class={{$flag == "post" || $flag == "category"  ? "active" : ""}}>
                <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">BÀI VIẾT</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "post"  ? "active" : ""}}>
                        <a href="{{route('post.index')}}"><span class="nav-label">Danh sách bài viết</span></a>
                    </li>
                    <li class={{$flag == "category"  ? "active" : ""}}>
                        <a href="{{route('category.index')}}"><span class="nav-label">Chuyên Mục</span></a>
                    </li>
                </ul>
            </li>
            <li class={{$flag == "album" || $flag == "media"  ? "active" : ""}}>
                <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">THƯ VIỆN</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "media"  ? "active" : ""}}>
                        <a href="{{route('media.index')}}"><span class="nav-label">Videos</span></a>
                    </li>
                </ul>
            </li>
            <li class={{$flag == "contact"  ? "active" : ""}}>
                <a href="{{route('contact.index')}}"><i class="fa fa-file-text-o"></i> <span class="nav-label">LIÊN HỆ</span></a>
            </li>
            <li class={{$flag == "user"  ? "active" : ""}}>
                <a href="{{route('user.index')}}">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">THÀNH VIÊN</span>
                </a>
            </li>
            <li class={{$flag == "staff"  ? "active" : ""}}>
                <a href="{{route('staff.index')}}">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">QUẢN TRỊ VIÊN</span>
                </a>
            </li>
            <!-- <li class="landing_link">
                <a target="_blank" href="#"><i class="fa fa-star"></i> <span class="nav-label">Website</span></a>
            </li> -->
        </ul>
    </div>
</nav>