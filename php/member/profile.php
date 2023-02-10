<?php require "../../vendor/autoload.php"  ?>
<?php
session_start();
use App\Model\customer;

if(isset($_REQUEST['action'])=='show'){
	$customerObj = new customer;
	$customer = $customerObj->getCustomerById($_SESSION['c_id']);
}

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
    <title>ประวัติส่วนตัว</title>
    <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  </head>
<body>
<?php 
	include 'header.php'; 
	include 'script.php';
 ?>
    <div class="d-flex">
      <div class="container mt-5 mb-5 align-items-cente justify-content-centerr" style="width: 50rem;">
        <h5 class="card-header " >ข้อมูลส่วนตัว</h5>
        <div class="card-body">
        <div class="form-group">
          <label for="name">ชื่อ : <?php echo $customer['first_name'];?></label></br>
          <label for="name">อีเมล์ : <?php echo $customer['email'];?></label></br>
          <label for="name">ที่อยู่ : <?php echo $customer['address'];?></label></br>
          <label for="name">จังหวัด : <?php echo $customer['provinces'];?></label></br>
          <label for="name">อำเภอ : <?php echo $customer['amphures'];?></label></br>
          <label for="name">ตำบล : <?php echo $customer['districts'];?></label></br>
          <label for="name">รหัสไปรษณีย์ : <?php echo $customer['zip_code'];?></label></br>
          <label for="name">เบอร์โทรศัพท์ : <?php echo $customer['phone'];?></label></br>
          <label for="name">ชื่อผู้ใช้ : <?php echo $customer['username'];?></label>
        </div></br>
        <a href="edit_profile.php?id=<?php
                        $customerObj = new customer;
                        $customer = $customerObj->getCustomerById($_REQUEST['id']);
                        echo"{$customer['id']}&action=edit";
                    ?>" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</a>
        </div>
      </div>
    </div>

 
    
					
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>	
</body>
</html>
    
</body>
</html>