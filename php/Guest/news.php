<?php //เรียกไฟล์เชื่อมต่อฐานข้อมูล
use App\Model\news;

require "../../vendor/autoload.php"  ?>
<?php
//ตรวจสอบการเข้าสู่ระบบ
session_start();
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
  <link rel="stylesheet" href="../member/awesomemember.css">

  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include 'header.php';
  ?>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-sm-12 mt-5">
        <div class="d-flex justify-content-center ">
          <h1>ข่าวสาร</h1>
        </div>
      </div>

      <?php
      //
      //คิวรี่ข้อมูลมาแสดงในตาราง
      $newObj = new news;
      $news = $newObj->getAllNew();
      foreach ($news as $new) {
      ?>
        <div class="col-sm-6 col-md-6 col-lg-3 mb-5 col d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../admin/news/<?php echo $new['image']; ?>" alt="Card image cap" width="200px" height="200">
            <div class="card-body">
              <h5 class="card-title"><?php echo $new['topic']; ?></h5>
              <p class="card-text"><?php echo ($new['dttm']); ?></p>
              <a href="new_detail.php?id=<?php echo ($new['new_id']); ?>" class="btn btn-primary">อ่านเพิ่มเติม</a>
            </div>
          </div>
        </div>

        <!-- //col -->

      <?php } ?>

      <br><br>
    </div>
  </div>
  </div>
  </div>
</body>

</html>