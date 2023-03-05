<?php require "../../vendor/autoload.php";
include 'connect.php';

use App\Model\orders;

session_start();
$orderObj = new orders;
$order = $orderObj->getOrderById($_REQUEST['id']);
$status = $order['status'];
if (!$_SESSION['login']) {
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
  <title>แจ้งพัสดุเสียหาย</title>
  <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <?php
    include 'header.php';
    include 'script.php';
    ?>
  </div>
  <div class="row mt-5">
    <div class="col-sm-12 mt-5">
      <div class="d-flex justify-content-center mt-2" style="color: #9b631b;">
        <h1>รายละเอียดการสั่งซื้อ</h1>
      </div>
    </div>
    <div class="container mt-5 mb-5 align-items-cente 
		justify-content-centerr border border-secondary rounded" style="width: 40rem;">

      <div class="form-group mt-3">
        <h4 style="color: #9b631b;">ข้อมูลลูกค้า</h4>
        <hr>
        <label for="name">รหัสสั่งซื้อสินค้า : <?php echo $order['o_id']; ?></label></br>
        <label for="name">วันที่ : <?php echo $order['dttm']; ?></label></br>
        <label for="name">ชื่อ : <?php echo $order['name']; ?></label></br>
        <label for="name">ที่อยู่ : <?php echo $order['address'] . ' ตำบล' . $order['districts']
                                      . ' อำเภอ' . $order['amphures'] . ' จังหวัด' . $order['provinces']; ?></label></br>
        <label for="name">รหัสไปรษณีย์ : <?php echo $order['postcode']; ?></label></br>
        <label for="name">เบอร์โทรศัพท์ : <?php echo $order['phone']; ?></label></br>
        <label for="name">อีเมลล์ : <?php echo $order['gmail']; ?></label></br>
        <label for="name">สถานะ : <?php echo $order['status']; ?></label></br>


        <?php
        if ($status == 'จัดส่งสินค้าสำเร็จ') {
          echo "
					<label for='name'>หมายเลขพัสดุ : {$order['tracking_number']}</label></br>
					<label for='name'>บริษัทขนส่ง : {$order['shipping_company']}</label></br>

					";
        } else {
        }
        ?>
        <hr>
        <h4 style="color: #9b631b;">รายการการสั่งซื้อ</h4>
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
              $n = 0;
              $sumpricetotal = 0;
              $amount = 0;
              foreach ($orders as $order) {
                $n++;

                echo "
										<tr>    
											<td>$n</td>
											<td>{$order['product_id']}</td>
											<td>{$order['product_name']}</td>
											<td>{$order['qty']}</td>
											<td>{$order['pricetotal']}</td>
										</tr>
										";
              }
              $sumpricetotal = (int)$order['pricetotal'];
              $amount = $order['total'] - $sumpricetotal;
              ?>
            </tbody>
          </table>
          <div class="container" align="right">
            <label>ราคาสินค้ารวม : <?php echo $sumpricetotal; ?></label><br>
            <label>ค่าจัดส่งสินค้า : <?php echo $amount; ?></label><br>
            <label>จำนวนเงินรวมทั้งหมด : <?php echo $order['total'] ?> บาท</lavel><br>
              <div class="container mt-3">

              </div>



          </div>



          <!-- -->


        </div>
      </div>
      <div class="card-body">
        <form action="save_claim.php?" enctype="multipart/form-data" method="post" enctype="multipart/form-data">

          <!--<form action="test_REQUEST.php" method="post"
                        enctype="multipart/form-data">-->



          </br>
          <input type="hidden" name="CustomerID" value="<?php echo $_SESSION['c_id'] ?>">
          <input type="hidden" name=" OrderId" value="<?php echo $_REQUEST['id'] ?>">
          <hr>
        <h4 class="mb-4" style="color: #9b631b;">ข้อมูลลูกค้า</h4>

          <div class="form-group">
            <label for="details">รายละเอียดความเสียหายเพิ่มเติม</label></br>
            <input placeholder="กรุณากรอกรายละเอียด" type="text" name="details" id="details" style="width: 100%;height:100px;" class="form-contro" required>
          </div></br>

          <!-- <div class="form-group">
                        <label for="txt_file">รูปภาพ</label></br>
                        <input type="file" name="txt_file" id="txt_file" class="form-contro">
                    </div></br> -->
          <div class="form-group">
            <label for="file">หลักฐานวิดีโอขณะเปิดกล่องพัสดุ</label></br>
            <input type="file" name="video" id="video" class="form-contro mb-3" required><br>
            <label for="name text align justify " style="color: #f00;font-size:5px;width: 60%">
              <p class="mb-0">*** เงื่อนไขการแจ้งรับพัสดุเสียหาย***</p>
              <p>กรณีสินค้าเสียหาย ผู้แจ้งจะต้องมีหลักฐานวิดีโอขณะเปิดกล่องพัสดุ นับสินค้าในกล่องให้ครบทุกชิ้น
                แนบหลักฐานขณะเปิดกล่องพัสดุ หากทางร้านเราตรวจสอบความถูกต้องเรียบร้อย จะทำการจัดส่งใหม่อีกครั้ง
                โดยแจ้งเตือนใหม่ผ่านทาง อีเมลล์ และลูกค้าสามาถเช็คเลขพัสดุใหม่อีกครั้งได้ทางอีเมลล์ หรือทางเว็บของเรา
                ผู้แจ้งไม่จำเป็นต้องส่งสินค้ากลับคืนมาให้กับทางร้านเรา (ไม่สามารถเปลี่ยนที่อยู่การจัดส่งได้)</p>
            </label></br>
          </div></br>
          <button class="btn btn-success" type="submid">บันทึก</button>
          <button class="btn btn-danger" type="reset">ยกเลิก</button>
      </div>
    </div>
  </div>
  </div>
  </div>
  <?php
  include 'modal.php';
  ?>



  <?php exit; ?>
  <div class="row">
    <div class="col-sm-12 mt-5">
      <div class="d-flex justify-content-center">
        <h1>แจ้งพัสดุเสียหาย</h1>
      </div>
    </div>
    <div class="container mt-5 mb-5 align-items-cente 
		justify-content-centerr border border-secondary rounded" style="width: 35rem;">
      <div class="card-body">

        <div class="card-body">
          <form action="save_claim.php?" enctype="multipart/form-data" method="post" enctype="multipart/form-data">

            <!--<form action="test_REQUEST.php" method="post"
                        enctype="multipart/form-data">-->



            </br>
            <input type="hidden" name="CustomerID" value="<?php echo $_SESSION['c_id'] ?>">
            <input type="hidden" name=" OrderId" value="<?php echo $_REQUEST['id'] ?>">
            <div class="form-group">
              <label for="details">รายละเอียดความเสียหาย</label></br>
              <input placeholder="กรุณากรอกรายละเอียด" type="text" name="details" id="details" style="width: 300px;height:100px;" class="form-contro">
            </div></br>

            <!-- <div class="form-group">
                        <label for="txt_file">รูปภาพ</label></br>
                        <input type="file" name="txt_file" id="txt_file" class="form-contro">
                    </div></br> -->
            <div class="form-group">
              <label for="file">คลิปหลักฐานการเปิดพัสดุ</label></br>
              <input type="file" name="video" id="video" class="form-contro"><br>
              <label for="file">**กรุณาถ่ายคลิปวิดิโอก่อนเปิดพัสดุโดยให้เห็นจ่าหน้ากล่องพัสดุชัดเจน**</label></br>
            </div></br>
            <button class="btn btn-success" type="submid">บันทึก</button>
            <button class="btn btn-danger" type="reset">ยกเลิก</button>
        </div>

      </div>
    </div>
  </div>
  </div>
</body>

</html>