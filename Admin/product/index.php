<?php
    require_once('../../db/dbhelper.php');
    require_once('../../common/utility.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bán Hóa Quả</title>
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
                <a class="nav-link" href="../category">Quản lý danh mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Quản lý sản phẩm</a>
            </li>
        </ul>
        </div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản lý sản phẩm</h2>
			</div>
			<div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <a href="add.php"><button class="btn btn-success" style="margin:10px 0px">Thêm sảm phẩm</button></a>
                </div>
                <div class="col-lg-6" style="display: flex; justify-content:flex-end;">
                    <form action="" method="get" style="margin: 10px 0px; display: flex; align-items: center">
                        <input type="text" name="search" placeholder="Tên sản phẩm" style="padding: 5px; margin-right: 5px;">
                        <button class="btn btn-success" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-hover" style="text-align: center;">
                <thead style="font-weight: bold;">
                    <tr>
                        <td width="60px">STT</td>
                        <td>Hình ảnh</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá bán</td>
                        <td>Danh mục</td>
                        <td>Ngày cập nhật</td>
                        <td width="60px"></td>
                        <td width="60px"></td>                       
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once('paginate.php');
                    foreach ($productList as $item){
                        echo '<tr>
                                <td>'.++$firstIndex.'</td>
                                <td><img src="'.$item['thumbnail'].'" alt="" style="width: 100px; height:100px;"></td>                              
                                <td>'.$item['title'].'</td>                              
                                <td>'.$item['price'].' VNĐ</td>                              
                                <td>'.$item['category_name'].'</td>                              
                                <td>'.$item['updated_at'].'</td>                              
                                <td><a href="add.php?update_id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a> </td>
                                <td><button class="btn btn-danger" onclick="DeleteProduct('.$item['id'].')">Delete</button></td>
                            </tr>';
                        }
                ?>
                </tbody>
            </table> 
            <div class="panel-footer">
                <!-- Phân trang -->
                <?php  
                    pagination($number, $page, $title); 
                ?>
            </div>                  
			</div>
		</div>
	</div>
    <script type="text/javascript">
        function DeleteProduct(id){
            var option = confirm('Are you sure you want to delete');
            if(!option){
                return;
            }
            $.post('delete.php', {
                'id':id,
                'action':'delete'
            }, function(data){
                location.reload();
            })
        }

    </script>
</body>
</html>