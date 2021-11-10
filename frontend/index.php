<?php
    require_once('../db/dbhelper.php');
    require_once('../common/utility.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bán Hoa Quả</title>
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
				<h2 class="text-center"><a href="index.php" style="text-decoration: none; color: white;">Danh mục sản phẩm</a></h2>
			</div>
			<div class="panel-body">
            <div class="col-lg-12" style="display: flex; justify-content:flex-end;">
                    <form action="" method="get" style="margin: 10px 0px; display: flex; align-items: center">
                        <input type="text" name="search" placeholder="Tên sản phẩm" style="padding: 5px; margin-right: 5px;">
                        <button class="btn btn-success" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            <table class="table table-bordered table-hover" style="text-align: center;">
                <thead style="font-weight: bold;">
                    <tr>
                        <td width="60px">STT</td>
                        <td>Tên Danh Mục</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // $sql = "select * from category";                
                    // $categoryList = executeResult($sql);
                    // $index = 1;
                    require_once("paginate.php");
                    foreach ($categoryList as $item){
                        echo '<tr>
                                <td>'.++$firstIndex.'</td>
                                <td><a style="text-decoration: none;" href="category.php?id='.$item['id'].'">'.$item['name'].'</a></td>                              
                            </tr>';
                        }
                ?>
                </tbody>
            </table> 
            <div class="panel-footer">
                <!-- Phân trang -->
                <?php
                    pagination($number, $page, $name);
                ?>
            </div>                  
			</div>
		</div>
	</div>
</body>
</html>