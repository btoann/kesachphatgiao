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
                <li class="list-group-item active"><a href="main.php?ctrl=products">Thống kê</a></li>
                <li class="list-group-item"><a href="main.php?ctrl=products&act=addnew">Thêm mới</a></li>
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
                <h3>Danh sách phần giới thiệu</h3>
                <table class="tlbh-article-table table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Sắp xếp</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Nội dung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($allRecords)) {
                                foreach($allRecords as $product) {
                        ?>
                                    <tr class="tlbh-article-table-record">
                                        <th scope="row">
                                            <input class="" name="records[]" type="checkbox" id="" value="<?= $product['id'] ?>" form="delete_form">
                                        </th>
                                        <td><?= $product['product_name'] ?></td>
                                        <td><?= $product['category_name'] ?></td>
                                        <td><?= $product['old_price'] ?></td>
                                        <td><sub><a href="main.php?ctrl=products&act=edit&id=<?= $product['id'] ?>"><ins>Chi tiết</ins></a></sub></td>
                                    </tr>
                        <?php   }
                            }
                        ?>
                    </tbody>
                </table>
                <form>
                    <button type="button" id="select_all" class="btn btn-outline-secondary">Chọn tất cả</button>
                    <button type="submit" name="delete" class="btn btn-outline-danger" form="delete_form">Xoá</button>
                </form>
                <form action="main.php?ctrl=products&act=delete" method="post" id="delete_form"></form>
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

<?php $this->end(); ?>