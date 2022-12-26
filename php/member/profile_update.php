<?php require "../../vendor/autoload.php"  ?>
<?php
use App\Model\customers;
session_start();
if(!$_SESSION['login']){
  header("location: ../auth/login.php");
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
    <!--<link rel="stylesheet" href="../css/components.css">-->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  </head>
<body>
<?php 
	include 'header.php'; 
	include 'script.php';
 ?>
 
    <div class="position-relative">
    <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
    <div class="card mb-3 " style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8 ">
      <div class="card-body">
        <h5 class="card-title">ประวัติส่วนตัว</h5>
        
        <div class="inputBox">

          <label class="form-label" for="form2Example11">Name :</label>
          <input type="text" name="name" value="<?= $_SESSION['name']; ?>" 
          placeholder="update name" required class="box"></br>

          <label class="form-label" for="form2Example11">Email :</label>
          <input type="text" name="name" value="<?= $_SESSION['email']; ?>" 
          placeholder="update name" required class="box"></br>

          <label class="form-label" for="form2Example11">Address :</label>
          <input type="text" name="name" value="<?= $_SESSION['address']; ?>" 
          placeholder="update name" required class="box"></br>

          <label class="form-label" for="form2Example11">Postcode :</label>
          <input type="text" name="name" value="<?= $_SESSION['postcode']; ?>" 
          placeholder="update name" required class="box"></br>

          <label class="form-label" for="form2Example11">Username :</label>
          <input type="text" name="name" value="<?= $_SESSION['username']; ?>" 
          placeholder="update name" required class="box"></br>

          <button type="button" class="btn btn-outline-success">บันทึก</button>
          <button type="button" class="btn btn-outline-danger">ยกเลิก</button>
      </div>

        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
  </div>
</div>
</div>

</body>
</html>