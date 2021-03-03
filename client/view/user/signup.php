<link rel="stylesheet" href="../../../public/css/client/users/main.css">
<link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">

<div id="user_login" class="container p-tb-30-i">
    <div class="frame frame-long">
        <div class="nav">
            <ul class="links">
                <li class="signin-active signin-inactive"><a class="btn" href="index.php?ctrl=account&act=signin">Đăng
                        nhập</a></li>
                <li class="signup-inactive signup-active"><a class="btn" href="#">Đăng ký </a></li>
            </ul>
        </div>

        <p class="logo-text">
            <a href="index.php">
                <span class="bside-txt">SIDE</span><span class="gray-txt between">by</span><span
                    class="hl-txt">SIDE</span>
            </a>
        </p>

        <div ng-app ng-init="checked = false">
            <form class="form-signup" action="index.php?ctrl=account&act=signup" method="post" name="form"
                id="signupform">
                <label for="name">Tên người dùng</label>
                <input class="form-styling" type="text" name="name" id="name" required>
                <label for="email">Email</label>
                <input class="form-styling" type="email" name="email" id="email" required>
                <label for="tel">Số điện thoại</label>
                <input class="form-styling" type="text" name="tel" id="tel" required>
                <label for="pass">Mật khẩu</label>
                <input class="form-styling" type="password" name="pass" id="pass" required>
                <label for="confirm_pass">Xác nhận mật khẩu</label>
                <input class="form-styling" type="password" name="confirm_pass" id="confirm_pass" required>
                <input width="100%" type="submit" name="signup" id="submit" value="Đăng ký"
                    class="btn-signup main-bg hl-bg-hv">
            </form>
        </div>
    </div>

    <a type="reset" id="refresh" value="Refresh" onclick="document.getElementById('signupform').reset()">
        <svg class="refreshicon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="25px"
            viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;" xml:space="preserve">
            <path d="M321.832,230.327c-2.133-6.565-9.184-10.154-15.75-8.025l-16.254,5.281C299.785,206.991,305,184.347,305,161.224
                        c0-84.089-68.41-152.5-152.5-152.5C68.411,8.724,0,77.135,0,161.224s68.411,152.5,152.5,152.5c6.903,0,12.5-5.597,12.5-12.5
                        c0-6.902-5.597-12.5-12.5-12.5c-70.304,0-127.5-57.195-127.5-127.5c0-70.304,57.196-127.5,127.5-127.5
                        c70.305,0,127.5,57.196,127.5,127.5c0,19.372-4.371,38.337-12.723,55.568l-5.553-17.096c-2.133-6.564-9.186-10.156-15.75-8.025
                        c-6.566,2.134-10.16,9.186-8.027,15.751l14.74,45.368c1.715,5.283,6.615,8.642,11.885,8.642c1.279,0,2.582-0.198,3.865-0.614
                        l45.369-14.738C320.371,243.946,323.965,236.895,321.832,230.327z" />
        </svg>
    </a>
</div>