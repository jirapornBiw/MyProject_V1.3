<?php require "../../../vendor/autoload.php";

use App\Model\orders;
use App\Model\pays;


session_start();
if (!empty($_REQUEST['action'])) {
	$action = htmlspecialchars($_REQUEST['action']);
} else {
}
if ($action == 'รอการชำระเงิน') {
	$orderObj = new orders;
	$order = $orderObj->getOrderById($_REQUEST['id']);
} else {
	unset($_REQUEST['action']);
	$orderObj = new orders;
	$order = $orderObj->getOrderById($_REQUEST['id']);
	$payObj = new pays;
	$pay = $payObj->getAllPayById($_REQUEST['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>รายละเอียดการสั่งซื้อสินค้า</title>
	<link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type href="../style-main-admin.css">
</head>

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
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939">
						<h4>รายละเอียดการสั่งซื้อสินค้า</h4>
						<a href="index.php" class="btn btn-light">ย้อนกลับ</a>
					</div>
					<div class="container mt-5 mb-5 align-items-cente 
		justify-content-centerr border border-secondary rounded" style="width: 40rem;">
						<div class="form-group">
							<div class="row">
								<!-- <?php
										echo '<pre>';
										print_r($_REQUEST);
										echo '<pre>';
										?> -->
								<div class="col">
									<h4 class="mt-3">ข้อมูลลูกค้า</h4>
									<hr>
									<label for="name">รหัสสั่งซื้อ : <?php echo $order['o_id']; ?></label></br>
									<label for="name">วันที่ : <?php echo $order['dttm']; ?></label></br>
									<label for="name">ยอดรวมสินค้า : <?php echo $order['total']; ?></label></br>
									<label for="name">ชื่อ : <?php echo $order['name']; ?></label></br>
									<label for="name">ที่อยู่ : <?php echo $order['address'] . ' ต.' . $order['districts'] . ' อ.' . $order['amphures'] . ' จ.' . $order['provinces'] . ' ' . $order['postcode'];  ?></label></br>
									<label for="name">เบอร์โทรศัพท์ : <?php echo $order['phone']; ?></label></br>
									<label for="name">อีเมลล์ : <?php echo $order['gmail']; ?></label></br>
									<label for="name">สถานะ : <?php echo $order['status']; ?></label></br>

									<hr>
								</div>
								<div class="col">
									<h4 class="mt-3">หลักฐานการชำระเงิน</h4>
									<hr>
									<?php
									if ($action == 'รอการชำระเงิน') {
										echo "
										<p>ยังไม่มีรายการชำระเงิน</p>
									";
									} else {
										// echo $pay['image'];exit;
										echo "
										<img src='../pays/upload/{$pay['image']}' width='400px' height='400px' class='image_ordert'>
										";
										// echo ($pay['image']);
									};
									?>



								</div>
							</div>


							<hr>
							<h4>รายการการสั่งซื้อ</h4>

							<div class="card-body">
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
								<!-- ปุ่มเพิ่มหมายเลขพัสดุ -->
								<?php
								if ($action == 'detail') {
									echo "
								";
								} else if ($action == 'รอการตรวจสอบ') {
									echo "
									<a href='tracking_number.php?id={$order['o_id']}&action=add' class='mr-2 btn btn-outline-warning'>เพิ่มเลขพัสดุ</a></td>
									<a href='tracking_number.php?id={$order['o_id']}&action=not_pass' class='mr-2 btn btn-outline-danger'>การตรวจสอบไม่ผ่าน</a></td>
									";
								} else {
									echo "
									";
								}
								?>
							</div>
							<hr>
							<h4>การจัดส่งสินค้า</h4>
							<?php
							if ($action == 'จัดส่งสินค้าสำเร็จ') {
								echo "
									<label>หมายเลขพัสดุ : {$order['tracking_number']}</label><br>
									<label>บริษัทขนส่ง : {$order['shipping_company']}</label>
									";
							} else if ($action == 'รอการตรวจสอบพัสดุเสียหาย') {
								echo "
								<label>หมายเลขพัสดุ : {$order['tracking_number']}</label><br>
								<label>บริษัทขนส่ง : {$order['shipping_company']}</label>
								<hr>
								<h4>ตรวจสอบพัสดุเสียหาย</h4>
								<video width='320' height='240' controls>
								<source src='../admin/claims/{$order['videoClaim']}' type='video/mp4'>
								Your browser does not support HTML video.
							</video><br>
							<button type='button' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#exampleModalNewTracking' data-bs-whatever='{$order['o_id']}'>เพิ่มหมายเลขพัสดุใหม่</button>											

								";
								
							} else {
								echo "
									<label>ไม่มีหมายเลขพัสดุ</label><br>
									";
							}
							?>
						</div></br>

</body>

</html>