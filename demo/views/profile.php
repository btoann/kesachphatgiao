<?php $this->layout('layout') ?>

<!--
    HEAD
-->
<?php
    $this->section('head');
    $headBool = new boolean();
?>
<?= $headBool->issetURL(
                'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css',
                '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
                    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">',
                '<link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">'
            )
?>
<script src="<?= $headBool->issetURL('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', null, '../public/js/jquery_3.5.1.js') ?>"></script>
<?php
    unset($headBool);
    $this->end();
?>


<!--
    CONTENT
-->
<?php $this->section('content'); ?>
    <h1> User Profile </h1> <p> Hello, <?php echo $name; ?> </p>
<?php $this->end(); ?>


<!--
    SIDEBAR
-->
<?php $this->section('sidebar'); ?>
    <h2> Sidebar </h2>
<?php $this->end(); ?>