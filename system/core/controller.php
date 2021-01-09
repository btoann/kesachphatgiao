<?php

    /*  Controller functions  */

    include_once 'connect.php';
    include_once 'constants.php';
    
    class Controller extends Database
    {
        /**
         *      Hàm khởi tạo
         */
        public function __construct(string $dtbname) {
            //  Gọi hàm khởi tạo của Database
            parent::__construct($dtbname);
        }


        /**
         *      Return dữ liệu Database là 1 Array đa chiều
         */
        public function query(string $sql)
        {
            if (empty($sql)) {
                throw new Exception("There is no sql statement to execute");
            }
            $conn = $this->__conn;

            // Thực thi
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Kết quả trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }


        /**
         *      Return dữ liệu Database là 1 Array duy nhất
         */
        public function queryOne(string $sql)
        {
            if (empty($sql)) {
                throw new Exception("There is no sql statement to execute");
            }
            $conn = $this->__conn;

            //  Thực thi
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            //  Kết quả trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();
        }


        /**
         *      Import dữ liệu lên Database
         */
        public function execute(string $sql)
        {
            if (empty($sql)) {
                throw new Exception("There is no sql statement to execute");
            }
            $conn = $this->__conn;

            //  Thực thi
            $conn->exec($sql);
        }
        

        /**
         *      Import dữ liệu lên Database và nhận lại giá trị vừa lưu
         */
        public function getExec(string $sql)
        {
            if (empty($sql)) {
                throw new Exception("There is no sql statement to execute");
            }
            $conn = $this->__conn;

            //  Thực thi
            $conn->exec($sql);
            
            //  Kết quả trả về
            return $conn;
        }


        /**
         *      Khởi chạy hoặc ngắt event_scheduler trong Database trên mySQL
         */
        public function event_scheduler(int $cmd)
        {
            if (!($cmd === STATUS::ACTIVE || $cmd === STATUS::INACTIVE)) {
                return;
            }
            $conn = $this->__conn;
            
            //  Thực thi
            $cmd = ($cmd == STATUS::ACTIVE) ? 'ON' : 'OFF';
            $sql = "SET GLOBAL event_scheduler = '$cmd';";
            $conn->exec($sql);
        }


    }

?>