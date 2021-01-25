<?php

    /*  Database's categories functions  */

    include_once '../'.PATH::SYSTEM_CORE.'/model.php';

    class m_categories
    {
        private $__dtb;

        /**
         *      Hàm khởi tạo
         */
        public function __construct() {
            //  Gọi hàm khởi tạo của Database
            $this->__dtb = new Model(DTB::ORTHER_NAME_1);
        }
        
        public function getRecord()
        {
            $__dtbname = 'sidebyside.shop';

            $sql =
                'SELECT categories.id, categories.name, users.name as creator,
                        DATE_FORMAT(categories.date, "%d/%m/%Y") as date, categories.active
                    FROM categories INNER JOIN users ON categories.id_admin = users.id
                WHERE categories.id = 1';
            
            return $this->__dtb->queryOne($sql);
        }

        public function getAllRecords()
        {
            $sql =
                'SELECT node.id, node.name, (COUNT(parent.name) - 1) AS depth
                    FROM categories AS node,
                        categories AS parent
                WHERE node.lft BETWEEN parent.lft AND parent.rgt
                GROUP BY node.name
                ORDER BY node.lft';

            return $this->__dtb->query($sql);
        }

    }

?>