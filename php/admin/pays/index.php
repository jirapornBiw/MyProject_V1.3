<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\pays;
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
    <title>ตรวจสอบการชำระเงิน</title>
    <link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../style.css">
	
</head>
<body class="font-mali">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <?php include 'float.php'; ?>

  <article>
  <div class="container-fluid">
		<div class="row">
			<div class="col ">
				<div class="card mb-3 ">
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939;">
						<h4>ตรวจสอบการชำระเงิน</h4>
					</div>
					<div class="card-body">
					<form action="test_REQUEST.php" method="get">
						<table class="table">
							<thead>
								<tr>
								<th>ลำดับ</th>
								<th>order_id</th>
								<th>รูปภาพ</th>
								<th>ไอดีลูกค้า</th>
								<th>เวลา</th>
								<th>สถานะ</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$paysObj = new pays();
									$pays = $paysObj->getAllPay();
									$n=0;
									foreach($pays as $pay) {
									$n++;
									echo "
										<tr>    
											<td>$n</td>
											<td>{$pay['OrderId']}</td>
											<td><img src='../../member/upload/{$pay['image']}' width='200'  height='250' class='resize'</td>
											<td>{$pay['id_customer']}</td>
											<td>{$pay['dttm']}</td>
											<td>{$pay['status']}</td>
											<td>
												<a href='save_pay.php?id={$pay['OrderId']}&action=รอการจัดส่ง' class='mr-2 btn btn-outline-success'>ยืนยัน</a>
												<a href='save_pay.php?id={$pay['OrderId']}&action=เกิดข้อผิดพลาด' class='btn btn-outline-danger'>มีข้อผิดพลาด</a>
											</td>
										</tr>
										";
										}
									?>
							</tbody>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</article>
</body>
</html>