<?php
    require_once "model/model_home.php";
    class user {
        private $__ARR_ACTION = ["main","signin","signup","signout"];
        function __construct()
        {
             $this->model = new m_user();
            $act = 'main'; //chức năng mặc định
            if(isset($_GET["act"])==true) $act=$_GET["act"];//tiếp nhận chức năng user request

            if(!in_array($act, $this->__ARR_ACTION )) {
                header("location: index.php?ctrl=user");
            }
            $this->$act();
        }
        private function main() {
            require_once "view/user/main.php";
        }
        
        private function signin() {
            require_once "view/user/signin.php";
        }

        private function signup() {
            require_once "view/user/signup.php";
            
        }
        
    }
?>