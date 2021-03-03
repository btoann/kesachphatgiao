<!--
    @LAYOUT
-->
<?php $this->layout(PATH::LAYOUT . '/ajax') ?>


<!--
    AJAX_CONTENT
-->
<?php $this->section('ajax_content'); ?>

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
        <tbody>
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
        <ul class="pagination justify-content-end" id="pagination">
            <?php
                if (isset($countAllRecords, $limitRecords))
                {
                                    // Làm tròn kết quả số bảng thu được
                    $totalTables = ceil($countAllRecords['count'] / $limitRecords);
                    if (isset($requestPage) && $totalTables >= 5 && $requestPage > 0)
                    {
                        if ($requestPage <= 2 || $requestPage >= $totalTables - 1)
                        {
                            if ($requestPage >= $totalTables - 1) {
            ?>
                                <li class="page-item" id="prev_btn" data-records="1">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
            <?php           
                            }
                            for($i = $requestPage - 1; $i <= $requestPage + 1; $i++)
                            {
                                $j = $i;
                                if ($requestPage <= 1) {
                                    $j = $i + 1;
                                }
                                if ($requestPage >= $totalTables) {
                                    $j = $i - 1;
                                }
            ?>
                                <li class="page-item <?= ($j == $requestPage) ? 'active' : '' ?>" data-records="<?= $j ?>"><a class="page-link" href="#"><?= $j ?></a></li>
            <?php           
                            }
                            if ($requestPage <= 2) {
            ?>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item" id="next_btn" data-records="<?= $totalTables ?>">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
            <?php           
                            }
                        }
                        else
                        {
            ?>
                            <li class="page-item" id="prev_btn" data-records="1">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <?php  
                            echo '';
                            for($i = $requestPage - 1; $i <= $requestPage + 1; $i++) {
            ?>
                                <li class="page-item <?= ($i == $requestPage) ? 'active' : '' ?>" data-records="<?= $i ?>"><a class="page-link" href="#"><?= $i ?></a></li>
            <?php           
                            }
            ?>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item" id="next_btn" data-records="<?= $totalTables ?>">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
            <?php  
                        }
                    }
                    else
                    {
                        for($i = 1; $i <= $totalTables; $i++) {
            ?>
                            <li class="page-item <?= ($i == $requestPage && isset($requestPage)) ? 'active' : '' ?>" data-records="<?= $i ?>"><a class="page-link" href="#"><?= $i ?></a></li>
            <?php   
                        }
                        
                    }
                }
                else {
            ?>
                    <li class="page-item active" data-records="1"><a class="page-link" href="#">1</a></li>
            <?php
                }
            ?>
        </ul>
    </nav>

<?php $this->end(); ?>
