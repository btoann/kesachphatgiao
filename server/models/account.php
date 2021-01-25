<?php

    /*  Database's introduce functions  */

    include_once '../'.PATH::SYSTEM_CORE.'/model.php';

    class m_account
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
            if (is_null($id)) {
                return false;
            }
            
            $sql =
                "SELECT id, email, name, tel, role
                    FROM users WHERE id = $id";

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
                "SELECT id, email, tel, name, DATE_FORMAT(date, '%d/%m/%Y') as date, role
                    FROM users ORDER BY $order $sort";

            return $this->__dtb->query($sql);
        }
        
        /**
         *      Thêm mới 1 record
         */
        public function storeRecord(string $name, string $email, int $tel, string $pass)
        {
            if (is_null($name, $email, $tel, $pass)) {
                return false;
            }

            $sql =
                "INSERT INTO users (name, email, tel, pass)
                        VALUES ('$name', '$email', '$tel', '$pass')";

            return $this->__dtb->execute($sql);
        }
        
        /**
         *      Chỉnh sửa 1 record
         */
        public function updateRecord(int $id, string $name, string $email, int $tel)
        {
            if (is_null($id, $name, $email, $tel)) {
                return false;
            }

            $sql =
                "UPDATE users SET name = '$name', name = '$email', tel = '$tel' WHERE id = '$id'";

            return $this->__dtb->execute($sql);
        }
        
        /**
         *      Xóa 1 record
         */
        public function dropRecord(int $id)
        {
            if (is_null($id)) {
                return false;
            }

            $sql =
                "DELETE FROM users WHERE id = $id";

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