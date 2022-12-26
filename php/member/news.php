<?php require "../../vendor/autoload.php"  ?>
<?php
include 'connect.php';  
use App\Model\news;
session_start();
if(!$_SESSION['login']){
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
    <title>ข่าวสาร</title>
    <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  </head>
<body>
<?php 
	include 'header.php'; 
	include 'script.php';
 ?>
 <div class="row">
        <div class="col-sm-12 mt-5">
          <div class="alert alert-primary" role="alert">
           ข่าวสาร
          </div>
        </div>
        
        <?php
        //
        //คิวรี่ข้อมูลมาแสดงในตาราง
        $newObj = new news;
        $news = $newObj->getAllNew();
        foreach($news as $new) {
        ?>
           <div class="col-sm-4" style="margin-bottom:50px;">
            <img src="../admin/news/<?php echo $new['image'];?>" width="75%"><br>
            <?php echo $new['topic'];?> <br>
            <?php echo ($new['detail']);?><br>
            <?php echo ($new['dttm']);?><br>
          </div> <!-- //col -->

        <?php } ?>
          <br><br>
          <!--<center>Basic PHP PDO แสดงสินค้าหน้าแรก by devbanban.com 2021
            <br>
          </center>-->
          
        </div>
      </div>
    </div>
</body>
</html>