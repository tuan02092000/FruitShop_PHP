<?php
    require_once('../../db/dbhelper.php');
    $flag = '';
    $name = '';
    $id = '';
    //add
    if(isset($_POST)){
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $name = str_replace('"', '\\"', $name);
        }
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(!empty($name)){
            $created_at = $updated_at = date('Y-m-d H:i:s');
            if($id == ''){
                $sql = "Insert into category(name, created_at, updated_at) values('".$name."', '".$created_at."', '".$updated_at."')";
                $flag = 'Thêm danh mục thành công';
            }else{
                $sql = 'update category set name = "'.$name.'", updated_at = "'.$updated_at.'" where id = '.$id; 
                $flag = 'Sửa danh mục thành công';             
            }
            execute($sql);
        }
    }
    //edit
    if(isset($_GET['update_id'])){
        $id = $_GET['update_id'];
        $sql = "select * from category where id=".$id;
        $category = executeSingleResult($sql);
        if($category != null){
            $name = $category['name'];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý danh mục</title>
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
                <a class="nav-link" href="index.php">Quản lý danh mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../product/index.php">Quản lý sản phẩm</a>
            </li>
        </ul>
        </div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm danh mục sản phẩm</h2>
			</div>
			<div class="panel-body"> 
                <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="id" value="<?=$id?>" hidden="true">
                            <input type="text" name="name" id="name" class="form-control" require="true" value="<?=$name?>">
                        </div>                                         
                        <button class="btn btn-success" type="submit">Lưu Danh mục</button>
                        <?php echo '<br><br><p style="color: red;">'.$flag.'</p>' ?>
                </form>  
			</div>
		</div>
	</div>
</body>
</html>