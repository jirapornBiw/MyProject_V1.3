<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\orders;
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
    <title>รายงานการขายสินค้า</title>
    <link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body class="font-mali">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <?php include '../float.php'; ?>

  <article>
  <div class="container-fluid">
		<div class="row">
			<div class="col ">
				<div class="card mb-3 ">
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939;">
						<h4 class="text-light">รายงานการขายสินค้า</h4>
						<a href="add.php?action=add" class="btn btn-outline-light">เพิ่มสินค้าใหม่</a>
					</div>

					<div class="row mt-4">
						<div class="col-8">
						<a href='index.php' class='btn btn-outline-secondary'>รายการทั้งหมด</a>
						<a href='NewOrder.php' class='btn btn-outline-warning'>รายการใหม่</a>
						<a href='#.php' class='btn btn-outline-success'>ชำระเงินแล้ว</a>
						<a href='Shipping.php' class='btn btn-outline-primary'>ส่งสินค้าแล้ว</a>

						</div>
					</div>


					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
								<th>ลำดับ</th>
								<th>orderid</th>
								<th>ชื่อลูกค้า</th>
								<th>วันที่สั่งซื้อ</th>
								<th>ยอดรวมสินค้า</th>
								<th>สถานะ</th>
								
								</tr>
							</thead>
							<tbody>
							<?php
								$ordersObj = new orders();
									$orders = $ordersObj->getPaymentOrders();
									$n=0;
									foreach($orders as $order) {
									$n++;
									echo "
										<tr>    
											<td>$n</td>
											<td>{$order['o_id']}</td>
											<td>{$order['name']}</td>
											<td>{$order['dttm']}</td>
											<td>{$order['dttm']}</td>
											<td>{$order['status']}</td>
											
											
											<td>
											<a href='orderDetail.php?id={$order['o_id']}&action=detail' class='btn btn-outline-warning'>รายละเอียด</a>
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