<!--
    @LAYOUT
-->
<?php $this->layout(PATH::LAYOUT . '/home/main') ?>


<!--
    HEAD
-->
<?php $this->section('head'); ?>

    <link rel="stylesheet" href="../public/style/client/main.css">

<?php $this->end(); ?>



<!--
    HEADER
-->
<?php $this->section('header'); ?>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 tlbh-header">
                    <div class="linear-bg"></div>
                    <img src="../public/images/banner.jpg" alt="banner.jpg" class="tlbh-banner">
                    <nav class="navbar navbar-expand-lg navbar-dark tlbh-navbar">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#tlbh-header-navbar" aria-controls="tlbh-header-navbar" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="tlbh-header-navbar">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Giới thiệu
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Mục đích thành lập</a>
                                        <a class="dropdown-item" href="#">Người sáng lập</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Cty. Hoa Lan Thanh Quang</a>
                                        <a class="dropdown-item" href="#">Cty. Sâm Ngọc Linh</a>
                                        <a class="dropdown-item" href="#">Viện NC&UD Buddha YoGa</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hoạt động
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Thông báo</a>
                                        <a class="dropdown-item" href="#">Tin tức</a>
                                        <a class="dropdown-item" href="#">Hình ảnh</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Triết lý
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Luận giảng</a>
                                        <a class="dropdown-item" href="#">Khai Thị Luận</a>
                                        <a class="dropdown-item" href="#">Ứng dụng</a>
                                        <a class="dropdown-item" href="#">Sách nói</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Thư viện bài giảng
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Video</a>
                                        <a class="dropdown-item" href="#">MP3</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Câu chuyện
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Thực hành thực chứng<br> kết quả nhập thế</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Bài viết</a>
                                        <a class="dropdown-item" href="#">Cảm nhận</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="tlbh-founder">
                        <a href="#">
                            <p class="tlbh-founder-title">Thượng toạ</p>
                            <p class="tlbh-founder-name">Thích Nhật Từ</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php $this->end(); ?>



<!--
    CONTENT
-->
<?php $this->section('content'); ?>

    <section>
        <div class="container">
            <h3>chỗ này là Content</h3>
            <pre>
                <?= print_r($allRecords) ?>
            </pre>
            <p>&ensp;</p>

            <h1>Thêm một record:</h1>
            <form action="main.php?ctrl=home&act=addnew" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" name="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>
            <p>&ensp;</p>

        </div>
    </section>

<?php $this->end(); ?>



<!--
    FOOTER
-->
<?php $this->section('footer'); ?>

    <footer>
        <div class="container">
            <h3>Đây là Footer</h3>
        </div>
    </footer>

<?php $this->end(); ?>



<!--
    SCRIPT
-->
<?php $this->section('script'); ?>

    <section>
        <div class="container">
            <h3>Chỗ này để Script</h3>
        </div>
    </section>

<?php $this->end(); ?>