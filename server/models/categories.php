<?php

    /*  Database's categories functions  */

    include_once PATH::SYSTEM_CORE.'/model.php';

    class m_Categories
    {
        private $__dtb;

        /**
         *      Hàm khởi tạo
         */
        public function __construct(string $dtbname)
        {
            //  Gọi hàm khởi tạo của Database
            $this->__dtb = new Model($__dtbname);
        }
    }

    function get_category()
    {
        $__dtbname = 'sidebyside.shop';

        $sql =
            'SELECT categories.id, categories.name, users.name as creator,
                    DATE_FORMAT(categories.date, "%d/%m/%Y") as date, categories.active
                FROM categories INNER JOIN users ON categories.id_admin = users.id
            WHERE categories.id = 1';
        $dtb = new Model($__dtbname);
        return $dtb->queryOne($sql);
    }

?>