<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\orders;
use App\Model\order_detail;

session_start();

if(isset($_REQUEST['action'])=='add'){
	$orderObj = new orders;
	$order = $orderObj->getOrderById($_REQUEST['id']);
}
/*if(isset($_REQUEST['action'])=='detail'){
	$orderObj = new orders;
	$order = $orderObj->getOrderById($_REQUEST['id']);
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ายละเอียดการสั่งซื้อสินค้า</title>
    <link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  </head>
<body class="font-mali">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<?php include 'float.php'; ?>
  <div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="card mb-3">
					<div class="card-header text-white d-flex justify-content-between" style="background-color: #393939">
						<h4>รายละเอียดการสั่งซื้อสินค้า</h4>
						<a href="index.php" class="btn btn-light">ย้อนกลับ</a>
					</div>

					<div class="form-group">
                    <h4>ข้อมูลลูกค้า</h4>
                    <label for="name">รหัสสั่งซื้อ : <?php echo $order['o_id'];?></label></br>
                    <label for="name">วันที่ : <?php echo $order['dttm'];?></label></br>
                    <label for="name">ชื่อ : <?php echo $order['name'];?></label></br>
                    <label for="name">ที่อยู่ : <?php echo $order['address'];?></label></br>
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
											<td><a href='tracking_number.php?id={$order['o_id']}&action=add' class='mr-2 btn btn-outline-warning'>เพิ่มเลขพัสดุ</a></td>
										</tr>
										";
										
										}
										?>
								</tbody>
							</table>
						</div>
                    </div></br>
                                    
</body>
</html>