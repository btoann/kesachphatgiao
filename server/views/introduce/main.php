<!--
    @LAYOUT
-->
<?php $this->layout(PATH::LAYOUT . '/main') ?>


<!--
    HEAD
-->
<?php $this->section('head'); ?>

    <script src="../public/js/jquery-ui.min.js"></script>
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
                <h3>Danh sách phần giới thiệu</h3>
                <table class="tlbh-article-table table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Nội dung</th>
                        </tr>
                    </thead>
                    <tbody id="data-introduce">
                        <?php
                            if (isset($allRecords)) {
                                foreach($allRecords as $introduce) {
                        ?>
                                    <tr class="tlbh-article-table-record">
                                        <th scope="row">
                                            <input class="" name="records[]" type="checkbox" id="" value="<?= $introduce['id'] ?>" form="delete_form">
                                        </th>
                                        <td><?= $introduce['title'] ?></td>
                                        <td><?= $introduce['date'] ?></td>
                                        <td><?= $introduce['status'] ?></td>
                                        <td><sub><a href="main.php?ctrl=introduce&act=detail&id=<?= $introduce['id'] ?>"><ins>Chi tiết</ins></a></sub></td>
                                    </tr>
                        <?php   }
                            }
                        ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col">
                <form action="main.php?ctrl=introduce&act=delete" method="post" id="delete_form">
                    <button type="button" id="select_all" class="btn btn-outline-secondary">Chọn tất cả</button>
                    <button type="submit" name="delete" value="delete" class="btn btn-outline-danger" form="delete_form">Xoá</button>
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

<?php $this->end(); ?>