<?php require "../../vendor/autoload.php"  ?>
<?php
include 'connect.php';  
use App\Model\orders;
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
          <div class="alert alert-primary" role="alert">
            การสั่งซื้อ
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
									$n=0;
									foreach($orders as $order) {
									$n++;
									echo "
										<tr>    
											<td>$n</td>
											<td>{$order['o_id']}</td>
											<td>{$order['dttm']}</td>
											<td>{$order['name']}</td>
											<td>{$order['total']}</td>
											<td>{$order['status']}</td>
											<td>
											<a href='orderDetail.php?id={$order['o_id']}&action=detail' class='mr-2 btn btn-info'>รายละเอียด</a>
                        					<a href='pay.php?id={$order['o_id']}&action=pay' class='mr-2 btn btn-success'>ชำระเงิน</a>
											
											</td>
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