<?php
    session_start();
    require_once ("system/config.php");
    require_once "controllers/home.php";
    define("ARR_CONTROLLER", ["home","users","signin"]);
    $ctrl = 'home';
    if(isset($_GET['ctrl'])==true) {
        $ctrl=$_GET['ctrl'];
    }
    else {
        header('location: index.php?ctrl=home');
    }
    if (in_array($ctrl, ARR_CONTROLLER)==false) die("Không tồn tại địa chỉ");
    $pathFile ="controllers/$ctrl.php"; 
    if (file_exists($pathFile) ==true) {
        require_once $pathFile;     
        $controller = new $ctrl;
    }
    else echo "Controller $ctrl không tồn tại";
?>