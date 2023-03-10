<?php require "../../vendor/autoload.php";
include 'connect.php';

use App\Model\trackings;

session_start();
if (!$_SESSION['login']) {
	header("location: ../../auth/login.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>แจ้งพัสดุเสียหาย</title>
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
				<h1>แจ้งพัสดุเสียหาย</h1>
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
								<th>หมายเลขพัสดุ</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$trackinsObj = new trackings();
							$trackins = $trackinsObj->getAllTracking($_REQUEST['id']);
							$n = 0;
							foreach ($trackins as $tracking) {
								$n++;
								echo "
										<tr>    
											<td>$n</td>
											<td>{$tracking['o_id']}</td>
											<td>{$tracking['dttm']}</td>
                                            <td>{$tracking['tracking']}</td>
                                            <td>
                                            <a href='claimDetail.php?id={$tracking['o_id']}' class='mr-2 btn btn-info'>แจ้งพัสดุเสียหาย</a>
                                            </td>
										</tr>
										";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<br><br>
			<!--<center>Basic PHP PDO แสดงสินค้าหน้าแรก by devbanban.com 2021
            <br>
          </center>-->

		</div>
	</div>
	</div>
</body>

</html>