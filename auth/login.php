<?php ;

if(isset( $_REQUEST['relogin'] )) {  
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
	<link rel="stylesheet"  href="/css/login.css">
</head>
<body class="font-mali vh-100 d-flex justify-content-center align-items-center">
	
<section class="h-auto gradient-form" <!--style="background-color: #79994a;"-->>
	<form action="checkLogin.php" class="mb-3" method="POST">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-1 mx-md-4">

                <div class="text-center">
                  <img src="../img/Green Black Minimalist Leaf Farm Logo .png"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-1 pb-1">ยินดีต้อนรับเข้าสู่ หมู่บ้านบ้านกอก</h4>
                </div>
                <?php
                  if(isset($_GET['msg'])) {
                    echo "<h5 class='my-3 text-danger'>Password ไม่ถูกต้อง กรุณาลองอีกครั้ง</h5>";
                  }
                ?>
                <form>
                  <p>กรุณาเข้าสู่ระบบ</p>
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
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2" 
            style= "background: conic-gradient(  #67a272 72deg, #88b288 72deg 142deg, #bfd575 72deg 214deg, #d0e7a3 72deg 286deg, #336359 72deg);"
            >
  <!-- style="background-image: url('https://www.img.in.th/images/98f0ad8b7f02863cd6ee6917a6313dfe.jpg');"
"background: conic-gradient(  #ffa69e 72deg, #faf3dd 72deg 142deg, #b8f2e6 72deg 214deg, #aed9e0 72deg 286deg, #5e6472 72deg);"
-->
              <div class="img-login">
              <div class="text-black px-3 py-4 p-md-5 mx-md-4" 
               >
                

                
                <h4 class="mb-4">ASIA INTER RICE CO., LTD</h4>
                <p class="small mb-0">ภายใต้แบรนด์ ..... เพื่อตอบสนองความต้องการที่หลากหลายของผู้บริโภค เรามุ่งมั่นและพัฒนาในการดำเนินการผลิตให้เป็นไปตามระบบคุณภาพ GMP HACCP และ HALAL ซึ่งมีความสำคัญต่อผลิตภัณฑ์ข้าวสารบรรจุถุง เนื่องจากระบบจะให้ความสำคัญต่อการใช้เครื่องจักรอุปกรณ์ที่มีประสิทธิภาพควบคุมทุกขั้นตอนของกระบวนการผลิต
           
			        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</from>
</section>










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
					if(isset($_GET['msg'])) {
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
	alert("<?php echo $msg;?>");
	//window.location ='products.php';
</script>
</body>
</html>