
<?php

    /*  Database's introduce functions  */

    include_once '../'.PATH::SYSTEM_CORE.'/model.php';

    class m_products
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
                "SELECT id, name, id_category, price, promotion, description
                    FROM products WHERE id = $id";

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
                "SELECT pt.id, pt.name as product_name, ct.name as category_name, pt.date, price as old_price, promotion, purchase
                    FROM products pt INNER JOIN categories ct ON pt.id_category = ct.id ORDER BY $order $sort";

            return $this->__dtb->query($sql);
        }
        
        /**
         *      Thêm mới 1 record
         */
        public function storeRecord(string $name, int $id_category, $price, $promotion, $description, int $id_seller = 1)
        {
            // if (is_null($name, $id_category, $price, $promotion, $description)) {
            //     return false;
            // }
            $id_seller = 1;

            $sql =
                "INSERT INTO products (name, id_category, categories_hashtag, id_seller, price, promotion, card_img, description)
                    VALUES ('$name', '$id_category', '76', '$id_seller', '$price', '$promotion', 'card_img', '$description')";

            return $this->__dtb->getExec($sql);
        }
        /**
         *      Thêm hình ảnh cho 1 record
         */
        public function storeImg(string $name, int $id_product, string $basename)
        {
            if (is_null($name, $id_product, $basename)) {
                return false;
            }

            $sql =
                "INSERT INTO product_images (name, id_product, basename)
                    VALUES ('$name', '$id_product', '$basename')";

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
        public function dropRecord(string $ids)
        {
            if (is_null($ids)) {
                return false;
            }

            $sql = "DELETE FROM products WHERE id IN ($ids)";

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