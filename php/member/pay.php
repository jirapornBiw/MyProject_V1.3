<?php require "../../vendor/autoload.php";
include 'connect.php';

use App\Model\orders;

session_start();
if (!$_SESSION['login']) {
  header("location: ../../auth/login.php");
  exit;
}
if (isset($_REQUEST['action']) == 'pay') {
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
  <title>ชำระเงิน</title>
  <link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include 'header.php';
  include 'script.php';
  ?>

  <div class="row">
    <div class="col-sm-12 mt-3">
    </div>
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="container mt-5 mb-5 align-items-cente 
		      justify-content-centerr border border-secondary rounded" style="width: 40rem;">
            <form action="save_pay.php" method="post" enctype="multipart/form-data">
              <div class="d-flex justify-content-center">
                <h1 style="color: #9b631b;">ชำระเงิน</h1>
              </div>

              <div class="form-group mt-3">
                <button type="button" class="btn  btn-light" disabled>วิธีการชำระเงิน</button>
                <button type="button" class="btn" style="background-color: #efe5db;" disabled>QR Payment</button>
              </div>
              <label for="name" class="text-right">รหัสสั่งซื้อสินค้า : <?php echo $order['o_id']; ?></label></br>
              <label for="name" class="text-right">ยอดรวมสินค้า : <?php echo $order['total']; ?></label></br>
              <hr>
              <?php include 'promptpay_QRcode.php' ?>
              <div class="container d-flex justify-content-center mt-5">
              <a href="#" class="btn" style="background-color: #efe5db;" onclick="render_qr(x=<?php echo $order['total']; ?>)">ชำระเงินด้วย QR Payment</a>
              </div>
              <input type="hidden" name="CustomerID" value="<?php echo $_SESSION['c_id'] ?>">
              <input type="hidden" name=" OrderId" value="<?php echo $_REQUEST['id'] ?>">
              <div class="form-group mt-5">
                <label for="txt_file">ที่อยู่รูปภาพ</label>
                <input type="file" name="txt_file" id="txt_file" class="form-contro" required>
              </div></br>

              <p>**กรุณาแสกน QR code ด้วยมือถือของคุณ โดยใช้ mobile banking application**</p>
              <div class="container">
                <button class="btn text-light" style="background-color: #9b631b;"type="submid">แจ้งโอนเงิน</button>
                <button class="btn btn-outline-danger" type="reset">ยกเลิก</button>

              </div>

              </br>

          </div>
          </form>
        </div>
      </div>
    </div>
  </div>


</body>

</html>