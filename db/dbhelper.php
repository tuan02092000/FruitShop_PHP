<?php
    require_once('config.php');

    function execute($sql){
        $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'UTF8');
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function executeResult($sql) {
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        $result = mysqli_query($con, $sql);
        $data   = []; 
        if ($result != null) {
            while ($row = mysqli_fetch_array($result, 1)) {
                $data[] = $row;
            }
        }
        mysqli_close($con);  
        return $data;
    }   

    function executeSingleResult($sql){
        $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'UTF8'); 
        $result = mysqli_query($conn, $sql);
        $row = null;
        if($result != null) {
            $row = mysqli_fetch_array($result, 1);
        }
        mysqli_close($conn); 
        return $row;      
    }    
?>