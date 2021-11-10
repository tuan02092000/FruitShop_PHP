<?php
    require_once('../../db/dbhelper.php');
    if(isset($_POST)){
        if(isset($_POST['id'])){
            $action = $_POST['action'];           
            switch($action){
                case 'delete':
                    if(isset($_POST['id'])){
                        $id = $_POST['id'];
                        $sql = "delete from product where id = ".$id;
                        execute($sql); 
                    }
                    break;
            }                     
        }
    }  
?>