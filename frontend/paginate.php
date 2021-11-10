<?php
     $limit = 5;
     $page = 1;
     if(isset($_GET['page'])){
         $page = $_GET['page'];
     }
     if($page <= 0){
         $page = 1;
     }
     $firstIndex = ($page - 1)*$limit;
     $name = "";
     if(isset($_GET['search']) && $_GET['search'] != ''){
         $name = $_GET['search'];
         $sql = "select * from category where name like '%".$name."%'"; 
    }else{
         $sql = "select * from category where 1 limit ".$firstIndex.', '.$limit;
    }                   
    $categoryList = executeResult($sql);

    $sql = 'select count(id) as total from category';
    $countResult = executeSingleResult($sql); 
    $count = $countResult['total'];
    $number = ceil($count / $limit);    
?>