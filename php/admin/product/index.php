<?php require "../../../vendor/autoload.php";
use App\Model\product;
session_start();
if(!$_SESSION['login']){
  header("location: ../../../auth/login.php");
  exit;
}
$productObj = new product();
$product = $productObj->getAllProduct();
include("../connect.php");
$query=mysqli_query($conn,"SELECT COUNT(id) FROM products");
$row = mysqli_fetch_row($query);
$rows = $row[0];
 
	$page_rows = 4;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
 
	$last = ceil($rows/$page_rows);
 
	if($last < 1){
		$last = 1;
	}
 
	$pagenum = 1;
 
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}
 
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	$nquery=mysqli_query($conn,
	"SELECT
	products.id,
	products.image,
	type.name AS type,
	products.name,
	products.Products_Detail,
	weight.name AS weight,
	products.stock,
	products.price,
	status.name AS status
FROM 
	products
	LEFT JOIN type ON products.type_id = type.id
	LEFT JOIN status ON products.status_id = status.id
	LEFT JOIN weight ON products.weight_id = weight.id
 $limit");
 
	$paginationCtrls = '';
 
	if($last != 1){
 
	if ($pagenum > 1) {
$previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-secondary">ก่อนหน้า</a> &nbsp; &nbsp; ';
 
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-secondary">'.$i.'</a> &nbsp; ';
			}
	}
}
 
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
 
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-secondary">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
 
if ($pagenum != $last) {
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-secondary">ต่อไป</a> ';
}}
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
  <?php include '../float.php'; ?>

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
								<th width="150">จัดการ</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$productsObj = new product();
									//$filters = array_intersect_key($_REQUEST, array_flip(['search', 'type_id', 'status_id']));
									$products = $productsObj->getAllproduct();
									$n=1;
									while($product = mysqli_fetch_array($nquery)){
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
										$n++;
										}
									?>
							</tbody>
						</table>
						<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>

					</div>
				</div>
			</div>
		</div>
	</div>
	</article>
</body>
</html>