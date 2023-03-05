<?php require "../../vendor/autoload.php";
include 'connect.php';

use App\Model\orders;

session_start();
if (!$_SESSION['login']) {
	header("location: ../../auth/login.php");
	exit;
}
$ordersObj = new orders();
$orders = $ordersObj->getAllOrders();

// $query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders ");

if (!empty($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
	$id_customer = $_SESSION['c_id'];
	// $products = $productObj->getAllProductJS($action);
	$query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE id_customer = '$id_customer' AND status = '$action'");
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
} else {
	// $products = $productObj->getAllProduct();
	$id_customer = $_SESSION['c_id'];
	$query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE id_customer = '$id_customer'");
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
}

// echo '<pre>';
// print_r($_REQUEST);
// echo '<pre>';


$page_rows = 5;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

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

// $nquery = mysqli_query($conn, "SELECT * from  orders ORDER BY o_id DESC $limit");
if (!empty($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
	// $products = $productObj->getAllProductJS($action);
	$query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE status = '$action'");
	$nquery = mysqli_query($conn, "SELECT * from  orders WHERE id_customer = '$id_customer' AND status = '$action' ORDER BY o_id DESC $limit");
} else {
	// $products = $productObj->getAllProduct();
	$query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders ");
	$nquery = mysqli_query($conn, "SELECT * from  orders WHERE id_customer = '$id_customer'ORDER BY o_id DESC $limit");
}
$paginationCtrls = '';

if ($last != 1) {

	if ($pagenum > 1) {
		$previous = $pagenum - 1;
		$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="btn" style="background-color: #efe5db;">ก่อนหน้า</a> &nbsp; &nbsp; ';

		for ($i = $pagenum - 4; $i < $pagenum; $i++) {
			if ($i > 0) {
				$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn" style="background-color: #efe5db;">' . $i . '</a> &nbsp; ';
			}
		}
	}

	$paginationCtrls .= '' . $pagenum . ' &nbsp; ';

	for ($i = $pagenum + 1; $i <= $last; $i++) {
		$paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn" style="background-color: #efe5db;">' . $i . '</a> &nbsp; ';
		if ($i >= $pagenum + 4) {
			break;
		}
	}

	if ($pagenum != $last) {
		$next = $pagenum + 1;
		$paginationCtrls .= ' &nbsp; &nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="btn" style="background-color: #efe5db;">ต่อไป</a> ';
	}
}
// <!-- หาจำนวนออเดอร์ -->
$query0 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE id_customer = '$id_customer' ");
$row0 = mysqli_fetch_row($query0);
$rows0 = $row0[0];

$query1 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE id_customer = '$id_customer' AND status = 'รอการชำระเงิน'");
$row1 = mysqli_fetch_row($query1);
$rows1 = $row1[0];

$query2 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE id_customer = '$id_customer' AND status = 'รอการตรวจสอบ'");
$row2 = mysqli_fetch_row($query2);
$rows2 = $row2[0];

$query3 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE id_customer = '$id_customer' AND status = 'จัดส่งสินค้าสำเร็จ'");
$row3 = mysqli_fetch_row($query3);
$rows3 = $row3[0];

$query4 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE id_customer = '$id_customer' AND status = 'ตรวจสอบไม่ผ่าน'");
$row4 = mysqli_fetch_row($query4);
$rows4 = $row4[0];

$query5 = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders WHERE id_customer = '$id_customer' AND status = 'รอการตรวจสอบพัสดุเสียหาย'");
$row5 = mysqli_fetch_row($query5);
$rows5 = $row5[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>การสั่งซื้อ</title>
	<link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<style>
		.container-rightmenu ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			width: 200px;
			background-color: #9b631c;
		}

		.container-rightmenu li a {
			display: block;
			color: #000;
			padding: 8px 16px;
			text-decoration: none;
			color: white;
		}

		.container-rightmenu li a.active {
			background-color: #4a2a00;
			color: white;
		}

		.container-rightmenu li a:hover:not(.active) {
			background-color: #a78659;
			color: white;
		}

	</style>
</head>

<body>
	<div class="row">
		<?php
		include 'header.php';
		include 'script.php';
		?>
	</div>
	<div class="row mt-5">
		<div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 ">
			<div class="container-rightmenu mx-auto p-4">
				<ul>
					<li><a class="active" href="orders.php">รายการทั้งหมด<span class="badge badge-light">(<?php echo $rows0;?>)</span></a></li>
					<li><a href="orders.php?action=รอการชำระเงิน">ที่ต้องชำระเงิน<span class="badge badge-light">(<?php echo $rows1; ?>)</span></a></li>
					<li><a href="orders.php?action=รอการตรวจสอบ">เตรียมจัดส่ง<span class="badge badge-light">(<?php echo $rows2; ?>)</span></a></li>
					<li><a href="orders.php?action=จัดส่งสินค้าสำเร็จ">จัดส่งสินค้าสำเร็จ<span class="badge badge-light">(<?php echo $rows3; ?>)</span></a></li>
					<li><a href="orders.php?action=ตรวจสอบไม่ผ่าน">เกิดข้อผิดพลาด<span class="badge badge-light">(<?php echo $rows4; ?>)</span></a></li>
					<!-- <li><a href="orders.php?action=จัดส่งสินค้าสำเร็จ">แจ้งพัสดุเสียหาย <span class="badge badge-light">(<?php echo $rows5; ?>)</span></a></li> -->
					<li><a href="orders.php?action=รอการตรวจสอบพัสดุเสียหาย">พัสดุเสียหาย<span class="badge badge-light">(<?php echo $rows5; ?>)</span></a></li>

				</ul>

			</div>
		</div>
		<div class="col-lg-10 col-md-12 col-sm-12 ml-5 mt-4 ml-5 " style="background-color: #f5f5f5;">
			<div class="row" style="">
				<div class="col-sm-12 mt-5 mb-4">
					<div class="d-flex justify-content-center">
						<h1>การสั่งซื้อ</h1>
					</div>
				</div>
				<div class="card-body ">
					<div class="container" style="width: 80%;">
						<table class="table">
							<thead>
								<tr>
									<th>ลำดับ</th>
									<th>รหัสสั่งซื้อ</th>
									<th>วันที่สั่งซื้อ</th>
									<th>ชื่อผู้สั่งซื้อ</th>
									<th>ยอดรวมสินค้า</th>
									<th>สถานะ</th>

								</tr>
							</thead>
							<tbody>
								<?php
								// $ordersObj = new orders();
								// $orders = $ordersObj->getAllOrderDetailByCustomer($_SESSION['c_id']);
								$n = 1;
								foreach ($orders as $order) {
									while ($order = mysqli_fetch_array($nquery)) {


										echo "
										<tr>    
											<td>$n</td>
											<td>{$order['o_id']}</td>
											<td>{$order['dttm']}</td>
											<td>{$order['name']}</td>
											<td>{$order['total']}</td>
											<td>{$order['status']}</td>
											<td>
											<a href='orderDetail.php?id={$order['o_id']}&action=detail' class='mr-2 btn btn-dt text-light' style='background-color: #9b631b;'>รายละเอียด</a>
                        					<!--<a href='pay.php?id={$order['o_id']}&action=pay' class='mr-2 btn btn-success'>ชำระเงิน</a>-->
											
											</td>
										</tr>
										";
										$n++;
									}
								}
								?>
							</tbody>
						</table>
					</div>
					<div class="container" style="width: 80%;">
						<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>

					</div>
				</div>

				<br><br>
			</div>
		</div>
	</div>
	<br><br>
	</div>
	</div>
	</div>
</body>

</html>

