<link rel="stylesheet" href="../../../public/css/client/users/main.css">
<link rel="stylesheet" href="../../../public/bootstrap/css/bootstrap.min.css">

<div id="user_login" class="container">
    <div class="frame">
        <div class="nav">
            <ul class="links">
                <li class="signin-active"><a class="btn" href="#">Đăng nhập</a></li>
                <li class="signup-inactive"><a class="btn" href="index.php?ctrl=user&act=signup">Đăng ký </a></li>
            </ul>
        </div>

        <p class="logo-text">
            <a href="index.php">
                <span class="bside-txt">SIDE</span><span class="gray-txt between">by</span><span
                    class="hl-txt">SIDE</span>
            </a>
        </p>

        <div ng-app ng-init="checked = false">
            <form action="index.php?ctrl=user&act=signin" class="form-signin" method="post" name="form"
                autocomplete="off" id="signinform">
                <label for="username">Email / Số điện thoại</label>
                <input class="form-styling" type="text" name="username" id="username" placeholder="" required>
                <label for="password">Mật khẩu</label>
                <input class="form-styling" type="password" name="password" id="password" placeholder="" required>
                <br>
                <input type="checkbox" id="checkbox" name="remember">
                <label for="checkbox" class="bside-txt-i"><span class="ui upc-txt"></span>
                    <p class="m-t-2-i">Nhớ lần đăng nhập này</p>
                </label>
                <input width="100%" type="submit" name="signin" value="Đăng nhập"
                    class="btn-signin main-bg hl-bg-hv lightgray-txt-i">

                <a href="<?= (isset($loginUrl)) ? $loginUrl : '#facebook' ?>">
                    <div id='facebook' class='button'>Facebook
                        <div class='cover facebook'>
                            <li style="font-size: 1.5rem;" class="fa fa-facebook fa-2x"></li>
                        </div>
                    </div>
                </a>

                <a href="<?= (isset($authUrl)) ? $authUrl : '#google' ?>">
                    <div id='google' class='button'>Google+
                        <div class='cover google'>
                            <li style="font-size: 1.5rem;" class="fa fa-google-plus fa-2x"></li>
                        </div>
                    </div>
                </a>
            </form>

            <form class="form-signup">
            </form>
            <div class="success">
            </div>
        </div>

        <div class="forgot">
            <a href="index.php?ctrl=account&act=forgot" class="bside-txt hl-hv">Quên mật khẩu?</a>
        </div>

    </div>

    <a type="reset" id="refresh" value="Refresh" onclick="document.getElementById('signinform').reset()">
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


<?php

    // if(isset($_SESSION['forgot_send']))
    //     print_r($_SESSION['forgot_send']);

?>