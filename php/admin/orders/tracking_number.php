<?php require "../../../vendor/autoload.php"  ?>
<?php
use App\Model\orders;
use App\Model\order_detail;

session_start();

if(isset($_REQUEST['action'])=='add'){
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
    <title>เพิ่มหมายเลขพัสดุสินค้า</title>
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
						<h4>เพิ่มหมายเลขพัสดุสินค้า</h4>
						<a href="index.php" class="btn btn-light">ย้อนกลับ</a>
					</div>

                    <div class="container mt-5 mb-5 align-items-cente 
		justify-content-centerr border border-secondary rounded" style="width: 40rem;">
					<div class="form-group">
                    <h4 class="mt-3">ข้อมูลลูกค้า</h4><hr>
                    <label for="name">รหัสสั่งซื้อ : <?php echo $order['o_id'];?></label></br>
                    <label for="name">วันที่ : <?php echo $order['dttm'];?></label></br>
                    <label for="name">ชื่อ : <?php echo $order['name'];?></label></br>
                    <label for="name">ที่อยู่ : <?php echo $order['address'];?></label></br>
                    <label for="name">รหัสไปรษณีย์ : <?php echo $order['postcode'];?></label></br>
                    <label for="name">เบอร์โทรศัพท์ : <?php echo $order['phone'];?></label></br>
                    <label for="name">อีเมลล์ : <?php echo $order['gmail'];?></label></br>
                    
					<hr>

					<form action="save_add_TK.php" method="post"
                        enctype="multipart/form-data">
                        
                    <h4 class="mt-3 mb-3">ข้อมูลการจัดส่งสินค้า</h4>
					<input type="hidden" name="o_id" value="<?php echo $order['o_id']?>">
                    <div class="form-group">
                        <label for="tracking_number">หมายเลขพัสดุ</label></br>
                        <input type="text" name="tracking_number" id="tracking_number" class="form-contro" >
                    </div>

                    <div class="form-group mt-2">
                        <label for="shipping_company">บริษัทขนส่งสินค้า</label></br>
                        <input type="text" name="shipping_company" id="shipping_company" class="form-contro" >
                    </div></br>
				
					<button class="btn btn-outline-success" type ="submid">บันทึก</button>
					</from>

                    
                   



                    </div></br>
                                    
</body>
</html>