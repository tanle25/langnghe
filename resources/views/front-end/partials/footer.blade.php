 <footer id="footer">
    <div class="ft-before">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="colItem">
                                <h3 class="title_3diI">VỀ CHÚNG TÔI</h3>
                                <ul>
                                    <li class="link_1kzK">
                                        <a href="/gioi-thieu">Giới thiệu</a>
                                    </li>
                                    <li class="link_1kzK">
                                        <a href="/dong-trung-ha-thao" rel="nofollow">Đông Trùng Hạ Thảo</a>
                                    </li>
                                    <li class="link_1kzK">
                                        <a href="/quy-chet-hoat-dong" rel="nofollow">Quy chế hoạt động</a>
                                    </li>
                                    <li class="link_1kzK">
                                        <a href="/chinh-sach-bao-mat" rel="nofollow">Chính sách bảo mật</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="colItem">
                                <h3 class="title_3diI">DÀNH CHO NGƯỜI MUA</h3>
                                <ul>
                                    <li class="link_1kzK">
                                        <a href="/giai-quyet-khieu-nai" rel="nofollow">Giải quyết khiếu nại</a>
                                    </li>
                                    <li class="link_1kzK">
                                        <a href="/huong-dan-mua-hang" rel="nofollow">Hướng dẫn mua hàng</a>
                                    </li>
                                    <li class="link_1kzK">
                                        <a href="/chinh-sach-doi-tra" rel="nofollow">Chính sách đổi trả</a>
                                    </li>
                                    <li class="link_1kzK">
                                        <a href="/cham-soc-khach-hang" rel="nofollow">Chăm sóc khách hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="colItem">
                                <h3 class="title_3diI">DÀNH CHO NGƯỜI BÁN</h3>
                                <ul>
                                    <li class="link_1kzK">
                                        <a href="/quy-dinh-doi-voi-nguoi-ban" rel="nofollow">Quy định đối với người bán</a>
                                    </li>
                                    <li class="link_1kzK">
                                        <a href="/huong-dan-tao-shop-ban-hang" rel="nofollow">Hướng dẫn tạo Shop bán hàng</a>
                                    </li>
                                    <li class="link_1kzK">
                                        <a href="/chinh-sach-ban-hang" rel="nofollow">Chính sách bán hàng</a>
                                    </li>
                                    <li class="link_1kzK">
                                        <a href="/he-thong-tieu-chi-kiem-duyet" rel="nofollow">Hệ thống tiêu chí kiểm duyệt</a>
                                    </li>
                                </ul>
                                <p><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FL%25C3%25A0ng-Ngh%25E1%25BB%2581-Du-L%25E1%25BB%258Bch-Thanh-H%25C3%25B3a-109043417544397&tabs&width=210&height=152&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="210" height="152" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div class="colItem">
                                <h3 class="title_3diI">Số lượt truy cập</h3>
                                <div class="subscribeEmailBox_2Oov">
                                    <h5 style="color: #fff">Tổng số lượt truy cập: 
                                        {{
                                            App\Admin\ShopView::count() + 4000
                                        }}
                                    </h5>
                                    <h5 style="color: #fff">Số lượt truy cập trong ngày: 
                                        {{
                                            App\Admin\ShopView::whereDate('created_at', DB::raw('CURDATE()'))->count() + 1500
                                        }}
                                    </h5>
                                </div>
                            </div>
                            <div class="colItem footer-logo">
                                <h3 class="title_3diI">Quét mã QR</h3>
                                <span>
                                    <img src="https://langnghethanhhoa.vn/FILES/source/qrcode-app.png" alt="">
                                </span>
                                <div class="application">
                                    <a href="https://langnghethanhhoa.vn/FILES/langnghe.apk" target="_blank">
                                        <img src="https://langnghethanhhoa.vn/FILES/source/adr.png" alt="Tải ứng dụng trên Google Play" width="100">
                                    </a>
                                    <a href="#" target="_blank">
                                        <img src="https://langnghethanhhoa.vn/FILES/source/ios.png" alt="Tải ứng dụng trên App Store" width="80">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="colItem">
                                <h3 class="title_3diI">Thông tin liên hệ</h3>
                                <p>Địa chỉ: Số 28 Cao Thắng, P.Điện Biên, TP.Thanh Hóa, Tỉnh Thanh Hoá</p>
                                <p>Điện thoại: 0378.886.868 - 0373.714.268</p>
                                <p>Email: gm@tanthanhphuong.vn</p>
                                <a href="http://online.gov.vn/Home/WebDetails/63719" title=""><img src="http://online.gov.vn/Content/EndUser/LogoCCDVSaleNoti/logoCCDV.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="end-ft">
        <span>© 2020 Bản quyển thuộc về Công ty cổ phần đầu tư phát triển công nghệ Tân Thanh Phương</span><br>
        <span>Giấy chứng nhận Đăng ký Kinh doanh số 2800817718 do Sở kế hoạch và đầu tư tỉnh Thanh Hóa cấp ngày 02/04/2004.</span>
    </div>
</footer>