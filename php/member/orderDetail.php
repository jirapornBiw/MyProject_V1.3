<?php require "../../vendor/autoload.php";
include 'connect.php';

use App\Model\orders;

session_start();
if (!$_SESSION['login']) {
	header("location: ../../auth/login.php");
	exit;
}
if (isset($_REQUEST['action']) == 'detail') {
	$orderObj = new orders;
	$order = $orderObj->getOrderById($_REQUEST['id']);
	$status = $order['status'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>รายละเอียดการสั่งซื้อ</title>
	<link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>

	<div class="container">
		<?php
		include 'header.php';
		include 'script.php';
		?>
	</div>
	<div class="row mt-5">
		<div class="col-sm-12 mt-5">
			<div class="d-flex justify-content-center mt-2" style="color: #9b631b;">
				<h1>รายละเอียดการสั่งซื้อ</h1>
			</div>
		</div>
		<div class="container mt-5 mb-5 align-items-cente 
		justify-content-centerr border border-secondary rounded" style="width: 40rem;">

			<div class="form-group mt-3">
				<h4 style="color: #9b631b;">ข้อมูลลูกค้า</h4>
				<hr>
				<label for="name">รหัสสั่งซื้อสินค้า : <?php echo $order['o_id']; ?></label></br>
				<label for="name">วันที่ : <?php echo $order['dttm']; ?></label></br>
				<label for="name">ชื่อ : <?php echo $order['name']; ?></label></br>
				<label for="name">ที่อยู่ : <?php echo $order['address'] . ' ตำบล' . $order['districts']
												. ' อำเภอ' . $order['amphures'] . ' จังหวัด' . $order['provinces']; ?></label></br>
				<label for="name">รหัสไปรษณีย์ : <?php echo $order['postcode']; ?></label></br>
				<label for="name">เบอร์โทรศัพท์ : <?php echo $order['phone']; ?></label></br>
				<label for="name">อีเมลล์ : <?php echo $order['gmail']; ?></label></br>
				<label for="name">สถานะ : <?php echo $order['status']; ?></label></br>
				<?php
				if ($status == 'จัดส่งสินค้าสำเร็จ') {
					echo "
					<label for='name'>หมายเลขพัสดุ : {$order['tracking_number']}</label></br>
					<label for='name'>บริษัทขนส่ง : {$order['shipping_company']}</label></br>

					";
				} else {
				}
				?>
				<hr>
				<h4 style="color: #9b631b;">รายการการสั่งซื้อ</h4>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>รหัสสินค้า</th>
								<th>ชื่อสินค้า</th>
								<th>จำนวน</th>
								<th>ราคารวม</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$ordersObj = new orders();
							$orders = $ordersObj->getAllOrderDetail($_REQUEST['id']);
							$n = 0;
							$sumpricetotal = 0;
							$amount = 0;
							foreach ($orders as $order) {
								$n++;

								echo "
										<tr>    
											<td>$n</td>
											<td>{$order['product_id']}</td>
											<td>{$order['product_name']}</td>
											<td>{$order['qty']}</td>
											<td>{$order['pricetotal']}</td>
										</tr>
										";
							}
							$sumpricetotal = (int)$order['pricetotal'];
							$amount = $order['total'] - $sumpricetotal;
							?>
						</tbody>
					</table>
					<div class="container" align="right">
						<label>ราคาสินค้ารวม : <?php echo $sumpricetotal; ?></label><br>
						<label>ค่าจัดส่งสินค้า : <?php echo $amount; ?></label><br>
						<label>จำนวนเงินรวมทั้งหมด : <?php echo $order['total'] ?> บาท</lavel><br>
							<div class="container mt-3">

							</div>
							<?php
							$action = htmlspecialchars($_REQUEST['action']);
							// echo $status;

							if ($status == 'รอการชำระเงิน' || $status == 'ตรวจสอบไม่ผ่าน') {
								echo "
								<a href='cancel_order.php?id={$order['o_id']}&action=cancel' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#BackdropCancelOrder'>ยกเลิกการสั่งซื้อ</a>
								<a href='pay.php?id={$order['o_id']}&action=pay' class='mr-2 btn text-light' style='background-color: #9b631b;'>ชำระเงิน</a>
								";
							} 
							else if ($status == 'จัดส่งสินค้าสำเร็จ' ){
								echo "
								<a href='claimDetail.php?id={$order['o_id']}' class='btn btn-outline-danger'>แจ้งพัสดุเสียหาย</a>
								";
							}
							else {
							}
							?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<?php
	include 'modal.php';
	?>
</body>

</html>