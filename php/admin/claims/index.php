<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\claims;
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
    <title>Document</title>
    <link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../style.css">
	
</head>
<body class="font-mali">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <?php include 'float.php'; ?>

  <article>
  <div class="container">
		<div class="row mt-5 ">
			<div class="col ">
				<div class="card mb-3 ">
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #d0e7a3;">
						<h4>ตรวจสอบพัสดุเสียหาย</h4>
					</div>
					<div class="card-body">
					<form action="save_claim.php" method="get">
						<table class="table">
							<thead>
								<tr>
								<th>ลำดับ</th>
								<th>order_id</th>
								<th>รูปภาพ</th>
								<th>ไอดีลูกค้า</th>
                                <th>รายละเอียด</th>
								<th>เวลา</th>
								<th>สถานะ</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$claimsObj = new claims();
									$claims = $claimsObj->getAllClaims();
									$n=0;
									foreach($claims as $claim) {
									$n++;
									echo "
										<tr>    
											<td>$n</td>
											<td>{$claim['OrderId']}</td>
											<td><img src='../../member/upload_claims/{$claim['image']}' width='200'  height='250' class='resize'</td>
											<td>{$claim['CustomerID']}</td>
                                            <td>{$claim['details']}</td>
											<td>{$claim['dttm']}</td>
											<td>{$claim['status']}</td>
											<td>
												<a href='new_tracking.php?id={$claim['OrderId']}' class='mr-2 btn btn-success'>เพิ่มเลขพัสดุใหม่</a>
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