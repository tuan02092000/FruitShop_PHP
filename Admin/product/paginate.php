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
    $title = '';
    if(isset($_GET['search']) && $_GET['search'] != ''){
        $title = $_GET['search'];
        $sql = "select product.id, product.title, product.price, product.thumbnail, product.updated_at, category.name category_name from product 
            left join category on product.id_category = category.id where product.title like '%".$title."%'"; 
    }else{
        $sql = "select product.id, product.title, product.price, product.thumbnail, product.updated_at, category.name category_name from product 
            left join category on product.id_category = category.id where 1 limit ".$firstIndex.', '.$limit;
    }
    $productList = executeResult($sql);
    $sql = 'select count(id) as total from product';
    $countResult = executeSingleResult($sql); 
    $count = $countResult['total'];
    $number = ceil($count / $limit); 
?>