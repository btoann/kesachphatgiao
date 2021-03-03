<?php
    require_once "model/model_home.php";
    class home {
        private $__ARR_ACTION = ["home"];
        function __construct()
        {
             $this->model = new model_home();
            $act = 'home'; //chức năng mặc định
            if(isset($_GET["act"])==true) $act=$_GET["act"];//tiếp nhận chức năng user request

            if(!in_array($act, $this->__ARR_ACTION )) {
                header("location: index.php?ctrl=home");
            }
            $this->$act();
        }
        function home() {
            require_once "view/index.php";
        }

    }
?>