<?php

    /*  include files system  */

    include_once '../'.PATH::SYSTEM_CORE.'/template.php';

    /*  include files model  */

    include_once PATH::MODEL.'/introduce.php';

    final class c_home
    {
        private $__model;

        const ARR_ACT = ['index'];
        
        /**
         *      Hàm khởi tạo
         */
        public function __construct() {
            //  Gọi hàm khởi tạo của Model
            $this->__model = new m_introduce();

            /*  Tiếp nhận chức năng user request  */
            $act = (isset($_GET['act']) && $_GET['act']) ? $_GET['act'] : NULL;

            if (!is_null($act)) {
                if (in_array($act, $this::ARR_ACT)) {
                    $this->$act();
                }
                else {
                    header('location: main.php?ctrl=home');
                }
            }
            else {
                $this->index();
            }

        }


        /**
         *      Chức năng mặc định
         */
        private function index()
        {
            $template = new Template(PATH::VIEW . '/home');
            echo $template->render('main', ['allRecords' => $this->__model->getAllRecords()]);
        }

        /**
         *      Chức năng thêm mới 1 record
         */
        private function addnew()
        {
            if(isset($_POST['submit']) && isset($_POST['submit']))
            {
                $email = (isset($_POST['email']) && $_POST['email']) ? $_POST['email'] : NULL;
                $tel = (isset($_POST['tel']) && $_POST['tel']) ? $_POST['tel'] : NULL;
                $name = (isset($_POST['name']) && $_POST['name']) ? $_POST['name'] : NULL;
                $pass = (isset($_POST['pass']) && $_POST['pass']) ? $_POST['pass'] : NULL;
                
                $this->__model->addNewRecord($name, $email, $tel, $pass);

                header('location: main.php?ctrl=home');
            }
        }

    }

?>