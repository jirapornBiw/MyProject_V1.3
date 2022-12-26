<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\customers;
use App\Model\product;
use App\Model\type;
use App\Model\status;
use App\Model\weight;
session_start();
if(!$_SESSION['login']){
  header("location: ../../../auth/login.php");
  exit;
}
?>

<!DOCTYPE html>
<header class="header">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสินค้า</title>
    <link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body class="font-mali">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <?php include 'float.php'; ?>

  <!--<article>-->
  <div class="container-fluid">
		<div class="row">
			<div class="col ">
				<div class="card mb-3 ">
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939;">
						<h4 class="text-light">จัดการสินค้า</h4>
						<a href="add.php?action=add" class="btn btn-outline-light">
							<i class="fa fa-plus-square-o" aria-hidden="true"></i>
							เพิ่มสินค้าใหม่</a>
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
								<th>ลำดับ</th>
								<th>id</th>
								<th>รูปภาพ</th>
								<th>ประเภทข้าว</th>
								<th>พันธุ์ข้าว</th>
								<th>รายละเอียด</th>
								<th>น้ำหนัก</th>
								<th>จำนวน</th>
								<th>ราคา</th>
								<th>สถานะ</th>
								<th>จัดการ</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$productsObj = new product();
									$filters = array_intersect_key($_REQUEST, array_flip(['search', 'type_id', 'status_id']));
									$products = $productsObj->getAllproduct();
									$n=0;
									foreach($products as $product) {
									$n++;
									echo "
										<tr>    
											<td>$n</td>
											<td>{$product['id']}</td>
											<td><img src='{$product['image']}' class='image_product'</td>
											<td>{$product['type']}</td>
											<td>{$product['name']}</td>
											<td>{$product['Products_Detail']}</td>
											<td>{$product['weight']}</td>
											<td>{$product['stock']}</td>
											<td>{$product['price']}</td>
											<td>{$product['status']}</td>
											<td>
												<a href='edit.php?id={$product['id']}&action=edit' class='btn btn-outline-warning'>แก้ไข</a>
												<a href='delete.php?id={$product['id']}' class='btn btn-outline-danger'>ลบ</a>
											</td>
										</tr>
										";
										}
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</article>
</body>
</html>