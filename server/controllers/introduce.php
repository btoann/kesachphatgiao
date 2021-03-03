<?php

    /*  include files system  */

    include_once '../'.PATH::SYSTEM_CORE.'/template.php';

    /*  include files model  */

    include_once PATH::MODEL.'/introduce.php';

    final class c_introduce
    {
        private $__model;

        private $__template;

        const ARR_ACT = ['addnew', 'edit', 'delete', 'detail'];
        
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
            
            $limit_records = 1;

            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                if (isset($_POST['requestPage']) && $_POST['requestPage'] > 0)
                {
                    echo $this->getPage($_POST['requestPage'], $limit_records);
                    return;
                }
            }

            $input = [
                'allRecords' => $this->__model->getAllRecords($limit_records),
                'countAllRecords' => $this->__model->countAllRecords(),
                'limitRecords' => $limit_records
            ];
            echo $this->__template->render('main', $input);
        }
        private function getPage(int $requestPage = 1, int $limit = 10)
        {
            /*  Bắt đầu lấy từ record thứ $start  */
            $start = ($requestPage - 1) * $limit;

            $input = [
                'requestPage' => $requestPage,
                'allRecords' => $this->__model->getAllRecords($limit, $start),
                'countAllRecords' => $this->__model->countAllRecords(),
                'limitRecords' => $limit
            ];

            return $this->__template->render('ajaxContent', $input);
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
                $status = (isset($_POST['status']) && $_POST['status']) ? $_POST['status'] : 0;
                $content = (isset($_POST['content']) && $_POST['content']) ? $_POST['content'] : NULL;

                $bool = new Boolean();

                if($bool->checkNull($title, $content))
                {
                    if(isset($_FILES['image']))
                    {
                        $last_id = $this->__model->storeRecord($title, $status, $content);
                        $last_id = $last_id->lastInsertId();

                        $images = $_FILES['image'];
                        $target_folder = '../' . PATH::IMAGES . '/'.'introduce'.'/';
                        if(!file_exists($target_folder)) {
                            // Tạo 1 folder mới nếu nó chưa tồn tại
                            mkdir($target_folder, 0777, true);
                        }

                        $filename = md5($images['name']) . '-' . time(); // ex: 5dab1961e93a7-1571494241
                        $extension = pathinfo($images['name'], PATHINFO_EXTENSION); // ex: jpg
                        $basename = $filename . '.' . $extension; // ex: 5dab1961e93a7_1571494241.jpg

                        $target_file = $target_folder . $basename;
                        if(move_uploaded_file($images['tmp_name'], $target_file)) {
                            // Upload thành công
                            //$img_name = $title . ' - #' . $last_id;
                            $this->__model->storeImg($basename, $last_id);
                        }
                        else {
                            throw new Exception("Can't upload image!");
                        }
                    }
                    header('location: main.php?ctrl=introduce');
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

                header('location: main.php?ctrl=introduce');
            }
        }
        
        /**
         *      Chức năng show chi tiết
         */
        private function detail() {
            if (isset($_GET['id']) && $_GET['id'])
            {
                $input = [
                    'record' => $this->__model->getRecord($_GET['id'])
                ];

                if (!is_array($input['record'])) {
                    header('location: main.php?ctrl=introduce');
                }

                echo $this->__template->render('detail', $input);
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
            if (isset($_GET['type']) && $_GET['type'])
            {
                $type = $_GET['type'];

                switch ($type)
                {
                    case 'image':
                        // if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 0)
                        // {
                        //     $target_folder = PATH::IMAGES . "/products/p_$last_id/";
                        //     if(!file_exists($target_folder))
                        //     {
                        //         // Tạo 1 folder mới nếu nó chưa tồn tại
                        //         mkdir($target_folder, 0777, true);
                        //     }
                        //     $images = $_FILES['upload'];
                        //     for($i = 0; $i <= sizeof($images); $i++)
                        //     {
                        //         $filename = md5($images['name'][$i]).'-'.time(); // ex: 5dab1961e93a7-1571494241
                        //         $extension = pathinfo($images['name'][$i], PATHINFO_EXTENSION); // ex: jpg
                        //         $basename = $filename.'.'.$extension; // ex: 5dab1961e93a7_1571494241.jpg

                        //         $target_file = $target_folder.$basename;
                        //         if(move_uploaded_file($images["tmp_name"][$i], $target_file))
                        //         {
                        //             // Upload thành công
                        //             $img_name = $name.' - #'.$i;
                        //             $this->__model->storeImg($img_name, $last_id, $basename);
                        //         }
                        //     }
                        // }
                        $upload_dir = array(
                            'img'=> '/postimages/',
                        );

                        $imgset = array(
                            // 'maxsize' => 2000,    
                            // 'maxwidth' => 900,    
                            // 'maxheight' => 800,    
                            'minwidth' => 10,      
                            'minheight' => 10,
                            'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png'),
                        );

                        // If 0, will OVERWRITE the existing file
                        define('RENAME_F', 1);

                        $re = '';
                        if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) >1) {
                            define('F_NAME', preg_replace('/\.(.+?)$/i', '', basename($_FILES['upload']['name'])));  //get filename without extension

                            // get protocol and host name to send the absolute image path to CKEditor    
                            $site = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'].'/';
                            $sepext = explode('.', strtolower($_FILES['upload']['name']));
                            $type = end($sepext);    // gets extension
                            $upload_dir = in_array($type, $imgset['type']) ? $upload_dir['img'] : $upload_dir['audio'];
                            $upload_dir = trim($upload_dir, '/') .'/';

                            //checkings for image or audio
                            if(in_array($type, $imgset['type'])){
                                // list($width, $height) = getimagesize($_FILES['upload']['tmp_name']);  // image width and height
                                if(isset($width) && isset($height)) {
                                    if($width > $imgset['maxwidth'] || $height > $imgset['maxheight']) $re .= '\\n Width x Height = '. $width .' x '. $height .' \\n The maximum Width x Height must be: '. $imgset['maxwidth']. ' x '. $imgset['maxheight'];
                                    if($width < $imgset['minwidth'] || $height < $imgset['minheight']) $re .= '\\n Width x Height = '. $width .' x '. $height .'\\n The minimum Width x Height must be: '. $imgset['minwidth']. ' x '. $imgset['minheight'];
                                    if($_FILES['upload']['size'] > $imgset['maxsize']*1000) $re .= '\\n Maximum file size must be: '. $imgset['maxsize']. ' KB.';
                                }
                            }
                        
                            else $re .= 'The file: '. $_FILES['upload']['name']. ' has not the allowed extension type.';

                            //set filename; if file exists, and RENAME_F is 1, set "img_name_I"
                            // $p = dir-path, $fn=filename to check, $ex=extension $i=index to rename
                            function setFName($p, $fn, $ex, $i){
                                if(RENAME_F ==1 && file_exists($p .$fn .$ex)) return setFName($p, F_NAME .'_'. ($i +1), $ex, ($i +1));
                                else return $fn .$ex;
                            }

                            $f_name = setFName($_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir, F_NAME, ".$type", 0);
                            $uploadpath = $_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir . $f_name;  // full file path

                            // If no errors, upload the image, else, output the errors
                            if($re == '') {
                                // print_r($_FILES);exit;
                                if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) {
                                    $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
                                    $url = $site. $upload_dir . $f_name;
                                    $msg = F_NAME .'.'. $type .' successfully uploaded: \\n- Size: '. number_format($_FILES['upload']['size']/1024, 2, '.', '') .' KB';
                                    $re = in_array($type, $imgset['type']) ? "window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')"  //for img
                                : 'var cke_ob = window.parent.CKEDITOR; for(var ckid in cke_ob.instances) { if(cke_ob.instances[ckid].focusManager.hasFocus) break;} cke_ob.instances[ckid].insertHtml(\'<audio src="'. $url .'" controls></audio>\', \'unfiltered_html\'); alert("'. $msg .'"); var dialog = cke_ob.dialog.getCurrent();  dialog.hide();';
                                }
                                else $re = 'alert("Unable to upload the file")';
                            }
                            else $re = 'alert("'. $re .'")';
                        }

                        @header('Content-type: text/html; charset=utf-8');
                        echo '<script>'. $re .';</script>';
                        return;
                    
                    default:
                        # code...
                        return;
                }
            }
        }

    }

?>