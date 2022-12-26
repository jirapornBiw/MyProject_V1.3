<?php require "../../vendor/autoload.php"  ?>
<?php


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
    <title>รายการสินค้า</title>
    <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  </head>
<body>
  <?php include 'header.php'; ?>
  <?php include 'product.php'; ?>
      <div class="container">
      <div class="row">
       
        </div> <!-- close row-->
    </div>    <!-- close container-->



    <!-- start show product -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <h1> ส่วนแสดงสินค้า </h1>
        </div>
      </div>
    </div>
    <!-- end show product -->


    <!-- start footer-->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <hr/>
          <p align="center"> ร้านค้าออนไลน์ devbanban.com @ 2016 </p>
        </div>
      </div>
    </div>
  
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
  </body>
</body>
</html>