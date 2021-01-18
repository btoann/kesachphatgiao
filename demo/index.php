<?php

    //include 'layout.php';   
    include_once 'template.php';
    include_once '../system/lib/boolean.php';

    // set thư mục views là ~/views
    $template = new Template('views');
    echo $template->render('profile', ['name' => 'Jocelyn']);

?>