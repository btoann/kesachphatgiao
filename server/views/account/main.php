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
            <label for="">Tài khoản</label>
            <ul class="list-group">
                <li class="list-group-item active"><a href="main.php?ctrl=account">Thống kê</a></li>
                <li class="list-group-item"><a href="main.php?ctrl=account&act=addnew">Thêm</a></li>
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
                <h3>Danh sách tài khoản</h3>
                <table class="tlbh-article-table table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ngày đăng ký</th>
                            <th scope="col">Quyền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($allRecords)) {
                                foreach($allRecords as $account) {
                        ?>
                                    <tr class="tlbh-article-table-record">
                                        <th scope="row">
                                            <input class="" name="records[]" type="checkbox" id="" value="<?= $account['id'] ?>">
                                        </th>
                                        <td><?= $account['name'] ?></td>
                                        <td><?= $account['email'] ?></td>
                                        <td><?= $account['date'] ?></td>
                                        <td><?= $account['role'] ?></td>
                                    </tr>
                        <?php   }
                            }
                        ?>
                    </tbody>
                </table>
                <form>
                    <button type="button" id="select_all" class="btn btn-outline-secondary">Chọn tất cả</button>
                    <button type="submit" name="edit" class="btn btn-outline-primary">Chỉnh sửa</button>
                    <button type="submit" name="delete" class="btn btn-outline-danger">Xoá</button>
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