<?php require "../../../vendor/autoload.php";

use App\Model\orders;

$ordersObj = new orders();
session_start();
if (!$_SESSION['login']) {
	header("location: ../../../auth/login.php");
	exit;
}
include("../connect.php");
// $query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders");
// $row = mysqli_fetch_row($query);
// $rows = $row[0];

if (!empty($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
	$query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE status = '$action'");
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
} else {
	// $products = $productObj->getAllProduct();
	$id_customer = $_SESSION['c_id'];
	$query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders");
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
}

$page_rows = 9;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

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

if (!empty($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
	$query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE status = '$action'");
	$nquery = mysqli_query($conn, "SELECT * from  orders WHERE  status = '$action' ORDER BY o_id DESC $limit");
} else {
	// $products = $productObj->getAllProduct();
	$query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders");
	$nquery = mysqli_query($conn, "SELECT * from  orders  ORDER BY o_id DESC $limit");
}
// $nquery = mysqli_query($conn, "SELECT * from  orders ORDER BY o_id DESC $limit");

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
$query0 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders  ");
$row0 = mysqli_fetch_row($query0);
$rows0 = $row0[0];

$query1 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE status = 'รอการชำระเงิน'");
$row1 = mysqli_fetch_row($query1);
$rows1 = $row1[0];

$query2 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE status = 'รอการตรวจสอบ'");
$row2 = mysqli_fetch_row($query2);
$rows2 = $row2[0];

$query3 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE status = 'จัดส่งสินค้าสำเร็จ'");
$row3 = mysqli_fetch_row($query3);
$rows3 = $row3[0];

$query4 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE status = 'ตรวจสอบไม่ผ่าน'");
$row4 = mysqli_fetch_row($query4);
$rows4 = $row4[0];

$query5 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE status = 'รอการตรวจสอบพัสดุเสียหาย'");
$row5 = mysqli_fetch_row($query5);
$rows5 = $row5[0];
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>รายการสั่งซื้อ</title>
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

<body class="font-mali" style="background-color: #f5f5f5;">

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
								<div class="card-header text-white d-flex justify-content-between">
									<h4 class="text-light">รายงานการขายสินค้า</h4>
								</div>
								<div class="row mt-4">
									<div class="col-lg-12 mr-5" style="margin-left: 5%;">
										<a href='index.php' class='btn btn-outline-secondary mr-5'>รายการทั้งหมด(<?php echo $rows0;?>)</a>
										<a href='index.php?action=รอการชำระเงิน' class='btn btn-outline-warning'>รายการใหม่(<?php echo $rows1;?>)</a>
										<a href='index.php?action=รอการตรวจสอบ' class='btn btn-outline-success'>ชำระเงินแล้ว(<?php echo $rows2;?>)</a>
										<a href='index.php?action=จัดส่งสินค้าสำเร็จ' class='btn btn-outline-primary'>ส่งสินค้าแล้ว(<?php echo $rows3;?>)</a>
										<a href='index.php?action=ตรวจสอบไม่ผ่าน' class='btn btn-outline-dark'>ตรวจสอบไม่ผ่าน(<?php echo $rows4;?>)</a>
										<a href='index.php?action=รอการตรวจสอบพัสดุเสียหาย' class='btn btn-outline-danger'>แจ้งพัสดุเสียหาย(<?php echo $rows5;?>)</a>

									<!-- </div>
									<?php
									echo '<pre>';
									print_r($_REQUEST);
									echo '<pre>';
									?> -->
								</div>


								<div class="card-body">
									<table class="table">
										<thead>
											<tr>
												<th>ลำดับ</th>
												<th>รหัสสั่งซื้อ</th>
												<th>ชื่อลูกค้า</th>
												<th>วันที่สั่งซื้อ</th>
												<th>ยอดรวมสินค้า</th>
												<th>สถานะ</th>
												<th>จัดการ</th>


											</tr>
										</thead>
										<tbody>
											<?php

											// $orders = $ordersObj->getAllOrders();
											$n = 1;

											while ($order = mysqli_fetch_array($nquery)) {
												$action = $order['status'];
												echo "
										<tr>    
											<td>$n</td>
											<td>{$order['o_id']}</td>
											<td>{$order['name']}</td>
											<td>{$order['dttm']}</td>
											<td>{$order['total']}</td>
											" ?>
											<?php

												if (!empty($_REQUEST['action'])) {
													echo"
													<td>{$order['status']}</td>
													<td>
													<a href='orderDetail.php?id={$order['o_id']}&action={$action}' class='btn btn-outline-warning'>รายละเอียด</a>
													</td>";
													// $action = $_REQUEST['action'];
													// $query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE status = '$action'");
													// $row = mysqli_fetch_row($query);
													// $rows = $row[0];
												} else {
													echo"
													<td>{$order['status']}</td>
													<td>
													<a href='orderDetail.php?id={$order['o_id']}&action={$order['status']}' class='btn btn-outline-warning'>รายละเอียด</a>
													</td>";
													// $products = $productObj->getAllProduct();
													// $id_customer = $_SESSION['c_id'];
													// $query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders");
													// $row = mysqli_fetch_row($query);
													// $rows = $row[0];
												}
												echo "
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
			</div>
		</div>


	</body>

</html>