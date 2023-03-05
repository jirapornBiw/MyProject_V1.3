<?php require "../../../vendor/autoload.php";

use App\Model\orders;

$orderObj = new orders;
$order = $orderObj->getOrderById($_REQUEST['id']);

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เพิ่มหมายเลขการจัดส่งใหม่</title>
	<link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body class="font-mali">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<?php include '../float.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="card mb-3">
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939">
						<h4>เพิ่มหมายเลขการจัดส่งใหม่</h4>
						<a href="index.php" class="btn btn-light">ย้อนกลับ</a>
					</div>

					<div class="container mt-5 mb-5 align-items-cente 
		justify-content-centerr border border-secondary rounded" style="width: 40rem;">
						<div class="form-group">
							<div class="row">
								<div class="col">
									<h4 class="mt-3">ข้อมูลลูกค้า</h4>
									<hr>
									<label for="name">รหัสสั่งซื้อ : <?php echo $order['o_id']; ?></label></br>
									<label for="name">วันที่ : <?php echo $order['dttm']; ?></label></br>
									<label for="name">ยอดรวมสินค้า : <?php echo $order['total']; ?></label></br>
									<label for="name">ชื่อ : <?php echo $order['name']; ?></label></br>
									<label for="name">ที่อยู่ : <?php echo $order['address']; ?> จ.<?php echo $order['provinces']; ?> อ.<?php echo $order['amphures']; ?></label></br>
									<label for="name">ต.<?php echo $order['districts']; ?> <?php echo $order['postcode']; ?></label></br>
									<label for="name">เบอร์โทรศัพท์ : <?php echo $order['phone']; ?></label></br>
									<label for="name">อีเมลล์ : <?php echo $order['gmail']; ?></label></br>
									<label for="name">สถานะ : <?php echo $order['status']; ?></label></br>

									<hr>
								</div>
								<div class="col">
									<h4 class="mt-3">หลักฐานการรับพัสดุ</h4>
									<hr>
									<video width="320" height="240" controls>
										<source src="../<?php echo $order['videoClaim']?>" type="video/mp4">
										Your browser does not support HTML video.
									</video>
								</div>
							</div>
							<h4 class="mb-0">รายการการสั่งซื้อ</h4>
							<table class="table">
								<thead>
									<tr>
										<th>ลำดับ</th>
										<th>รหัสสินค้า</th>
										<th>ชื่อสินค้า</th>
										<th>น้ำหนัก</th>
										<th>จำนวน</th>
										<th>ราคารวม</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$ordersObj = new orders();
									$orders = $ordersObj->getAllOrderDetail($_REQUEST['id']);
									$n = 0;
									foreach ($orders as $order) {
										$n++;
										echo "
										<tr>    
											<td>$n</td>
											<td>{$order['product_id']}</td>
											<td>{$order['product_name']}</td>
											<td>{$order['weight']}</td>
											<td>{$order['qty']}</td>
											<td>{$order['pricetotal']}</td><br>
										</tr>
										";
									}
									?>

								</tbody>
							</table>
						</div>

						<form action="save_tracking.php" method="GET" enctype="multipart/form-data">
							<input type="hidden" name="OrderId" value="<?php echo $_REQUEST['id'] ?>">
							<div class="row">
								<div class="col">
									<label for="company">บริษัทที่ทำการจัดส่ง</label></br>
									<input type="text" name="company" id="company" class="form-contro">
								</div>
								<div class="col">
									<label for="tracking">เลขพัสดุใหม่</label></br>
									<input type="text" name="tracking" id="tracking" class="form-contro">
								</div>
							</div><br>

							<button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">บันทึก</button>
							<button class="btn btn-outline-danger mb-2" type="reset">ยกเลิก</button>
						</form>




					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>