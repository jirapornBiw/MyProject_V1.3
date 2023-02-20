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
$query = mysqli_query($conn, "SELECT COUNT(o_id) FROM orders ");
$row = mysqli_fetch_row($query);
$rows = $row[0];

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

$nquery = mysqli_query($conn, "SELECT * from  orders ORDER BY o_id DESC $limit");

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
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>การสั่งซื้อ</title>
	<link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

</head>

<body>
	<?php
	include 'header.php';
	include 'script.php';
	?>
	<div class="row">
		<div class="col-sm-12 mt-5">
			<div class="d-flex justify-content-center">
				<h1>การสั่งซื้อ</h1>
			</div>
		</div>
		<div class="container mt-5 mb-5 align-items-cente 
		justify-content-centerr border border-secondary rounded" style="width: 70rem;">
			<div class="container mt-5 mb-5 align-items-cente justify-content-centerr" style="width: 70rem;">
				<div class="row mt-4">
					<div class="col-12">
						<a href='orders.php' class='btn btn-outline-secondary'>รายการทั้งหมด</a>
						<a href='orders_pay.php' class='btn btn-outline-warning'>ที่ต้องชำระเงิน</a>
						<a href='orders_pre.php' class='btn btn-outline-success'>เตรียมจัดส่ง</a>
						<a href='orders_track.php' class='btn btn-outline-primary'>ระหว่างขนส่ง</a>
						<a href='claim.php?id=<?php echo $_SESSION['c_id'] ?>' class='btn btn-outline-danger'>แจ้งพัสดุเสียหาย</a>
					</div>
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>รหัสสั่งซื้อ</th>
								<th>วันที่สั่งซื้อ</th>
								<th>ชื่อ</th>
								<th>ยอดรวมสินค้า</th>
								<th>สถานะ</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$ordersObj = new orders();
							$orders = $ordersObj->getAllOrderDetailByCustomer($_SESSION['c_id']);
							$n = 0;
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
											<a href='orderDetail.php?id={$order['o_id']}&action=detail' class='mr-2 btn btn-outline-secondary'>รายละเอียด</a>
                        					<a href='pay.php?id={$order['o_id']}&action=pay' class='mr-2 btn btn-success'>ชำระเงิน</a>
											
											</td>
										</tr>
										";
										$n++;
								}
							}
							?>
						</tbody>
					</table>
					<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
	</div>
	</div>
	</div>
</body>

</html>