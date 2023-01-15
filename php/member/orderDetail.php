<?php require "../../vendor/autoload.php"  ?>
<?php
include 'connect.php';  
use App\Model\orders;
session_start();
if(!$_SESSION['login']){
  header("location: ../../auth/login.php");
  exit;
}
if(isset($_REQUEST['action'])=='detail'){
	$orderObj = new orders;
	$order = $orderObj->getOrderById($_REQUEST['id']);
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
<?php 
	include 'header.php'; 
	include 'script.php';
 ?>
 <div class="row">
 		<div class="col-sm-12 mt-5">
			<div class="d-flex justify-content-center">
              <h1>รายละเอียดการสั่งซื้อ</h1>
            </div>
        </div>
		<div class="container mt-5 mb-5 align-items-cente 
		justify-content-centerr border border-secondary rounded" style="width: 40rem;">

        <div class="form-group">
                    <h4>ข้อมูลลูกค้า</h4><hr>
                    <label for="name">รหัสสั่งซื้อ : <?php echo $order['o_id'];?></label></br>
                    <label for="name">วันที่ : <?php echo $order['dttm'];?></label></br>
                    <label for="name">ชื่อ : <?php echo $order['name'];?></label></br>
                    <label for="name">ที่อยู่ : <?php echo $order['address'] . ' ตำบล '.$order['provinces']. 
					$order['provinces'] . $order['amphures'];?></label></br>
                    <label for="name">รหัสไปรษณีย์ : <?php echo $order['postcode'];?></label></br>
                    <label for="name">เบอร์โทรศัพท์ : <?php echo $order['phone'];?></label></br>
                    <label for="name">อีเมลล์ : <?php echo $order['gmail'];?></label></br>
                    
                    <h4>รายการการสั่งซื้อ</h4>
                    
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
									$n=0;
									foreach($orders as $order) {
									$n++;
									echo "
										<tr>    
											<td>$n</td>
											<td>{$order['product_id']}</td>
											<td>{$order['product_name']}</td>
											<td>{$order['qty']}</td>
											<td>{$order['pricetotal']}</td><br>
											
										</tr>
										";
										
										}
										?>
								</tbody>
							</table>
						</div>

						
						
						
                   



                    </div></div></br>
          <br><br>
          <!--<center>Basic PHP PDO แสดงสินค้าหน้าแรก by devbanban.com 2021
            <br>
          </center>-->
          
        </div>
      </div>
    </div>
</body>
</html>