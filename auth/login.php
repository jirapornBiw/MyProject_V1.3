<?php
if (isset($_REQUEST['relogin'])) {
  echo '<script type ="text/JavaScript">';
  echo 'alert("กรุณาเข้าสู่ระบบก่อนสั่งซื้อสินค้า")';
  echo '</script>';
} else {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    a:hover {
      color: #FFFFFF !important;
    }
  </style>
  <title>Login</title>
  <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="/css/login.css">
</head>
<body class="font-mali d-flex justify-content-center align-items-center fullscreen-block" style="background-image: url('image/nature-3450440_960_720.jpg');
  background-size:cover;
  background-repeat:no-repeat;
  background-position:center center;">
 <!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start mt-5 border" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="image/logo.png" style="width: 20%;" alt="logo">

          <h1 class="my-5 display-3 fw-bold ls-tight">
          หมู่บ้าน บ้านกอก <br />
            <span class="text-primary">bankhaohomrice</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
          ดำเนินธุรกิจด้านการผลิตสินค้าข้าวสารบรรจุถุง ภายใต้แบรนด์ บ้านข้าวหอม 
          เพื่อตอบสนองความต้องการที่หลากหลายของผู้บริโภค          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 ">
          <div class="card">
            <div class="card-body py-5 px-md-5 border">
              <div class="container">
                <h1 class="mb-5">เข้าสู่ระบบ</h1>
              </div>
              <form action="checkLogin.php" class="mb-3" method="POST">
                  <label class="form-label" for="form2Example11">อีเมล</label>
                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example11" name="email" class="form-control"
                      placeholder="Email address" />
                    
                  </div>

                  <label class="form-label" for="form2Example22">รหัสผ่าน</label>
                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" name="password" class="form-control" 
                    placeholder="Password"/>
                  </div>

                  <div class="text-center pt-1 mb-1 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submid">
						เข้าสู่ระบบ</button>
                    <!-- Forgot password
						<a class="text-muted" href="#!">Forgot password?</a>-->
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">ไม่มีบัญชีผู้ใช้?</p>
                    <button type="button" class="btn btn-outline-danger" ><a href ="register.php" 
					style="color:red" > สมัครสมาชิก</a></button>
					<!--style="text-decoration:none"-->
                  </div>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->










  <!--<div class="card mb-3">

		<div class="card-header bg-primary text-white">
			<h4>เข้าสู่ระบบ</h4>
		</div>
		<div class="card-body">
			<form action="checkLogin.php" class="mb-3" method="POST">
				<!-- 
					
				$a = $_POST['a'];
				isset( $_POST['a'] ) ?  $_POST['a'] :  = "";
				if(isset( $_GET['msg'] ) )
				 
				<?php
        if (isset($_GET['msg'])) {
          echo "<h5 class='my-3 text-danger'>Password ไม่ถูกต้อง กรุณาลองอีกครั้ง</h5>";
        }
        ?>
				<div class="form-group">
					<label for="username">Email</label>
					<input type="email" name="email" id="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
			<a href="register.php">สมัครใช้งานใหม่</a>
		</div>
	</div>-->
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    alert("<?php echo $msg; ?>");
    //window.location ='products.php';
  </script>
</body>

</html>