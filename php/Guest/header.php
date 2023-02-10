<?php 
require "../../vendor/autoload.php";
include '../../src/Database/connect.php';
    $sql_provinces = "SELECT * FROM provinces";
    $query = mysqli_query($conn, $sql_provinces);
?>
    <!DOCTYPE html>
    <header class="header">
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container mb-5">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #116530;">
        <div class="container-fluid ">
        <!-- logo -->
        <img src="../../img/Green Black Minimalist Leaf Farm Logo .png" style="width:3%">
        <a class="navbar-brand text-light" href="#">ข้าวหอมใหม่</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="index.php">
            <i class="fa fa-home text-light" aria-hidden="true"></i>
                หน้าแรก</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="products.php"; >
            <i class="fa fa-home text-light" aria-hidden="true"></i>
                สินค้า</a>
            </li>

            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="news.php">
            <i class="fa fa-newspaper-o text-light" aria-hidden="true"></i>
                ข่าวสาร</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="../../auth/login.php">
            <i class="fa fa-sign-in text-light" aria-hidden="true"></i>
            เข้าสู่ระบบ</a>
            </li>

         <!--<li class="nav-item">
            <a class="nav-link active text-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
            <i class="fa fa-sign-in text-light" aria-hidden="true"></i>
                เข้าสู่ระบบ</a>
            </a>
          </li>-->

          <li class="nav-item">
            <!-- Button trigger modal -->
            <a class="nav-link active text-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa fa-user-circle text-light" aria-hidden="true"></i>
                สมัครสมาชิก</a>
            </a>
          </li>

          
        </ul>  

        <!-- ช่องค้นหา-->
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    </div>
    </nav>
        </div>

        <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../../node_modules/popper.js/dist/popper.min.js"></script>
        <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

        </header>

        <!-- popup -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-10" id="staticBackdropLabel">สมัครสมาชิก</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <!-- from -->    
                    <form class="mb-3" method="POST" 
                    name=form_register onSubmit="JavaScript:return fncSubmit();">
       
                        <label class="form-label" for="form3Example1cg">ชื่อ</label>
                                <div class="form-outline mb-4">
                                <input type="text" name="first_name" id="first_name" class="form-control form-control-mg" required>
                                </div>

                                <label class="form-label" for="form3Example1cg">นามสกุล</label>
                                <div class="form-outline mb-4">
                                <input type="text" name="last_name" id="last_name" class="form-control form-control-mg" required>
                                </div>

                                <label class="form-label" for="form3Example3cg">อีเมล</label>
                                <div class="form-outline mb-4">
                                <input type="email" name="email" id="email" class="form-control form-control-mg" required>
                                </div>

                                <label class="form-label" for="form3Example1cg">ที่อยู่</label>
                                <div class="form-outline mb-4">
                                <input type="text" name="address" id="address" class="form-control form-control-md" required>
                                </div>

                        <label for="provinces">จังหวัด:</label>
                        <select class="form-control" name="provinces" id="provinces">
                                <option value="<?=$value['name_th']?>" selected disabled required>-กรุณาเลือกจังหวัด-</option>
                                <?php foreach ($query as $value) { ?>
                                <option value="<?=$value['id']?>"><?=$value['name_th']?></option>
                                <?php } ?>
                        </select>
                        <br>
                    
                        <label for="amphures">อำเภอ:</label>
                        <select class="form-control" name="amphures" id="amphures" required>
                        </select>
                        <br>
                    
                        <label for="districts">ตำบล:</label>
                        <select class="form-control" name="districts" id="districts" required>
                        </select>
                        <br>
                
                        <label for="zip_code">รหัสไปรษณีย์:</label>
                        <input type="text" name="zip_code" id="zip_code" class="form-control" required>
                            <br>
                            <!--<a href="https://devtai.com/?cat=38"> <button type="button" class="btn btn-primary btn-mg btn-block">Block level button</button></a>-->

                        <label class="form-label" for="form3Example1cg">เบอร์โทรศัพท์</label>
                                <div class="form-outline mb-4">
                                <input type="text" name="phone" id="phone" class="form-control form-control-mg" required>
                                </div>   

                                <label class="form-label" for="form3Example1cg">ชื่อผู้ใช้</label>
                                <div class="form-outline mb-4">
                                <input type="text" name="username" id="username" class="form-control form-control-mg" required>
                                </div>

                                <label class="form-label" for="form3Example4cg">รหัสผ่าน</label>
                                <div class="form-outline mb-4">
                                <input type="password" name="password" id="password" class="form-control form-control-mg" required>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">หากมีบัญชีผู้ใช้อยู่แล้ว?<a href="login.php"
                                    class="fw-bold text-body"><u> เข้าสู่ระบบ</u></a></p>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
                                </div>
                                </form>
                </div>
            </div>
            </div>


<!-- Button trigger modal 
              //popup 
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-10" id="staticBackdropLabel">เข้าสู่ระบบ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                // from  
                <form action="../../auth/checkLogin.php" class="mb-3" method="POST" 
                name="form_login"onSubmit="JavaScript:return fncSubmit1();">
                <div class="text-center">
                  <img src="../../img/Green Black Minimalist Leaf Farm Logo .png"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-1 pb-1">ยินดีต้อนรับเข้าสู่ หมู่บ้านบ้านกอก</h4>
                </div>
            // from 
            <?php
                  if(isset($_GET['msg'])) {
                    echo "<h5 class='my-3 text-danger'>Password ไม่ถูกต้อง กรุณาลองอีกครั้ง</h5>";
               }
                ?>
                  <p>กรุณาเข้าสู่ระบบ</p>
                  <label class="form-label" for="email">อีเมล</label>
                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control"
                      placeholder="Email address" required/>
                    
                  </div>

                  <label class="form-label" for="form2Example22">รหัสผ่าน</label>
                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" name="password" class="form-control" 
                    placeholder="Password" required/>
                  </div>

                  <div class="text-center pt-1 mb-1 pb-1">
                    <button class="btn btn-primary btn-block gradient-custom-2 mb-3" 
                    type="submid">
						เข้าสู่ระบบ</button>
                    // Forgot password
						<a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">ไม่มีบัญชีผู้ใช้?</p>
                    <button type="button" class="btn btn-outline-danger" ><a href ="register.php" 
					style="color:red" > สมัครสมาชิก</a></button>
					style="text-decoration:none"
                  </div>
                  
                </form>

                </div>
                </div>
            </div>
        </div>
    -->


        
<?php
    include('script.php');
?>

</body>

</html>