<?php require "../../vendor/autoload.php"  ?>
<?php
include 'connect.php';  
use App\Model\orders;
use App\Model\trackings;
session_start();
if(!$_SESSION['login']){
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
              <h1>ประวัติการสั่งซื้อ</h1>
            </div>
        </div>
        <div class="container mt-5 mb-5 align-items-cente 
		justify-content-centerr border border-secondary rounded" style="width: 40rem;">
        <div class="card-body">
						<table class="table">
							<thead>
								<tr>
								<th>ลำดับ</th>
                				<th>รหัสสั่งซื้อ</th>
								<th>วันที่สั่งซื้อ</th>
								<th>สถานะ</th>
								<th>หมายเลขพัสดุ</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$trackinsObj = new trackings();
									$trackins = $trackinsObj->getAllTracking($_REQUEST['id']);
									$n=0;
									foreach($trackins as $tracking) {
									$n++;
									echo "
										<tr>    
											<td>$n</td>
											<td>{$tracking['o_id']}</td>
											<td>{$tracking['dttm']}</td>
											<td>{$tracking['status']}</td>
                                            <td>{$tracking['tracking']}</td>
										</tr>
										";
										}
									?>
							</tbody>
						</table>
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