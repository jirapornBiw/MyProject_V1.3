<?php require "../../vendor/autoload.php"  ?>
<?php
include 'connect.php';

use App\Model\news;

session_start();
// if (!$_SESSION['login']) {
//   header("location: ../../auth/login.php");
//   exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ข่าวสาร</title>
  <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  // include '../guest/header.php';
  if ($_SESSION['login'] == 1) {
    include 'header.php';
  } else {
    include '../guest/header.php';
  }
  include 'script.php';
  ?>
  <div class="contenter mt-5">
    <div class="row mt-5">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5">
        <h1 class="sp-text-title01" style="text-align:center;"><span style="color:#9b631b;">ข่าวสารกิจกรรมที่ผ่านมา</span></h1>
        <!-- <div class="sp-line-footer"></div>
        <h2 class="sp-text-title05" style="margin-bottom:10px; text-align:center;">Past News Event</h2> -->
      </div>
    </div>

  </div>
  <div class="row" style="margin-left: 20%;margin-right: 20%;">
    <?php
    //
    //คิวรี่ข้อมูลมาแสดงในตาราง
    $newObj = new news;
    $news = $newObj->getAllNew();
    foreach ($news as $new) {
    ?>

      <div class="col-sm-12 col-md-12 col-lg-6 pl-5 pr-5">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center">
            <div class="container d-flex justify-content-center m-1" style="width: 200px;height: 150px">
              <img src="../admin/news/<?php echo $new['image']; ?>" width="100%"><br>
            </div>

          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <a href="new_detail.php?id=<?php echo ($new['new_id']); ?>" style="color: #9c631c;font-size:20px;text-decoration: none"><?php echo $new['topic']; ?></a><br>
            <!--<span class="d-inline-block text-truncate" style="max-width: 200px;">-->
            <span style="color:#f00;  font-size:15px;">วันที่โพส : <?php echo ($new['dttm']); ?><br></span>
            <p class="text-muted"><?php echo mb_strimwidth($new['detail'], 0, 50, "..."); ?><br></p>


            <!-- <a href='new_detail.php?id=<?php echo ($new['new_id']); ?>' style='width:75%' class='btn btn-success btn-sm'>รายละเอียด</a> -->


          </div>
        </div>
        <hr>
      </div> <!-- //col -->

    <?php } ?>
  </div>


  <br><br>
  </div>
  </div>
  </div>
</body>

</html>