<?php
 
    require_once 'system/model_system.php';

    class m_user extends model_system {

        function getList(){
            $sql="SELECT * from dienthoai ";
            $kq= $this->query($sql);
            return $kq;
        }
    }

?>