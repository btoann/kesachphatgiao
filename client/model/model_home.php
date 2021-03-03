<?php
 
    require_once 'system/model_system.php';
    
    class model_home extends model_system {
        
        function getList(){
            $sql="SELECT * from dienthoai ";
            $kq= $this->query($sql);
            return $kq;
        }
    }

?>