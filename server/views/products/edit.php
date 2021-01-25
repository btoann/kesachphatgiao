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
            <label for="">Sản phẩm</label>
            <ul class="list-group">
                <li class="list-group-item"><a href="main.php?ctrl=products">Thống kê</a></li>
                <li class="list-group-item active"><a href="main.php?ctrl=products&act=addnew">Thêm</a></li>
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
                <h3>Thêm sản phẩm</h3>
                <form action="main.php?ctrl=products&act=edit" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?= isset($product['id']) ? $product['id'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Danh mục</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category" required>
                        <?php

                            $out = '';
                            for($i = 0; $i < count($categories); $i++)
                            {
                                if($categories[$i]['depth'] == 0)
                                {
                                    $out .= ($i == 0) ? '' : '</optgroup>';
                                    $out .= '<optgroup label="'.$categories[$i]['name'].'">';
                                }
                                else
                                {
                                    $out .= '<option value="'.$categories[$i]['id'].'">'.$categories[$i]['name'].'</option>';
                                }
                            }
                            $out .= '</optgroup>';

                            echo $out;

                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                        <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?= isset($product['price']) ? $product['price'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Khuyến mãi</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="promotion" required>
                        <?php
                            $output = '';
                            foreach ($promotions as $promotion) {
                                $output .= '<option value="'.$promotion['id'].'">'.$promotion['name'].' [-'.$promotion['discount'].'%] ('.$promotion['begin'].' - '.$promotion['end'].')</option>';
                            }
                            echo $output;
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="custom-file mb-3">
                            <label for="exampleFormControlFile1">Example file input</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image[]" multiple required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Mô tả</span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                            <div>
                            <?= isset($product['description']) ? $product['description'] : '' ?></div>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="submit" class="btn btn-primary">
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