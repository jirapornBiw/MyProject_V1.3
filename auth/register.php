<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="css/register.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="font-mali justify-content-center align-items-center">
<?php
    include '../src/Database/db_provinces.php';
    $sql_provinces = "SELECT * FROM provinces";
    $query = mysqli_query($conn, $sql_provinces);
?>
<section class="vh-auto bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-auto gradient-custom-3">
    <div class="container h-100 mt-5 mb-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">สมัครสมาชิก</h2>
              <form action="saveRegister.php" class="mb-3" method="POST">
       
          <label class="form-label" for="form3Example1cg">ชื่อ</label>
                <div class="form-outline mb-4">
                  <input type="text" name="first_name" id="first_name" class="form-control form-control-mg" />
                </div>

                <label class="form-label" for="form3Example1cg">นามสกุล</label>
                <div class="form-outline mb-4">
                  <input type="text" name="last_name" id="last_name" class="form-control form-control-mg" />
                </div>

				<label class="form-label" for="form3Example3cg">อีเมล</label>
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-mg" />
                </div>

				<label class="form-label" for="form3Example1cg">ที่อยู่</label>
                <div class="form-outline mb-4">
                  <input type="text" name="address" id="address" class="form-control form-control-md" />
                </div>

      <label for="provinces">จังหวัด:</label>
      <select class="form-control" name="provinces" id="provinces">
            <option value="<?=$value['name_th']?>" selected disabled>-กรุณาเลือกจังหวัด-</option>
             <?php foreach ($query as $value) { ?>
            <option value="<?=$value['id']?>"><?=$value['name_th']?></option>
            <?php } ?>
      </select>
      <br>
 
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
        <!--<a href="https://devtai.com/?cat=38"> <button type="button" class="btn btn-primary btn-mg btn-block">Block level button</button></a>-->

        <label class="form-label" for="form3Example1cg">เบอร์โทรศัพท์</label>
                <div class="form-outline mb-4">
                  <input type="text" name="phone" id="phone" class="form-control form-control-mg" />
                </div>   

				<label class="form-label" for="form3Example1cg">ชื่อผู้ใช้</label>
                <div class="form-outline mb-4">
                  <input type="text" name="username" id="username" class="form-control form-control-mg" />
                </div>

				<label class="form-label" for="form3Example4cg">รหัสผ่าน</label>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="password" class="form-control form-control-mg" />
                </div>

                

                <div class="d-flex justify-content-center">
                  <button type="submid"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">สมัครสมาชิก</button>
                </div>

				

                <p class="text-center text-muted mt-5 mb-0">หากมีบัญชีผู้ใช้อยู่แล้ว?<a href="login.php"
                    class="fw-bold text-body"><u> เข้าสู่ระบบ</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



	<!--<div class="card mb-3">
		<div class="card-header bg-primary text-white">
			<h4>สมัครใช้งาน</h4>
		</div>
		<div class="card-body">
			<form action="saveRegister.php" class="mb-3" method="POST">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="adress">Adress</label>
					<input type="text" name="adress" id="adress" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="postcode">Postcode</label>
					<input type="text" name="postcode" id="postcode" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div></br>
				<button type="submit" class="btn btn-primary">Register</button>
			</form>
			<a href="login.php">เข้าสู่ระบบ</a>
		</div>
	</div>-->
  <?php include('script.php');?>
</body>
</html>