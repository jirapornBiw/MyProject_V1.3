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
        <div class="col-sm-12 mt-5">
          <div class="alert alert-primary" role="alert">
            การสั่งซื้อ
          </div>
        </div>
  <div class="container">
		<div class="row mt-5">
			<div class="col">
				<div class="card mb-3">
					
					<div class="card-body">
          <form action="save_pay.php?action=add" method="post"
                        enctype="multipart/form-data">
                        
                        </br>
                    <div class="form-group">
                        <label for="topic">ช่องทางการชำระเงิน</label></br>
                        <label for="topic">ธนาคารกรุงไทย</label></br>
                        <label for="topic">เลขที่บัญชี : 4800453127</label></br>
                        <label for="topic">นางสาวจิราภรณ์ หินกอก</label></br>
                    </div></br>
                    
                    <?php include 'promptpay_QRcode.php' ?>
                    <a href="#" class="btn btn-primary" onclick="render_qr(x=<?php echo $order['total'];?>)" >จ่ายเงิน</a>
                    <label for="name">จำนวนเงิน : <?php echo $order['total'];?></label></br>



                    <input type="hidden" name="CustomerID" value="<?php echo $_SESSION['c_id']?>">
                    <!--<label for="name">รหัสสั่งซื้อ : <?php echo $order['id'];?></label></br>-->
                    <input type="hidden" name=" OrderId" value="<?php echo $_REQUEST['id']?>">
                    <div class="form-group">
                        <label for="txt_file">ที่อยู่รูปภาพ</label></br>
                        <input type="file" name="txt_file" id="txt_file" class="form-contro">
                    </div></br>

                    
                    
                    <button class="btn btn-success" type ="submid">แจ้งโอนเงิน</button>
			        <button class="btn btn-danger" type ="reset">ยกเลิก</button>

</br>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>