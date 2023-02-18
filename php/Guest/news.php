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
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  </head>
<body>
<?php 
	include 'header.php'; 
 ?>
    <div class="container">
        <div class="row">
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
        foreach($news as $new) {
        ?>
           <div class="col-sm-3">
            <div class="text-center shadow p-3 mb-5 bg-body rounded"style="margin: 10px;">
              <img src="../admin/news/<?php echo $new['image'];?>" width="200px" height="200"><br>
              <h5><?php echo $new['topic'];?> <br><h5>
              <!--<span class="d-inline-block text-truncate" style="max-width: 200px;">-->
              
              </span><br>
              วันที่โพส : <?php echo ($new['dttm']);?><br>
            <div class="text-center">
            <a href='new_detail.php?id=<?php echo ($new['new_id']);?>' style='width:75%' class='btn btn-success btn-sm'>รายละเอียด</a>
            </div>
          </div> <!-- //col -->
          </div>
        <?php } ?>
      
          <br><br>
        </div>
        </div>
      </div>
    </div>
</body>
</html>