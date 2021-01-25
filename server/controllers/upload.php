<?php

    /*  include files system  */

    include_once '../'.PATH::SYSTEM_CORE.'/template.php';

    /*  include files model  */

    include_once PATH::MODEL.'/account.php';

    final class c_upload
    {
        private $__model;

        const ARR_ACT = ['addnew', 'edit', 'delete'];
        
        /**
         *      Hàm khởi tạo
         */
        public function __construct() {
            //  Gọi hàm khởi tạo của Model
            $this->__model = new m_account();

            /*  Tiếp nhận chức năng user request  */
            $act = (isset($_GET['act']) && $_GET['act']) ? $_GET['act'] : NULL;

            if (!is_null($act)) {
                if (in_array($act, $this::ARR_ACT)) {
                    $this->$act();
                }
                else {
                    header('location: main.php?ctrl=account');
                }
            }
            else {
                $this->main();
            }

        }


        /**
         *      Chức năng mặc định
         */
        private function main()
        {
            $template = new Template(PATH::VIEW . '/account');
            echo $template->render('main', ['allRecords' => $this->__model->getAllRecords()]);
        }

        /**
         *      Chức năng thêm mới 1 record
         */
        private function addnew()
        {
            $this->store();

            $template = new Template(PATH::VIEW . '/account');
            echo $template->render('addnew', []);
        }
        private function store()
        {
            if (isset($_POST['submit']) && isset($_POST['submit']))
            {
                $email = (isset($_POST['email']) && $_POST['email']) ? $_POST['email'] : NULL;
                $tel = (isset($_POST['tel']) && $_POST['tel']) ? $_POST['tel'] : NULL;
                $name = (isset($_POST['name']) && $_POST['name']) ? $_POST['name'] : NULL;
                $pass = (isset($_POST['pass']) && $_POST['pass']) ? $_POST['pass'] : NULL;
                
                $this->__model->storeRecord($name, $email, $tel, $pass);

                header('location: main.php?ctrl=account');
            }
        }

        /**
         *      Chức năng chỉnh sửa 1 record
         */
        private function edit()
        {
            $this->update();
            
            $input = ['allRecords' => $this->__model->getAllRecords()];
            if (isset($_GET['id']) && $_GET['id'])
            {
                $input = [
                    'account' => $this->__model->getRecord($_GET['id'])
                ];
            }
            $template = new Template(PATH::VIEW . '/account');
            echo $template->render('edit', $input);
        }
        private function update()
        {
            if (isset($_POST['submit']) && isset($_POST['submit']))
            {
                $id = (isset($_POST['id']) && $_POST['id']) ? $_POST['id'] : NULL;
                $name = (isset($_POST['name']) && $_POST['name']) ? $_POST['name'] : NULL;
                $email = (isset($_POST['email']) && $_POST['email']) ? $_POST['email'] : NULL;
                $tel = (isset($_POST['tel']) && $_POST['tel']) ? $_POST['tel'] : NULL;
                
                $this->__model->updateRecord($id, $name, $email, $tel);

                header('location: main.php?ctrl=account&act=edit');
            }
        }

        /**
         *      Chức năng xoá 1 record
         */
        private function delete()
        {
            $this->drop();

            echo $template->render('delete', $input);
        }
        private function drop()
        {
            if (isset($_POST['submit']) && isset($_POST['submit']))
            {
                $id = (isset($_POST['id']) && $_POST['id']) ? $_POST['id'] : NULL;
                
                $this->__model->dropRecord($id);

                header('location: main.php?ctrl=account&act=delete');
            }
        }

    }

?>