<?php require "../../vendor/autoload.php"  ?>
<?php
use App\Model\orders;

session_start();
if(isset($_REQUEST['action'])=='pay'){
	$orderObj = new orders;
	$order = $orderObj->getOrderById($_REQUEST['id']);
}
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน</title>
    <link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  </head>
<body class="font-mali">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<?php 
	include 'header.php'; 
	include 'script.php';
 ?>

<div class="row">
        <div class="col-sm-12 mt-3">
          <!--<div class="alert alert-primary" role="alert">
            การสั่งซื้อ
          </div>-->
        </div>
  <div class="container">
		<div class="row mt-5">
			<div class="col">
          <div class="container mt-5 mb-5 align-items-cente 
		      justify-content-centerr border border-secondary rounded" style="width: 40rem;">
          <form action="save_pay.php" method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-center" >
              <h1>ชำระเงิน</h1>
            </div>
            
                    <div class="form-group mt-3">
                        <button type="button" class="btn  btn-light" disabled>วิธีการชำระเงิน</button>
                        <button type="button" class="btn  btn-secondary" disabled>QR Payment</button>
                    </div>
                      <label for="name" class="text-right">รหัสสั่งซื้อสินค้า : <?php echo $order['o_id'];?></label></br>
                      <label for="name" class="text-right">ยอดรวมสินค้า : <?php echo $order['total'];?></label></br><hr>
                    <?php include 'promptpay_QRcode.php' ?>
                    <a href="#" class="btn btn-secondary" onclick="render_qr(x=<?php echo $order['total'];?>)">ชำระเงินด้วย QR Payment</a>
                    <input type="hidden" name="CustomerID" value="<?php echo $_SESSION['c_id']?>">
                    <input type="hidden" name=" OrderId" value="<?php echo $_REQUEST['id']?>">
                    <div class="form-group mt-5">
                        <label for="txt_file">ที่อยู่รูปภาพ</label>
                        <input type="file" name="txt_file" id="txt_file" class="form-contro">
                    </div></br>

                    <p>**กรุณาแสกน QR code ด้วยมือถือของคุณ โดยใช้ mobile banking application**</p>
                    
                    <button class="btn btn-success" type ="submid">แจ้งโอนเงิน</button>
			        <button class="btn btn-danger" type ="reset">ยกเลิก</button>

</br>

                                    </div>
                                </form>
        </div>
                    </div>
                </div>
            </div>


</body>
</html>