<?php require "../../vendor/autoload.php";
session_start();
// if(!$_SESSION['login']){
//   header("location: ../../auth/login.php");
//   exit;
// }
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าแรก</title>
  <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php

  if (!isset($_SESSION['login'])) { //มีตัวแปล
    $_SESSION["login"] = 0;
  }
  else {
  }
  
  if ($_SESSION['login'] == 1) {
    include 'header.php';
  } else {
    include '../guest/header.php';
  }
  include 'script.php';
  ?>

  <br>
  <div class="row">
    <div class="container-image" width="100%"></div>
    <img src="../../img/bg-index.jpg" width="100%">

  </div>

  <!-- ส่วนที่2 แสดงเนื้อหาหมู่บ้าน -->


  <div class="row" style="width: 100%; text-align: center;margin-top: 0px; margin: auto;margin-bottom: 50px; background-color: #F1F2F2; padding-bottom: 150px">

    <div class="col-sm-12 col-md-12 col-lg-6 R ses2 mt-5">
      <div class="mrmain wmain mt-5" style="width: 100%;float: right;">
        <div style="width: 100%; margin: auto; text-align:  center">
          <h1>
            <p class="txtmain1" style="font-family: 'Jomolhari', serif;">หมู่บ้าน บ้านกอก</p>
          </h1>
          <p><span class="txtmain2 h2">ยินดีต้อนรับ</span></p>
          <p><span class="txtmain2 h4">ธุรกิจผลิตสินค้าข้าวสารบรรจุถุง</span></p>
          <div style="width: 100%; margin: auto; text-align:  center">
          </div>
          <div style="width: 100%; margin: auto; text-align:justify; margin-top: 27px">
            <span class="txtmain3" style="text-align:justify;">ภายใต้แบรนด์ BANKAOHOMRICE จัดตั้งขึ้นภายในหมู่บ้าน บ้านกอก จากครอบครัวของพวกเรา
              ซึ่งประกอบอาชีพเกษตรกรส่วนใหญ่ ราคาของข้าวสารในปัจจุบันนั้นตกต่ำ จึงทำให้เกษตรกรนั้น
              ขาดทุน ครอบครัวเราได้จัดทำผลิตภัณฑ์ข้าวสารบรรจุถุงขายในราคาย่อยเยาเพื่อตอบสนอง
              ความต้องการที่หลากหลายของผู้บริโภค เรามุ่งมั่นและพัฒนาในการดำเนินการผลิตให้เป็นไปตามระบบ
              เนื่องจากระบบจะให้ความสำคัญต่อการใช้เครื่องจักรอุปกรณ์ที่มีประสิทธิภาพควบคุมทุกขั้นตอน
              ของกระบวนการผลิต เพื่อช่วยขยายและกระจายสินค้าของครอบครัวเรา.

            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6 L mt-5" style="margin-top: 100px;height: auto">
      <div class="row">
        <div class="col-5 well">
          <div class="well mb-1">
            <img class="imgmain" style="width:100%;" src="https://mpics.mgronline.com/pics/Images/564000001166305.JPEG">
          </div>
          <div class="well mb-1">
            <img class="imgmain" style="width:100%;" src="https://static.naewna.com/uploads/files2017/images/2(1004).jpg">
          </div>
          <div class="well">
            <img class="imgmain" style="width:100%;" src="https://static.thairath.co.th/media/Dtbezn3nNUxytg04OS5LE0z03K9ff19WQ1FKoe5yRgBtCQ.jpg">
          </div>
        </div>
        <div class="col-7 well mt-2">
          <div class="well mb-3">
            <img class="imgmain" style="width:100%;" src="https://i0.wp.com/media.mekhanews.com/2022/10/asian-man-farmer-with-hand-holding-smart-phone-standing-rice-farm-cash-subsidy-concept.jpg?fit=1000%2C667&ssl=1">
          </div>
          <div class="well">
            <img class="imgmain" style="width:100%;" src="https://www.innnews.co.th/wp-content/uploads/2021/02/%E0%B8%8A%E0%B8%B2%E0%B8%A7%E0%B8%99%E0%B8%B2-3.png">
          </div>
        </div>
      </div>
      <!-- <img class="imgmain" style="width:100%;" src="https://www.benjarongrice.com/img/bgmain33860.jpg?v=1"> -->

    </div>

  </div>
  <!-- ส่วนของ ผลิตภัณฑ์ของเรา -->
  <div class="row mt-5 text-center">
    <div class="container" style="width: 100%;color: #a65729;">
      <h1 class="text-center">ผลิตภัณฑ์ของเรา</h1>
    </div>

    <div class="col-sm-4 ">
      <div class="d-flex justify-content-center">
        <img src="../guest/image/หอมมะลิ.jpg" width="200px">
      </div>
      <div class="container text-center mt-2">
        <h4>ข้าวขาวหอมมะลิ 100%</h4>
      </div>
    </div>
    <div class="col-sm-4 ml-5">
      <div class="d-flex justify-content-center">
        <img src="../guest/image/กล้องหอมมะลิ.jpg" width="200px">
      </div>
      <div class="container text-center mt-2">
        <h4>ข้าวกล้องหอมมะลิ</h4>
      </div>
    </div>
    <div class="col-sm-4 ml-5">
      <div class="d-flex justify-content-center">
        <img src="../guest/image/ข้าวเหนียว.jpg" width="200px">
      </div>
      <div class="container text-center mt-2">
        <h4>ข้าวเหนียว</h4>
      </div>
    </div>
    <div class="col text-center mt-5 mb-5">
      <a href="products.php" class="btn btn-sm mb-3 text-light" style="width:20%;background-color: #a65729;">ดูสินค้าเพิ่มเติม</a>
    </div>

    <?php
    include("footer.php")
    ?>
  </div>
  </div>
</body>

</html>