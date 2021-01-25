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
                <li class="list-group-item"><a href="main.php?ctrl=account">Thống kê</a></li>
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
            <?php
                if (isset($account)) {
            ?>
                <div class="col-sm-12">
                    <h3>Chỉnh sửa tài khoản</h3>
                    <form action="main.php?ctrl=account&act=edit" method="post">
                        <input type="hidden" name="id" value="<?= isset($account['id']) ? $account['id'] : '' ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và tên</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= isset($account['name']) ? $account['name'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= isset($account['email']) ? $account['email'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="number" name="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= isset($account['tel']) ? $account['tel'] : '' ?>">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <input type="submit" name="submit" value="submit" class="btn btn-primary">
                    </form>
                </div>
            <?php
                }
                else {
            ?>
                <div class="col-sm-12">
                    <h3>Danh sách cần chỉnh sửa</h3>
                    <table class="tlbh-article-table table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Quyền</th>
                            <th scope="col">Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($allRecords)) {
                                    foreach($allRecords as $account) {
                            ?>
                                        <tr>
                                            <th scope="row"><?= $account['id'] ?></th>
                                            <td><?= $account['name'] ?></td>
                                            <td><?= $account['email'] ?></td>
                                            <td><?= $account['tel'] ?></td>
                                            <td><?= $account['role'] ?></td>
                                            <td><a class="btn btn-outline-primary" href="main.php?ctrl=account&act=edit&id=<?= $account['id'] ?>">○</a></td>
                                        </tr>
                            <?php   }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
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

    <script src="../public/js/server/account.js"></script>

<?php $this->end(); ?>