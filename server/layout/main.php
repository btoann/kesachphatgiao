<!DOCTYPE html>
<html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Triết lý Buddha</title>

        <?php $headBool = new boolean(); ?>
            <!-- Jquery -->
            <script src="<?= $headBool->issetURL('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', null, '../public/js/jquery_3.5.1.js') ?>">
            </script>
            <!-- Bootstrap -->
            <?= $headBool->issetURL(
                    'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css',
                    '<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet" 
                        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">',
                    '<link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">'
                )
            ?>
            <?= $headBool->issetURL(
                    'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js',
                    '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
                        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>',
                    '<script src="../public/bootstrap/js/bootstrap.min.js"></script>'
                )
            ?>
        <?php unset($headBool) ?>

        <?php $this->renderSection('head'); ?>

    </head>

    <body class="gray-bg">

        <header class="tlbh-header fixed-top shadow-sm bside-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-dark tlbh-navbar px-0">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#tlbh-header-navbar" aria-controls="tlbh-header-navbar" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="tlbh-header-navbar">
                                <p class="tlbh-header-logo mr-auto"><a href="main.php">TLBH</a></p>
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="main.php">Trang chủ <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item" data-active="account">
                                        <a class="nav-link" href="main.php?ctrl=account">Tài khoản</a>
                                    </li>
                                    <li class="nav-item" data-active="philosophy">
                                        <a class="nav-link" href="#">Triết lý</a>
                                    </li>
                                    <li class="nav-item" data-active="lesson">
                                        <a class="nav-link" href="#">Bài giảng</a>
                                    </li>
                                    <li class="nav-item" data-active="story">
                                        <a class="nav-link" href="#">Câu chuyện</a>
                                    </li>
                                    <li class="nav-item dropdown" data-active="other">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Khác
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="main.php?ctrl=introduce">Giới thiệu</a>
                                            <a class="dropdown-item" href="#">Hoạt động</a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="dropdown ml-auto">
                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ADMIN
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Hồ sơ</a>
                                        <a class="dropdown-item" href="#">Cài đặt</a>
                                        <a class="dropdown-item" href="#">Khác</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <?php $this->renderSection('header'); ?>
        
        <section>
            <div class="container">
                <div class="row">
                    
                    <?php $this->renderSection('aside'); ?>

                    <?php $this->renderSection('article'); ?>

                </div>
            </div>
        </section>

        
        <footer class="tlbh-footer">
            
            <?php $this->renderSection('footer'); ?>
            
            <div class="container tlbh-footer-contents">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © toannb - baonpg</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center bside-txt"><a href="https://www.trietlybuddha.com/" target="_blank">trietlybuddha.com</a></span>
            </div>
        </footer>

        <?php $this->renderSection('script'); ?>

    </body>

</html>