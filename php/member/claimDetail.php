<?php require "../../vendor/autoload.php"  ?>
<?php
include 'connect.php';  
use App\Model\orders;
use App\Model\trackings;
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
    <title>แจ้งพัสดุเสียหาย</title>
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
          แจ้งพัสดุเสียหาย
          </div>
        </div>
        
        <div class="card-body">

        <div class="card-body">
                        <form action="save_claim.php?" method="post"
                        enctype="multipart/form-data">

                        <!--<form action="test_REQUEST.php" method="post"
                        enctype="multipart/form-data">-->

                        
                        
                        </br>
                    <input type="hidden" name="CustomerID" value="<?php echo $_SESSION['c_id']?>">
                    <input type="hidden" name=" OrderId" value="<?php echo $_REQUEST['id']?>">
                    <div class="form-group">
                    <label for="details">รายละเอียดความเสียหาย</label></br>
                    <input type="text" name="details" id="details" class="form-contro" >
                    </div></br>    

                    <div class="form-group">
                        <label for="txt_file">รูปภาพ</label></br>
                        <input type="file" name="txt_file" id="txt_file" class="form-contro">
                    </div></br>
                    <button class="btn btn-success" type ="submid">บันทึก</button>
			        <button class="btn btn-danger" type ="reset">ยกเลิก</button>
        </div>
          
        </div>
      </div>
    </div>
</body>
</html>