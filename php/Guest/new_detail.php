<?php //เรียกไฟล์เชื่อมต่อฐานข้อมูล
use App\Model\news;
require "../../vendor/autoload.php"  ?>
<?php
//ตรวจสอบการเข้าสู่ระบบ
session_start();
$newObj = new news;
	$new = $newObj->getNewById($_REQUEST['id']);
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
            <div class="container mt-5 pt-4"> 
              <div class="row mt-3">
                <div class="col pt-3 pb-3 text-center">
                        <img src="../admin/news/<?php echo $new['image'];?>"
                        width="40%">
                        <br>
                </div>
              </div>
            <div class="row mt-3">
                <div class="col-7 pt-3 pb-3">
                        <label for="name" class="h1"><?php echo $new['topic'];?></label></br>
                        <label for="name" class="h5"><?php echo $new['detail'];?></label></br>
                      </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</body>
</html>