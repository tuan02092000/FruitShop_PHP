<?php
    require_once('../db/dbhelper.php');
    $id = '';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = 'select * from category where id='.$id;
        $category = executeSingleResult($sql);
        if($category != null){
            $name = $category['name'];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Category Page-<?=$name?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
        <div class="header-fruit">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="../Admin/category/index.php">Quản lý danh mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Admin/product/index.php">Quản lý sản phẩm</a>
            </li>
        </ul>
        </div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center"><?=$name?></h2>
			</div>
			<div class="panel-body">
                <div class="row">
                    <?php
                    $sql = "select product.id, product.title, product.price, product.thumbnail, product.updated_at, category.name category_name from product 
                    left join category on product.id_category = category.id where category.id=".$id;
                    $productList = executeResult($sql);   
                    foreach($productList as $item){
                        echo '<div class="col-lg-3">
                                <a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" alt="" style="width: 100%; height: 250px;"></a>
                                <a href="detail.php?id='.$item['id'].'"><p style="text-align: center; font-weight: bold; color: red;">'.$item['title'].'</p></a>
                                <a href="detail.php?id='.$item['id'].'"><p style="text-align: center; font-style: italic">'.$item['price'].' VNĐ</p></a>                     
                                </div>';}
                    ?>  
                </div>                
			</div>
		</div>       
	</div>
</body>
</html>