<?php //เรียกไฟล์เชื่อมต่อฐานข้อมูล
use App\Model\news;

require "../../vendor/autoload.php"  ?>
<?php
//ตรวจสอบการเข้าสู่ระบบ
session_start();
$newObj = new news;
$new = $newObj->getNewById($_REQUEST['id']);
if ($_SESSION['login'] == 1) {
  include 'header.php';
} else {
  include '../guest/header.php';
}
include 'script.php';
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
  <div class="contenter mt-5">
    <div class="row mt-5">
      <div class="col mt-5 border">
        <label for="name" class="h1" style="margin-left: 100px;color:#9b631b;"><?php echo $new['topic']; ?></label></br>
        <a href="../member/index.php?login=<?php echo $_SESSION['login'] ?>" title="หน้าแรก" class="text-muted" style="text-decoration: none;margin-left: 100px; ">หน้าแรก > </a>
        <a href="../member/news.php?login=<?php echo $_SESSION['login'] ?>" title="หน้าแรก" class="text-muted" style="text-decoration: none; ">ข่าวสาร</a>

      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-8 border">
        <div class="container d-flex justify-content-center">
          <img src=" ../admin/news/<?php echo $new['image']; ?>" width="80%">
        </div>
        <div class="container">
          <label for="name" class="p mt-3" style="margin-left: 10%;margin-right: 10%;color:#f00;font-size:15px;">วันที่โพส : <?php echo $new['dttm']; ?></label></br>
          <label for="name" class="p text-muted mt-3" style="margin-left: 10%;margin-right: 10%;text-align:justify;"><?php echo $new['detail']; ?></label></br>
        </div>

      </div>
      <div class="col-lg-4 border">
        <label for="name" class="h3" style="color:#9b631b;">ข่าวที่เกี่ยวข้อง</label></br>
        <div class="row" >
          <?php
          //
          //คิวรี่ข้อมูลมาแสดงในตาราง
          $newObj = new news;
          $news = $newObj->getAllNewTOP5();
          foreach ($news as $new) {
          ?>

            <div class="col-sm-12 col-md-12 col-lg-12 pl-5 pr-5">
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
      </div>
    </div>
  </div>


  <!-- <div class="container">
    <div class="container mt-5 pt-4">
      <div class="row mt-3">
        <div class="col pt-3 pb-3 text-center">
          <img src="../admin/news/<?php echo $new['image']; ?>" width="40%">
          <br>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-7 pt-3 pb-3">
          <label for="name" class="h1"><?php echo $new['topic']; ?></label></br>
          <label for="name" class="h5">วันที่โพส : <?php echo $new['dttm']; ?></label></br>
          <label for="name" class="h5"><?php echo $new['detail']; ?></label></br>
        </div>
      </div>
    </div>
  </div> -->
  </div>
  </div>
</body>

</html>