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
                <li class="list-group-item active"><a href="main.php?ctrl=introduce">Thống kê</a></li>
                <li class="list-group-item"><a href="main.php?ctrl=introduce&act=addnew">Thêm mới</a></li>
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
                <div class="card">
                    <div class="card-body tlbh-article-detail">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h3 class="card-title"><?= isset($record['title']) ? $record['title'] : '' ?></h3>
                                <h6 class="card-subtitle mb-2 text-muted"><?= isset($record['author']) ? $record['author'] : '' ?> - <?= isset($record['date']) ? $record['date'] : '' ?></h6>
                                <div class="col mx-auto tlbh-article-detail-img">
                                    <img src="<?= isset($record['image']) ? '../'.PATH::IMAGES.'/introduce/'.$record['image'] : '' ?>" class="img-fit" alt="<?= isset($record['image']) ? $record['image'] : '' ?>">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <p class="card-text"><?= isset($record['content']) ? $record['content'] : '' ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
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
    <script src="../public/js/server/introduce.js"></script>

<?php $this->end(); ?>