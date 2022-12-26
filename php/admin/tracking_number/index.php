<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\trackings;
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
    <title>เพิ่มหมายเลขการจัดส่ง</title>
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
						<h4>เพิ่มหมายเลขการจัดส่ง</h4>
					</div>
					<div class="card-body">
					<form action="save_pay.php" method="get">
						<table class="table">
							<thead>
								<tr>
								<th>ลำดับ</th>
								<th>order_id</th>
								<th>ไอดีลูกค้า</th>
								<th>บริษัทที่จัดส่ง</th>
								<th>หมายเลขพัสดุ</th>
								<th>เวลาจัดส่งสินค้า</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$trackingsObj = new trackings();
									$trackings = $trackingsObj->getAllTrackingsTest();
									$n=0;
									foreach($trackings as $tracking) {
									$n++;
									echo "
										<tr>    
											<td>$n</td>
											<td>{$tracking['o_id']}</td>
											<td>{$tracking['id_customer']}</td>
											<td>{$tracking['shipping_company']}</td>
											<td>{$tracking['tracking']}</td>
											<td>{$tracking['dttm']}</td>
											<td>
												<a href='add.php?OrderId={$tracking['o_id']}&customerID={$tracking['id_customer']}' class='mr-2 btn btn-outline-success'>เพิ่มหมายเลขจัดส่ง</a>
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