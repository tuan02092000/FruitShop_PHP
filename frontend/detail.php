<?php
require_once ('../db/dbhelper.php');
$id = '';
if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select * from product where id = '.$id;
	$product = executeSingleResult($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$product['title']?></title>
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
				<h2 class="text-center"><?=$product['title']?></h2>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
                        <?=$product['content']?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>