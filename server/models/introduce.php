<?php

    /*  Database's introduce functions  */

    include_once '../'.PATH::SYSTEM_CORE.'/model.php';

    class m_introduce
    {
        private $__dtb;

        /**
         *      Hàm khởi tạo
         */
        public function __construct() {
            //  Gọi hàm khởi tạo của Database
            $this->__dtb = new Model(DTB::ORTHER_NAME_1);
        }

        
        /**
         *      Get một record
         */
        public function getRecord(int $id)
        {
            $sql =
                "SELECT categories.id, categories.name, users.name as creator,
                        DATE_FORMAT(categories.date, '%d/%m/%Y') as date, categories.active
                    FROM categories INNER JOIN users ON categories.id_admin = users.id
                WHERE categories.id = $id";

            return $this->__dtb->queryOne($sql);
        }

        /**
         *      Get tất cả record
         *      @param string $order (default 'id') -> Sắp xếp theo: 'id', 'date'
         *      @param string $sort (default 'DESC') -> Thứ tự: 'DESC' (Giảm dần), 'ASC' (Tăng dần)
         *      @param int $limit (default 10) -> Giới hạn số records lấy về
         *      @param int $start (default 0) -> Lấy từ record thứ $start
         */
        public function getAllRecords(string $order = 'id', string $sort = 'DESC', int $limit = 10, int $start = 0)
        {
            $arr_param = [
                'order' => ['id', 'date'],
                'sort' => ['DESC', 'ASC']
            ];

            if (!in_array($order, $arr_param['order'])) {
                $order = 'id';
            }
            if (!in_array($sort, $arr_param['sort'])) {
                $sort = 'DESC';
            }

            $sql =
                "SELECT users.id, users.name, users.pass as creator,
                        DATE_FORMAT(users.date, '%d/%m/%Y') as date, users.role
                    FROM users ORDER BY $order $sort";

            return $this->__dtb->query($sql);
        }
        
        /**
         *      Thêm mới 1 record
         */
        public function addNewRecord(string $name, string $email, int $tel, string $pass)
        {
            if (is_null($name, $email, $tel, $pass)) {
                //return false;
            }

            $sql =
                "INSERT INTO users (name, email, tel, pass)
                        VALUES ('$name', '$email', '$tel', '$pass')";

            return $this->__dtb->execute($sql);
        }
        
        /**
         *      Hàm kết thúc
         */
        public function __destruct() {
            //  Unset hàm khởi tạo Database
            $this->__dtb = NULL;
        }

    }

?>