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
            $this->__dtb = new Model(DTB::MAIN_NAME);
        }

        
        /**
         *      Get một record
         */
        public function getRecord(int $id)
        {
            $sql =
                "SELECT intro.id, intro.title, intro.status, intro.content,
                        DATE_FORMAT(intro.date, '%d/%m/%Y') as date, intro.lastUpdate,
                        users.name as author, img.path as image
                    FROM introduce intro INNER JOIN users ON intro.id_admin = users.id
                                        INNER JOIN introduce_images img ON intro.id = img.id_introduce
                WHERE intro.id = $id";

            return $this->__dtb->queryOne($sql);
        }

        /**
         *      Get tất cả record
         *      @param string $order (default 'id') -> Sắp xếp theo: 'id', 'date'
         *      @param string $sort (default 'DESC') -> Thứ tự: 'DESC' (Giảm dần), 'ASC' (Tăng dần)
         *      @param int $limit (default 0) -> Giới hạn số records lấy về
         *      @param int $start (default 0) -> Lấy từ record thứ $start
         */
        public function getAllRecords(string $order = 'id', string $sort = 'DESC', int $limit = 0, int $start = 0)
        {
            $arr_param = [
                'order' => ['id', 'sort'],
                'sort' => ['DESC', 'ASC']
            ];

            if (!in_array($order, $arr_param['order'])) {
                $order = 'id';
            }
            if (!in_array($sort, $arr_param['sort'])) {
                $sort = 'DESC';
            }

            $sql =
                "SELECT id, title, date, sort, status
                    FROM introduce ORDER BY $order $sort";

            if ($limit > 0) {
                $sql .= " LIMIT $limit, $start";
            }

            return $this->__dtb->query($sql);
        }
        
        /**
         *      Thêm mới 1 record
         */
        public function storeRecord(string $title, int $status, string $content, int $author = 22)
        {
            $sql =
                "INSERT INTO introduce (title, status, content, id_admin)
                        VALUES ('$title', '$status', '$content', '$author')";

            return $this->__dtb->getExec($sql);
        }
        /**
         *      Thêm ảnh bìa cho 1 record
         */
        public function storeImg(string $path, string $id_introduce)
        {
            $sql =
                "INSERT INTO introduce_images (path, sort, id_introduce)
                        VALUES ('$path', '1', '$id_introduce')";

            return $this->__dtb->execute($sql);
        }

        /**
         *      Xóa 1 record
         */
        public function dropRecord(string $id = NULL)
        {
            if (is_null($id)) {
                return false;
            }

            $sql =
                "DELETE FROM introduce WHERE id IN ($id)";

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