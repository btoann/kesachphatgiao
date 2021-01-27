<!--
    @LAYOUT
-->
<?php $this->layout(PATH::LAYOUT . '/main') ?>


<!--
    HEAD
-->
<?php $this->section('head'); ?>

    <link rel="stylesheet" href="../public/style/server/home.css">

<?php $this->end(); ?>



<!--
    HEADER
-->
<?php $this->section('header'); ?>

<?php $this->end(); ?>



<!--
    ASIDE
-->
<?php $this->section('aside'); ?>

    <aside class="tlbh-aside col-sm-2">
        <div class="tlbh-aside-list">
            <label for="">Phần giới thiệu</label>
            <ul class="list-group">
                <li class="list-group-item"><a href="main.php?ctrl=introduce">Thống kê</a></li>
                <li class="list-group-item active"><a href="main.php?ctrl=introduce&act=addnew">Thêm mới</a></li>
            </ul>
        </div>
    </aside>

<?php $this->end(); ?>



<!--
    ARTICLE
-->
<?php $this->section('article'); ?>

    <article class="tlbh-article col-sm-10">
        <div class="row">
            <div class="col-sm-12">
                <h3>Bài viết giới thiệu</h3>
                <form action="main.php?ctrl=introduce&act=addnew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputTitle">Nhan đề</label>
                        <input type="text" name="title" class="form-control" id="inputTitle" aria-describedby="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trạng thái</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="status" id="inputStatus" value="1">
                            <label class="custom-control-label" for="inputStatus">Hiện</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputImg">Ảnh giới thiệu</label>
                        <input type="file" class="form-control-file" name="image" id="inputImg" required>
                    </div>
                    <div class="form-group">
                        <label for="inputContent">Nội dung</label>
                        <textarea class="form-control w-100 editor" aria-label="With textarea" name="content" id="inputContent"></textarea>
                    </div>
                    <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                </form>
            </div>
        </div>
    </article>

<?php $this->end(); ?>



<!--
    FOOTER
-->
<?php $this->section('footer'); ?>

<?php $this->end(); ?>



<!--
    SCRIPT
-->
<?php $this->section('script'); ?>

    <script src="../public/js/server/index.js"></script>
    <script src="../public/lib/ckeditor5-build-classic/ckeditor.js"></script>
    <script src="../public/js/server/introduce.js"></script>

<?php $this->end(); ?>