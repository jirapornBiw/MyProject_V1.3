<!-- หน้าหลัก -->
<!--<?php require "vendor/autoload.php";?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- เชื่อมต่อ Bootstrap ตามที่อยู่ -->
    <link rel="stylesheet" href=" node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <!-- เชื่อมต่อ css ตามตามที่อยู่ -->
    <link rel="stylesheet" type="text/css" href="StyleMember.css">

  </head>
<body>
  <!--  -->
  <!-- แถบเมนูบาร์ด้านบน -->
  
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #116530">
    <div class="container-fluid">
      <!-- logo -->
      <img src="img/Green Black Minimalist Leaf Farm Logo .png" style="width:3%">
      <a class="navbar-brand text-light" href="#">ข้าวหอมใหม่</a>
      <!-- เมื่อมีการย่อขนาดหน้าจอลดลง จะมีปุ่มกดแสดงให้เห็น -->
      <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!-- ไอคอน 3 ขีด -->
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#">
            <i class="fa fa-home text-light" aria-hidden="true"></i>
            หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="php/products.php">
            <i class="fa fa-home text-light" aria-hidden="true"></i>
            สินค้า</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="auth/login.php">
            <i class="fa fa-sign-in text-light" aria-hidden="true"></i>
              เข้าสู่ระบบ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light " aria-current="page" href="auth/register.php">
            <i class="fa fa-user-plus text-light" aria-hidden="true"></i>
            สมัครสมาชิก</a>
          </li>
          <!-- เมนูที่ไม่สามารถกดได้ -->
          <li class="nav-item">
            
            <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">
            <i class="fa fa-phone-square text-light" aria-hidden="true"></i>
            โทร 095-395-4854</a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">
            <i class="fa fa-clock-o" aria-hidden="true"></i>  
            เวลาทำการ จันทร์-ศุกร์ 09:00-15:00</a>
            
          </li>
        </ul>

        <!-- ช่องสำหรับค้นหา -->
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-warning text-light" type="submit">Search</button>
        </form>

        </div>
      </div>
    </nav><!-- สิ้นสุดแถบค้นหา -->

    <?php include 'info.php'?><!-- หน้าแรก -->

      <!-- เชื่อมต่อjs ตามที่อยู่ -->
      <script src="node_modules/jquery/dist/jquery.min.js"></script>
      <script src="node_modules/popper.js/dist/popper.min.js"></script>
      <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  </body>
</html>