<?php

    /*  include files system  */

    include_once '../'.PATH::SYSTEM_CORE.'/template.php';

    /*  include files model  */

    include_once PATH::MODEL.'/introduce.php';

    final class c_introduce
    {
        private $__model;

        private $__template;

        const ARR_ACT = ['addnew', 'edit', 'delete'];
        
        /**
         *      Hàm khởi tạo
         */
        public function __construct() {
            //  Gọi hàm khởi tạo của Model
            $this->__model = new m_introduce();

            //  Khởi chạy template view
            $this->__template = new Template(PATH::VIEW . '/introduce');

            /*  Tiếp nhận chức năng user request  */
            $act = (isset($_GET['act']) && $_GET['act']) ? $_GET['act'] : NULL;

            if (!is_null($act)) {
                if (in_array($act, $this::ARR_ACT)) {
                    $this->$act();
                }
                else {
                    header('location: main.php?ctrl=introduce');
                }
            }
            else {
                $this->main();
            }

        }


        /**
         *      Chức năng mặc định
         */
        private function main() {
            echo $this->__template->render('main', ['allRecords' => $this->__model->getAllRecords()]);
        }

        /**
         *      Chức năng thêm mới 1 record
         */
        private function addnew()
        {
            $this->store();

            $input = [];

            echo $this->__template->render('addnew', $input);
        }
        private function store()
        {
            if(isset($_POST['submit']) && $_POST['submit'])
            {
                $title = (isset($_POST['title']) && $_POST['title']) ? $_POST['title'] : NULL;
                $status = (isset($_POST['status']) && $_POST['status']) ? $_POST['status'] : NULL;
                $content = (isset($_POST['content']) && $_POST['content']) ? $_POST['content'] : NULL;

                $bool = new Boolean();

                if($bool->checkNull($title, $content))
                {
                    $last_id = $this->__model->storeRecord($name, $category, $price, $promotion, $description);
                    $last_id = $last_id->lastInsertId();

                    if(isset($_FILES['image']))
                    {
                        $target_folder = PATH::IMAGES . "/products/p_$last_id/";
                        if(!file_exists($target_folder))
                        {
                            // Tạo 1 folder mới nếu nó chưa tồn tại
                            mkdir($target_folder, 0777, true);
                        }
                        $images = $_FILES['image'];
                        for($i = 0; $i <= sizeof($images); $i++)
                        {
                            $filename = md5($images['name'][$i]).'-'.time(); // ex: 5dab1961e93a7-1571494241
                            $extension = pathinfo($images['name'][$i], PATHINFO_EXTENSION); // ex: jpg
                            $basename = $filename.'.'.$extension; // ex: 5dab1961e93a7_1571494241.jpg

                            $target_file = $target_folder.$basename;
                            if(move_uploaded_file($images["tmp_name"][$i], $target_file))
                            {
                                // Upload thành công
                                $img_name = $name.' - #'.$i;
                                $this->__model->storeImg($img_name, $last_id, $basename);
                            }
                        }
                    }
                    header('location: main.php?ctrl=products');
                }
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
                    'product' => $this->__model->getRecord($_GET['id'])
                ];
            }
            echo  $this->__template->render('edit', $input);
        }
        private function update()
        {
            if (isset($_POST['submit']) && $_POST['submit'])
            {
                $id = (isset($_POST['id']) && $_POST['id']) ? $_POST['id'] : NULL;
                $name = (isset($_POST['name']) && $_POST['name']) ? $_POST['name'] : NULL;
                $email = (isset($_POST['email']) && $_POST['email']) ? $_POST['email'] : NULL;
                $tel = (isset($_POST['tel']) && $_POST['tel']) ? $_POST['tel'] : NULL;
                
                $this->__model->updateRecord($id, $name, $email, $tel);

                header('location: main.php?ctrl=products&act=edit');
            }
        }

        /**
         *      Chức năng xoá 1 record
         */
        private function delete() {
            $this->drop();
        }
        private function drop()
        {
            if (isset($_POST['delete']) && $_POST['delete'])
            {
                $ids = (isset($_POST['records']) && $_POST['records'] != NULL) ? implode(", ", $_POST['records']) : NULL;

                $this->__model->dropRecord($ids);

                header('location: main.php?ctrl=products');
            }
        }

        /**
         *      Chức năng upload file
         */
        private function upload() {
            $this->move();
        }
        private function move()
        {
            require_once '../system/lib/ckfinder/core/connector/php/connector.php';

            // if (isset($_GET['type']) && $_GET['type'])
            // {
            //     $type = $_GET['type'];

            //     switch ($type)
            //     {
            //         case 'image':
            //             if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 0)
            //             {
            //                 $target_folder = PATH::IMAGES . "/products/p_$last_id/";
            //                 if(!file_exists($target_folder))
            //                 {
            //                     // Tạo 1 folder mới nếu nó chưa tồn tại
            //                     mkdir($target_folder, 0777, true);
            //                 }
            //                 $images = $_FILES['upload'];
            //                 for($i = 0; $i <= sizeof($images); $i++)
            //                 {
            //                     $filename = md5($images['name'][$i]).'-'.time(); // ex: 5dab1961e93a7-1571494241
            //                     $extension = pathinfo($images['name'][$i], PATHINFO_EXTENSION); // ex: jpg
            //                     $basename = $filename.'.'.$extension; // ex: 5dab1961e93a7_1571494241.jpg

            //                     $target_file = $target_folder.$basename;
            //                     if(move_uploaded_file($images["tmp_name"][$i], $target_file))
            //                     {
            //                         // Upload thành công
            //                         $img_name = $name.' - #'.$i;
            //                         $this->__model->storeImg($img_name, $last_id, $basename);
            //                     }
            //                 }
            //             }
            //             return;
                    
            //         default:
            //             # code...
            //             return;
            //     }
            // }
        }

    }

?>