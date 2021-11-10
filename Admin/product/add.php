<?php
    require_once('../../db/dbhelper.php');
    $flag = $title = $thumbnail= $content = $price =  $id = '';
    //add
    if(isset($_POST)){
        if(isset($_POST['title'])){
            $title = $_POST['title'];
            $title = str_replace('"', '\\"', $title);
        }
        if(isset($_POST['thumbnail'])){
            $thumbnail = $_POST['thumbnail'];
            $thumbnail = str_replace('"', '\\"', $thumbnail);
        }
        if(isset($_POST['price'])){
            $price = $_POST['price'];
            $price = str_replace('"', '\\"', $price);
        }
        if(isset($_POST['id_category'])){
            $id_category = $_POST['id_category'];
            $id_category = str_replace('"', '\\"', $id_category);
        }
        if(isset($_POST['content'])){
            $content = $_POST['content'];
            $content = str_replace('"', '\\"', $content);
        }
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(!empty($title) && !empty($thumbnail) && !empty($price) && !empty($id_category)){
            $created_at = $updated_at = date('Y-m-d H:i:s');
            if($id == ''){
                $sql = "Insert into product(title, thumbnail, price, content, id_category, created_at, updated_at) 
                values('".$title."', '".$thumbnail."', '".$price."', '".$content."', '".$id_category."', '".$created_at."', '".$updated_at."')";
                $flag = 'Thêm thành công';
            }else{
                $sql = 'update product set title="'.$title.'", thumbnail="'.$thumbnail.'", price="'.$price.'", content="'.$content.'", id_category="'.$id_category.'", updated_at = "'.$updated_at.'" where id = '.$id; 
                $flag = 'Sửa thành công';             
            }
            execute($sql);
        }
    }
    //edit
    if(isset($_GET['update_id'])){
        $id = $_GET['update_id'];
        $sql = "select * from product where id=".$id;
        $product = executeSingleResult($sql);
        if($product != null){
            $title = $product['title'];
            $thumbnail = $product['thumbnail'];
            $content = $product['content'];
            $price = $product['price'];
            $id_category = $product['id_category'];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bán Hoa Quả</title>
	<title>Bán Hoa Quả</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
	<div class="container">
        <div class="header-fruit">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="../category/index.php">Quản lý danh mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../product/index.php">Quản lý sản phẩm</a>
            </li>
        </ul>
        </div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm sản phẩm</h2>
			</div>
			<div class="panel-body"> 
                <form action="" method="post">
                        <?php echo '<br><br><p style="color: red;">'.$flag.'</p>' ?>
                        <div class="form-group">
                            <label for="title">Tên sản phẩm :</label>
                            <input type="text" name="id" value="<?=$id?>" hidden="true">
                            <input type="text" name="title" id="title" class="form-control" require="true" value="<?=$title?>">
                        </div>                                         
                        <div class="form-group">
                            <label for="price">Giá bán : </label>
                            <input type="number" name="price" id="price" class="form-control" require="true" value="<?=$price?>">
                        </div>                                         
                        <div class="form-group">
                            <label for="id_category">Chọn danh mục : </label>
                            <select class="form-control" name="id_category" id="id_category" value="<?=$id_category?>">
                                <?php
                                    $sql = "SELECT * FROM category";
                                    $categoryList = executeResult($sql);
                                    foreach ($categoryList as $item){
                                        if($id_category == $item['id']){
                                            echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
                                        }else{
                                            echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                                        }
                                    }                                           
                                ?>
                            </select>
                        </div>                                         
                        <div class="form-group">
                            <label for="thumbnail">Link ảnh :</label>
                            <input type="text" name="thumbnail" id="thumbnail" class="form-control" require="true" value="<?=$thumbnail?>" onchange="updateThumbnail()">
                            <img id="img_thumbnail" src="<?=$thumbnail?>" alt="" style="width:200px; margin-top: 5px;">
                        </div>                                         
                        <div class="form-group">
                            <label for="content">Nội dung :</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?=$content?></textarea>
                        </div>                                         
                        <button class="btn btn-success" type="submit">Lưu Danh mục</button>
                </form>  
			</div>
		</div>
	</div>
    <script type="text/javascript">
        function updateThumbnail(){
            $('#img_thumbnail').attr('src', $('#thumbnail').val())
        }
        $(function(){
            $('#content').summernote(
                {
                    height: 300,
                    codemirror:{
                        theme: 'monokai'
                    }
                }
            );
        })
    </script>
</body>
</html>