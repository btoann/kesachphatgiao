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

<?php $this->end(); ?>



<!--
    ARTICLE
-->
<?php $this->section('article'); ?>

    <article class="tlbh-navtabs col">
        <div class="row">
            <nav class="col-sm-12">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-introduce-tab" data-toggle="tab" href="#nav-introduce" role="tab" aria-controls="nav-introduce" aria-selected="true">Giới thiệu</a>
                    <a class="nav-link" id="nav-activate-tab" data-toggle="tab" href="#nav-activate" role="tab" aria-controls="nav-activate" aria-selected="false">Hoạt động</a>
                    <a class="nav-link" id="nav-philosophy-tab" data-toggle="tab" href="#nav-philosophy" role="tab" aria-controls="nav-philosophy" aria-selected="false">Triết lý</a>
                    <a class="nav-link" id="nav-lesson-tab" data-toggle="tab" href="#nav-lesson" role="tab" aria-controls="nav-lesson" aria-selected="false">Bài giảng</a>
                    <a class="nav-link" id="nav-story-tab" data-toggle="tab" href="#nav-story" role="tab" aria-controls="nav-story" aria-selected="false">Câu chuyện</a>
                </div>
            </nav>
            <div class="col-sm-12 tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-introduce" role="tabpanel" aria-labelledby="nav-introduce-tab">
                    <div class="row">
                        <div class="tlbh-navtabs-card col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                        <div class="tlbh-navtabs-card col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                        <div class="tlbh-navtabs-card col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                        <div class="tlbh-navtabs-card col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                        <div class="tlbh-navtabs-card col-sm-5">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                        <div class="tlbh-navtabs-card col-sm-7">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-activate" role="tabpanel" aria-labelledby="nav-activate-tab">...</div>
                <div class="tab-pane fade" id="nav-philosophy" role="tabpanel" aria-labelledby="nav-philosophy-tab">...</div>
                <div class="tab-pane fade" id="nav-lesson" role="tabpanel" aria-labelledby="nav-lesson-tab">...</div>
                <div class="tab-pane fade" id="nav-story" role="tabpanel" aria-labelledby="nav-story-tab">...</div>
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

<?php $this->end(); ?>