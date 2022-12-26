<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="css/register.css">
</head>
<body class="font-mali justify-content-center align-items-center">

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

			  	<label class="form-label" for="form3Example1cg">ชื่อ-นามสกุล</label>
                <div class="form-outline mb-4">
                  <input type="text" name="name" id="name" class="form-control form-control-lg" />
                </div>

				<label class="form-label" for="form3Example3cg">อีเมล</label>
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" />
                </div>

				<label class="form-label" for="form3Example1cg">ที่อยู่</label>
                <div class="form-outline mb-4">
                  <input type="text" name="address" id="address" class="form-control form-control-lg" />
                </div>

				<label class="form-label" for="form3Example1cg">รหัสไปรษณีย์</label>
                <div class="form-outline mb-4">
                  <input type="text" name="postcode" id="postcode" class="form-control form-control-lg" />
                </div>

        <label class="form-label" for="form3Example1cg">เบอร์โทรศัพท์</label>
                <div class="form-outline mb-4">
                  <input type="text" name="phone" id="phone" class="form-control form-control-lg" />
                </div>   

				<label class="form-label" for="form3Example1cg">ชื่อผู้ใช้</label>
                <div class="form-outline mb-4">
                  <input type="text" name="username" id="username" class="form-control form-control-lg" />
                </div>

				<label class="form-label" for="form3Example4cg">รหัสผ่าน</label>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" />
                </div>

                <!--<div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>-->

                <!--<div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>-->

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
</body>
</html>