<?php

    /*  Database's categories functions  */

    include_once '../'.PATH::SYSTEM_CORE.'/model.php';

    class m_promotions
    {
        private $__dtb;

        /**
         *      Hàm khởi tạo
         */
        public function __construct() {
            //  Gọi hàm khởi tạo của Database
            $this->__dtb = new Model(DTB::ORTHER_NAME_1);
        }
        
        public function getRecord(int $id)
        {
            $__dtbname = 'sidebyside.shop';

            $sql =
                'SELECT * FROM promotions WHERE id='.$id;
            
            return $this->__dtb->queryOne($sql);
        }

        public function getAllRecords()
        {
            $sql =
                'SELECT * FROM promotions ORDER BY id desc';

            return $this->__dtb->query($sql);
        }
        
    }

?>