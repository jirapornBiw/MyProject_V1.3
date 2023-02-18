<?php require "../../vendor/autoload.php"  ?>
<?php
session_start();

use App\Model\customer;


if (isset($_REQUEST['action']) == 'edit') {
  $customerObj = new customer;
  $customer = $customerObj->getCustomerById($_REQUEST['id']);
}

if (!$_SESSION['login']) {
  header("location: ../../auth/login.php");
  exit;
}
include '../../src/Database/connect.php';
$sql_provinces = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql_provinces);
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php include 'header.php'; ?>
  <?php include 'script.php'; ?>
  <div class="d-flex">
    <div class="container mt-5 mb-5 align-items-cente justify-content-centerr" style="width: 75rem;">
      <h5 class="card-header ">ข้อมูลส่วนตัว</h5>
      <div class="card-body">
        <div class="form-group">

          <form action="save.php" method="get">
            <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
            <div class="form-group">
              <label for="first_name">ชื่อ</label></br>
              <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $customer['first_name']; ?>">
            </div></br>
            <label for="last_name">นามสกุล</label></br>
            <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $customer['last_name']; ?>">
        </div></br>
        <div class="form-group">
          <label for="email">อีเมลล์</label></br>
          <input type="text" name="email" id="email" class="form-control" value="<?php echo $customer['email']; ?>">
        </div></br>
        <div class="form-group">
          <label for="address">ที่อยู่</label></br>
          <input type="text" name="address" id="address" class="form-control" value="<?php echo $customer['address']; ?>">
        </div></br>

        <div class="form-group">
          <label for="provinces">จังหวัด:</label>
          <select class="form-control" name="provinces" id="provinces">
            <option value="<?= $value['name_th'] ?>" selected disabled>-กรุณาเลือกจังหวัด-</option>
            <?php foreach ($query as $value) { ?>
              <option value="<?= $value['id'] ?>"><?= $value['name_th'] ?></option>
            <?php } ?>
          </select></br>
        </div>

        <label for="amphures">อำเภอ:</label>
        <select class="form-control" name="amphures" id="amphures">
        </select>
        <br>

        <label for="districts">ตำบล:</label>
        <select class="form-control" name="districts" id="districts">
        </select>
        <br>

        <label for="zip_code">รหัสไปรษณีย์:</label>
        <input type="text" name="zip_code" id="zip_code" class="form-control">
        <br>

        <!--<div class="form-group">
                          <label for="postcode">รหัสไปรษณีย์</label></br>
                          <input type="text" name="postcode" id="postcode" class="form-control" 
                          value="<?php echo $customer['zip_code']; ?>">
                      </div></br>-->
        <div class="form-group">
          <label for="phone">เบอร์โทรศัพท์</label></br>
          <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $customer['phone']; ?>">
        </div></br>
        <div class="form-group">
          <label for="username">ชื่อผู้ใช้</label></br>
          <input type="text" name="username" id="username" class="form-control" value="<?php echo $customer['username']; ?>">
        </div></br>
        <button class="btn btn-success" type="submid">บันทึก</button>
        <button class="btn btn-danger" type="reset">ยกเลิก</button>
        </form>
      </div></br>
    </div>
  </div>
  </div>

</body>

</html>


<?php include('script.php'); ?>
</body>

</html>