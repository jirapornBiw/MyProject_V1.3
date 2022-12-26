<?php require "../../vendor/autoload.php"  ?>
<?php
use App\Model\customers;
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
    <title>Document</title>
    <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    
  </head>
<body style="background-color: #ebeff4;">
  <?php include 'floatIndex.php'; ?>
  <?php include 'dashboard.php'; ?>


  
</body>
</html>