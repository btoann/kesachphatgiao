<?php

if(isset($_SESSION['sbs_user']) && $_SESSION['sbs_user']['id'] > 0)
{
    if($_SESSION['sbs_user']['role'] == 0)
    {
?>

<div id="user_login" class="container">
    <div class="frame frame-forgot-<?= (!isset($_SESSION['forgot_send'])) ? '1' : '2' ?>"
        class="btn-signin main-bg hl-bg-hv lightgray-txt-i">
        <div class="nav">
            <ul class="links">
                <li class="signin-active"><a class="btn" href="#">Kích hoạt tài khoản</a></li>
            </ul>
        </div>

        <p class="logo-text">
            <a href="index.php">
                <span class="bside-txt">SIDE</span><span class="gray-txt between">by</span><span
                    class="hl-txt">SIDE</span>
            </a>
        </p>

        <div ng-app ng-init="checked = false">
            <form action="index.php?ctrl=account&act=user&id=<?= $_SESSION['sbs_user']['id'] ?>" class="form-forgot"
                method="post" name="form" autocomplete="off" id="forgotform">

                <p class="forgot-messenge gray-txt">
                    <label for="">Tài khoản chưa được kích hoạt</label>
                    <?= isset($_SESSION['sbs_user']['active_time_sent']) ? 'Kiểm tra hộp thư của bạn để nhận đường link kích hoạt của chúng tôi' : 'Gửi mã để kích hoạt tài khoản của bạn' ?><br>
                    <strong>*Lưu ý: </strong><em class="hl-txt">Mã kích hoạt chỉ tồn tại trong 5 phút kể từ lúc gửi
                        mail</em>
                </p>
                <input type="submit" name="resend_verify"
                    value="<?= isset($_SESSION['sbs_user']['active_time_sent']) ? 'Gửi lại mã kích hoạt' : 'Gửi mã kích hoạt' ?>"
                    class="btn-signin main-bg hl-bg-hv lightgray-txt-i">

            </form>

            <form class="form-signup">
            </form>
            <div class="success">
            </div>
        </div>

    </div>
</div>

<?php
    }
    if($_SESSION['sbs_user']['role'] > 0)
    {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="../../../css/client/css-fix/style.css" />
    <link rel="stylesheet" href="../../../icons/css/fontello.css" />
    <script src="https://kit.fontawesome.com/978d2e326d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="header">
        <div class="logo">
            <a href="./index-fix.html"><img src="../../../images/logo.png" alt="" /></a>
        </div>
        <div class="menu">
            <div class="menu-top">
                <div class="menu-top-list">
                    <ul>
                        <li><a href="#">Bán hàng cùng SBS</a></li>
                        <li><a href="#" class="a">Chăm sóc khách hàng</a></li>
                        <li><a href="#" class="a">Kiểm tra đơn hàng</a></li>
                        <li><a href="#" class="a">Chế độ tối</a></li>
                        <li><a href="#" class="a">Thay đổi ngôn ngữ</a></li>
                    </ul>
                </div>
                <div class="menu-top-login">
                    <p><a href="#">Đăng Nhập</a> <i class="icon-user-2"></i></p>
                </div>
            </div>
            <div class="menu-bottom">
                <div class="menu-bottom-category">
                    <p>
                        <a href="#" class="a1"><i class="icon-list-nested"></i> Danh mục</a>
                    </p>
                    <div class="hover">
                        <div class="category">
                            <div class="category-hover">
                                <ul class="block-1">
                                    <li>
                                        <strong> Thiết bị di động</strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Điện tử - Điện lạnh </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Phụ kiện - Thiết bị số </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Laptop - Thiết bị IT </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Điện gia dụng </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Tiêu dùng - Thực phẩm </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Mẹ và bé </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Thời trang - Phụ kiện </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Phụ nữ - Làm đẹp </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Học tập </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Thể thao - Dã ngoại </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Y tế - Sức khỏe </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Giao thông - di chuyển </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Truyền thông - Giải trí </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <strong>Voucher - Dịch vụ </strong>
                                        <span>
                                            <i class="fas fa-angle-right" style="font-size: 18px"></i>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-bottom-search">
                    <div class="menu-bottom-search-in">
                        <input type="text" placeholder="Tìm kiếm sản phẩm, danh mục, đại lý..." /><a href="#"><i
                                class="fas fa-search"></i></a>
                        <hr />
                    </div>
                </div>
                <div class="menu-bottom-cart">
                    <i class="fas fa-shopping-cart"></i><span class="shopping-number">0</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-px-0">
        <div class="row-information-user">
            <div class="information-menu">
                <div class=""></div>
                <div class="menu-item">
                    <div class="menu-item-img">
                        <img src="../../../images/dna.jpg" alt="" />
                    </div>
                    <div class="menu-item-name">
                        <div>Đào Nhật Anh</div>
                        <div class="deal-price">sửa hồ sơ</div>
                    </div>
                </div>
                <hr />
                <div class="menu-item">
                    <div class="icon"><i class="fas fa-user-circle"></i></div>
                    <div><a href="">Tài Khoản của tôi</a></div>
                </div>
                <div class="menu-item">
                    <div class="icon1"><i class="fas fa-book"></i></div>
                    <div><a href="./product-history.html">Đơn mua</a></div>
                </div>
                <div class="menu-item">
                    <div class="icon2"><i class="fas fa-bell"></i></div>
                    <div><a href="./notification.html">Thông Báo</a></div>
                </div>
                <div class="menu-item">
                    <div class="icon3"><i class="fas fa-wallet"></i></div>
                    <div><a href="./voucher.html">Ví voucher</a></div>
                </div>
            </div>
            <div class="information-detail">
                <div class="information-detail-item">
                    <div class="detail-item">
                        <div>
                            <h3>Hồ Sơ Của Tôi</h3>
                        </div>
                        <div>Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
                    </div>
                    <hr />
                    <div class="detail-profile">
                        <div class="my-account-profile__left">
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label">
                                        <label>Tên đăng nhập</label>
                                    </div>
                                    <div class="input-with-label__content">
                                        <div class="my-account__inline-container">
                                            <div class="my-account__input-text">Đào Nhật Anh</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label">
                                        <label>Tên</label>
                                    </div>
                                    <div class="input-with-label__content">
                                        <div class="input-with-validator-wrapper">
                                            <div class="input-with-validator">
                                                <input type="text" placeholder="" value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label">
                                        <label>Email</label>
                                    </div>
                                    <div class="input-with-label__content">
                                        <div class="my-account__inline-container">
                                            <div class="my-account__input-text"></div>
                                            <button
                                                class="my-account__no-background-button my-account-profile__change-button">
                                                <a href="https://accounts.google.com/signin">Thêm</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label">
                                        <label>Số điện thoại</label>
                                    </div>
                                    <div class="input-with-label__content">
                                        <div class="my-account__inline-container">
                                            <div class="my-account__input-text"></div>
                                            <button
                                                class="my-account__no-background-button my-account-profile__change-button">
                                                Thêm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label">
                                        <label>Tên Shop</label>
                                    </div>
                                    <div class="input-with-label__content">
                                        <div class="input-with-validator-wrapper">
                                            <div class="input-with-validator">
                                                <input type="text" placeholder="" value="Đào Nhật Anh" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label">
                                        <label>Giới tính</label>
                                    </div>
                                    <div class="input-with-label__content">
                                        <div class="my-account-profile__gender">
                                            <div class="stardust-radio-group">
                                                <div class="stardust-radio">
                                                    <div class="stardust-radio-button">
                                                        <div class="stardust-radio-button__outer-circle">
                                                            <div class="stardust-radio-button__inner-circle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="stardust-radio__content">
                                                        <div class="stardust-radio__label">Nam</div>
                                                    </div>
                                                </div>
                                                <div class="stardust-radio">
                                                    <div class="stardust-radio-button">
                                                        <div class="stardust-radio-button__outer-circle">
                                                            <div class="stardust-radio-button__inner-circle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="stardust-radio__content">
                                                        <div class="stardust-radio__label">Nữ</div>
                                                    </div>
                                                </div>
                                                <div class="stardust-radio">
                                                    <div class="stardust-radio-button">
                                                        <div class="stardust-radio-button__outer-circle">
                                                            <div class="stardust-radio-button__inner-circle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="stardust-radio__content">
                                                        <div class="stardust-radio__label">Khác</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label">
                                        <label>Ngày sinh</label>
                                    </div>
                                    <div class="input-with-label__content">
                                        <div class="_2AC_Jd">
                                            <div class="shopee-dropdown shopee-dropdown--has-selected">
                                                <div class="shopee-dropdown__entry shopee-dropdown__entry--selected">
                                                    <span>1</span><svg enable-background="new 0 0 11 11"
                                                        viewBox="0 0 11 11" x="0" y="0"
                                                        class="shopee-svg-icon icon-arrow-down">
                                                        <g>
                                                            <path
                                                                d="m11 2.5c0 .1 0 .2-.1.3l-5 6c-.1.1-.3.2-.4.2s-.3-.1-.4-.2l-5-6c-.2-.2-.1-.5.1-.7s.5-.1.7.1l4.6 5.5 4.6-5.5c.2-.2.5-.2.7-.1.1.1.2.3.2.4z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="shopee-dropdown shopee-dropdown--has-selected">
                                                <div class="shopee-dropdown__entry shopee-dropdown__entry--selected">
                                                    <span>Tháng 1</span><svg enable-background="new 0 0 11 11"
                                                        viewBox="0 0 11 11" x="0" y="0"
                                                        class="shopee-svg-icon icon-arrow-down">
                                                        <g>
                                                            <path
                                                                d="m11 2.5c0 .1 0 .2-.1.3l-5 6c-.1.1-.3.2-.4.2s-.3-.1-.4-.2l-5-6c-.2-.2-.1-.5.1-.7s.5-.1.7.1l4.6 5.5 4.6-5.5c.2-.2.5-.2.7-.1.1.1.2.3.2.4z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="shopee-dropdown shopee-dropdown--has-selected">
                                                <div class="shopee-dropdown__entry shopee-dropdown__entry--selected">
                                                    <span>1990</span><svg enable-background="new 0 0 11 11"
                                                        viewBox="0 0 11 11" x="0" y="0"
                                                        class="shopee-svg-icon icon-arrow-down">
                                                        <g>
                                                            <path
                                                                d="m11 2.5c0 .1 0 .2-.1.3l-5 6c-.1.1-.3.2-.4.2s-.3-.1-.4-.2l-5-6c-.2-.2-.1-.5.1-.7s.5-.1.7.1l4.6 5.5 4.6-5.5c.2-.2.5-.2.7-.1.1.1.2.3.2.4z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-account-page__submit">
                                <button type="button" class="btn btn-solid-primary btn--m btn--inline"
                                    aria-disabled="false">
                                    Lưu
                                </button>
                            </div>
                        </div>
                        <div class="my-account-profile__right">
                            <div class="avatar-uploader">
                                <div class="avatar-uploader__avatar">
                                    <div class="avatar-uploader__avatar-image" style="background-image: url('')">
                                        <img src="../../../images/dna.jpg" alt="" />
                                    </div>
                                </div>
                                <input class="avatar-uploader__file-input" type="file"
                                    accept=".jpg,.jpeg,.png" /><button type="button"
                                    class="btn btn-light btn--m btn--inline">
                                    Chọn ảnh
                                </button>
                                <div class="avatar-uploader__text-container">
                                    <div class="avatar-uploader__text">
                                        Dụng lượng file tối đa 1 MB
                                    </div>
                                    <div class="avatar-uploader__text">
                                        Định dạng:.JPEG, .PNG
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Container-itwfbd-0 jFkAwY" style="height: 100px; padding-top: 32px">
        <div class="NewsLetter-icon">
            <img src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/newsletter.png" width="163" alt="" />
        </div>
        <div class="NewsLetter-description">
            <h3>Đăng ký nhận bản tin Side by Side</h3>
            <h5>Đừng bỏ lỡ hàng ngàn sản phẩm và chương trình siêu hấp dẫn</h5>
        </div>
        <div class="NewsLetter-form">
            <div>
                <input type="email" placeholder="Địa chỉ email của bạn" value="" />
            </div>
            <button>Đăng ký</button>
        </div>
    </div>
    <div class="Footer__Information-e3clg6-3 dZezzK">
        <div class="Container-itwfbd-0 jFkAwY" style="display: flex; justify-content: space-between">
            <div class="block" style="width: 268px">
                <h4>HỖ TRỢ KHÁCH HÀNG</h4>
                <p class="hotline">
                    Hotline chăm sóc khách hàng:
                    <a href="tel:1900-6035">1900-6035</a><span class="small-text">(1000đ/phút , 8-21h kể cả T7,
                        CN)</span>
                </p>
                <a rel="noreferrer" href="https://hotro.tiki.vn/hc/vi" class="small-text" target="_blank">Các câu hỏi
                    thường gặp</a><a rel="noreferrer" href="https://hotro.tiki.vn/hc/vi/requests/new" class="small-text"
                    target="_blank">Gửi yêu cầu hỗ trợ</a><a rel="noreferrer"
                    href="https://hotro.tiki.vn/hc/vi/categories/200126644" class="small-text" target="_blank">Hướng dẫn
                    đặt hàng</a><a rel="noreferrer" href="https://hotro.tiki.vn/hc/vi/categories/200123960"
                    class="small-text" target="_blank">Phương thức vận chuyển</a><a rel="noreferrer"
                    href="https://tiki.vn/doi-tra-de-dang" class="small-text" target="_blank">Chính sách đổi trả</a><a
                    rel="noreferrer" href="https://tiki.vn/chuong-trinh/dieu-kien-tra-gop" class="small-text"
                    target="_blank">Hướng dẫn trả góp</a><a rel="noreferrer"
                    href="https://hotro.tiki.vn/hc/vi/articles/360000822643" class="small-text" target="_blank">Chính
                    sách hàng nhập khẩu</a>
                <p class="security">
                    Hỗ trợ khách hàng:
                    <a href="mailto:hotro@tiki.vn">hotro@sidebyside.vn</a>
                </p>
                <p class="security">
                    Báo lỗi bảo mật:
                    <a href="mailto:security@tiki.vn">security@sidebyside.vn</a>
                </p>
            </div>
            <div class="block">
                <h4>VỀ Side by Side</h4>
                <a rel="noreferrer" href="https://tiki.vn/gioi-thieu-ve-tiki" class="small-text" target="_blank">Giới
                    thiệu sidebyside</a><a rel="noreferrer" href="https://tuyendung.tiki.vn" class="small-text"
                    target="_blank">Tuyển Dụng</a><a rel="noreferrer" href="https://tiki.vn/bao-mat-thanh-toan"
                    class="small-text" target="_blank">Chính sách bảo mật thanh toán</a><a rel="noreferrer"
                    href="https://tiki.vn/bao-mat-thong-tin-ca-nhan" class="small-text" target="_blank">Chính sách bảo
                    mật thông tin cá nhân</a><a rel="noreferrer"
                    href="https://hotro.tiki.vn/hc/vi/articles/115005575826" class="small-text" target="_blank">Chính
                    sách giải quyết khiếu nại</a><a rel="noreferrer"
                    href="https://hotro.tiki.vn/hc/vi/articles/201971214" class="small-text" target="_blank">Điều khoản
                    sử dụng</a><a rel="noreferrer"
                    href="https://hotro.tiki.vn/hc/vi/articles/201710754-Tiki-Xu-l%C3%A0-g%C3%AC-Gi%C3%A1-tr%E1%BB%8B-quy-%C4%91%E1%BB%95i-nh%C6%B0-th%E1%BA%BF-n%C3%A0o"
                    class="small-text" target="_blank">Giới thiệu Tiki Xu</a><a rel="noreferrer"
                    href="https://tiki.vn/chuong-trinh/ban-hang-doanh-nghiep" class="small-text" target="_blank">Bán
                    hàng doanh nghiệp</a>
            </div>
            <div class="block">
                <h4>HỢP TÁC VÀ LIÊN KẾT</h4>
                <a rel="noreferrer" href="https://tiki.vn/quy-che-hoat-dong-sgdtmdt" class="small-text"
                    target="_blank">Quy chế hoạt động Sàn GDTMĐT</a><a rel="noreferrer"
                    href="https://tiki.vn/ban-hang-cung-tiki" class="small-text" target="_blank">Bán hàng cùng
                    sidebyside</a>
            </div>
            <div class="block">
                <h4>PHƯƠNG THỨC THANH TOÁN</h4>
                <p>
                    <img class="icon" src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/visa.svg"
                        width="54" alt="" /><img class="icon"
                        src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/mastercard.svg" width="54"
                        alt="" /><img class="icon"
                        src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/jcb.svg" width="54"
                        alt="" /><img class="icon"
                        src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/cash.svg" width="54"
                        alt="" /><img class="icon"
                        src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/internet-banking.svg"
                        width="54" alt="" /><img class="icon"
                        src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/installment.svg" width="54"
                        alt="" />
                </p>
            </div>
            <div class="block">
                <h4>KẾT NỐI VỚI CHÚNG TÔI</h4>
                <p>
                    <a rel="noreferrer" href="https://www.facebook.com/Side-by-Side-100311098633597" class="icon"
                        target="_blank" title="Facebook"><img
                            src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/fb.svg" width="32"
                            alt="" /></a><a rel="noreferrer"
                        href="https://www.youtube.com/channel/UC_uV8IYP4XF8R0acsXfERAg?view_as=subscriber" class="icon"
                        target="_blank" title="Youtube"><img
                            src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/youtube.svg" width="32"
                            alt="" /></a><a rel="noreferrer" href="http://zalo.me/589673439383195103" class="icon"
                        target="_blank" title="Zalo"><i class="icon tikicon icon-footer-zalo"></i></a>
                </p>
                <h4 class="store-title">TẢI ỨNG DỤNG TRÊN ĐIỆN THOẠI</h4>
                <p>
                    <a rel="noreferrer" href="https://itunes.apple.com/vn/app/id958100553" class="icon" target="_blank"
                        aria-label=""><img
                            src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/appstore.png" width="134"
                            alt="" /></a><a rel="noreferrer"
                        href="https://play.google.com/store/apps/details?id=vn.tiki.app.tikiandroid" class="icon"
                        target="_blank" aria-label=""><img
                            src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/playstore.png" width="134"
                            alt="" /></a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>

<?php
    }
}

?>