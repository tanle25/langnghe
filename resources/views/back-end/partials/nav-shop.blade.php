<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            @include('back-end.partials.nav-header')
            <li class={{$flag == "shop-product" || $flag == "product-views"  || $flag == "product-rate" ||  $flag == "product-like" ||  $flag == "product-ask" ? "active" : ""}}>
                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">SẢN PHẨM</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "shop-product"  ? "active" : ""}}><a href="{{route('product.index')}}">Tất cả sản phẩm</a></li>
                    <li class={{$flag == "product-rate"  ? "active" : ""}}><a href="{{route('product-rate.index')}}">Danh sách đánh giá</a></li>
                    <li class={{$flag == "product-like"  ? "active" : ""}}><a href="{{route('product-like.index')}}">Danh sách yêu thích</a></li>
                    <li class={{$flag == "product-ask"  ? "active" : ""}}><a href="{{route('product-ask.index')}}">Danh sách Q&A</a></li>
                </ul>
            </li>
            <li class={{$flag == "shop-checkout" || $flag == "shop-req"  ? "active" : ""}}>
                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">ĐƠN HÀNG/ YÊU CẦU</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "shop-checkout"  ? "active" : ""}}><a href="{{route('shop.checkout')}}">Tất cả đơn hàng</a></li>
                    <li class={{$flag == "shop-req"  ? "active" : ""}}><a href="{{route('shop.req')}}">Tất cả yêu cầu</a></li>
                </ul>
            </li>
            <li class={{$flag == "shop-doc" || $flag == "shop-views"  || $flag == "shop-rate" ||  $flag == "shop-like" ||  $flag == "shop-ask" ? "active" : ""}}>
                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">CƠ SỞ</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "shop-doc"  ? "active" : ""}}><a href="{{route('doc.index')}}">Giấy tờ</a></li>
                    <li class={{$flag == "shop-rate"  ? "active" : ""}}><a href="{{route('shop-rate.index')}}">Danh sách đánh giá</a></li>
                    <li class={{$flag == "shop-like"  ? "active" : ""}}><a href="{{route('shop-like.index')}}">Danh sách yêu thích</a></li>
                    <li class={{$flag == "shop-ask"  ? "active" : ""}}><a href="{{route('shop-ask.index')}}">Danh sách Q&A</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>