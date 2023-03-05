<?php require "../../../vendor/autoload.php";

use App\Model\product;

session_start();
if (!$_SESSION['login']) {
	header("location: ../../../auth/login.php");
	exit;
}
$productObj = new product();
$product = $productObj->getAllProduct();
include("../connect.php");
$query = mysqli_query($conn, "SELECT COUNT(id) FROM products");
$row = mysqli_fetch_row($query);
$rows = $row[0];

$page_rows = 4;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

$last = ceil($rows / $page_rows);

if ($last < 1) {
	$last = 1;
}

$pagenum = 1;

if (isset($_GET['pn'])) {
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

if ($pagenum < 1) {
	$pagenum = 1;
} else if ($pagenum > $last) {
	$pagenum = $last;
}

$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
$nquery = mysqli_query(
	$conn,
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
 $limit"
);

$paginationCtrls = '';

if ($last != 1) {

	if ($pagenum > 1) {
		$previous = $pagenum - 1;
		$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="btn btn-secondary">ก่อนหน้า</a> &nbsp; &nbsp; ';

		for ($i = $pagenum - 4; $i < $pagenum; $i++) {
			if ($i > 0) {
				$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-secondary">' . $i . '</a> &nbsp; ';
			}
		}
	}

	$paginationCtrls .= '' . $pagenum . ' &nbsp; ';

	for ($i = $pagenum + 1; $i <= $last; $i++) {
		$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-secondary">' . $i . '</a> &nbsp; ';
		if ($i >= $pagenum + 4) {
			break;
		}
	}

	if ($pagenum != $last) {
		$next = $pagenum + 1;
		$paginationCtrls .= ' &nbsp; &nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="btn btn-secondary">ต่อไป</a> ';
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>จัดการสินค้า</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" type href="../style-main-admin.css">

</head>
<body class="font-mali">
	<div class="row">
		<div class="col-lg-2 col-md-12 col-sm-12">
			<?php include '../float.php';
			include '../modal.php'
			?>
		</div>
		<div class="col-lg-10 col-md-12 col-sm-12">
			<div class="container-fluid">
				<div class="row">
					<div class="col ">
						<div class="card mb-3 ">
							<div class="card-header text-white d-flex justify-content-between align-items-center">
								<h4 class="text-light" style="margin: 0;">จัดการสินค้า</h4>
								<a href="add.php?action=add" class="btn btn-outline-light">
									<i class="fa fa-plus-square" aria-hidden="true"></i>
									เพิ่มสินค้าใหม่</a>
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											<th width="50">ลำดับ</th>
											<th width="100">รหัสสินค้า</th>
											<th width="200">รูปภาพ</th>
											<th width="100">ประเภทข้าว</th>
											<th width="170">ชื่อสินค้า</th>
											<!-- <th width="100">รายละเอียด</th> -->
											<th width="100">น้ำหนัก</th>
											<th width="100">จำนวน</th>
											<th>ราคา</th>
											<th width="100">สถานะ</th>
											<th width="180">จัดการ</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$productsObj = new product();
										//$filters = array_intersect_key($_REQUEST, array_flip(['search', 'type_id', 'status_id']));
										$products = $productsObj->getAllproduct();
										$n = 1;

										while ($product = mysqli_fetch_array($nquery)) {
											$p_id = $product['id'];
											echo "
										<tr>    
											<td>$n</td>
											<td>{$product['id']}</td>
											<td><img src='{$product['image']}' class='image_product'</td>
											<td>{$product['type']}</td>
											<td>{$product['name']}</td>
											<td>{$product['weight']}</td>
											<td>{$product['stock']}</td>
											<td>{$product['price']}</td>
											<td>{$product['status']}</td>
											<td>
												<a href='edit.php?id={$product['id']}&action=edit' class='btn btn-outline-warning'>แก้ไข</a>
												<button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#exampleModaldeleteProduct' data-bs-whatever='{$product['id']}'>ลบ</button>											
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
		</div>
	</div>


</body>

</html>