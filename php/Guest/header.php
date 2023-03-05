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
        <title>header</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            li a:hover {
                background-color: #d7bc9f;
                color: white;
            }

            .container-navbar {
                position: fixed;
                top: 0;
                width: 100%;
            }
        </style>
    </head>

    <body>
        <div class="container mb-4">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light d-flex bd-highlight mb-3" style="background-color: #9b631b;">
                <div class="container-fluid ">
                    <!-- logo -->
                    <div class="div-img ml-5">
                        <img src="../../img/Green Black Minimalist Leaf Farm Logo .png" style="margin-right:10px;margin-left:40px;position:relative;" width="50px">
                    </div>
                    <a class="navbar-brand text-light me-auto p-2 bd-highlight" href="#">ข้าวหอมใหม่</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="container-navbar-menu">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto py-4 py-md-0 ">

                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="index.php?login=0">
                                    <i class="fa fa-home text-light" aria-hidden="true"></i>
                                    หน้าแรก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="products.php?login=0" ;>
                                    <i class="fa fa-home text-light" aria-hidden="true"></i>
                                    สินค้า</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="news.php?login=0">
                                    <i class="fa fa-newspaper-o text-light" aria-hidden="true"></i>
                                    ข่าวสาร</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="../../auth/login.php">
                                    <i class="fa fa-sign-in text-light" aria-hidden="true"></i>
                                    เข้าสู่ระบบ</a>
                            </li>

                            <li class="nav-item">
                                <!-- Button trigger modal -->
                                <a class="nav-link active text-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fa fa-user-circle text-light" aria-hidden="true"></i>
                                    สมัครสมาชิก</a>
                                </a>
                            </li>


                        </ul>

                    </div>
                    </div>
                </div>
            </nav>
        </div>

        <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../../node_modules/popper.js/dist/popper.min.js"></script>
        <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</header>


<?php 
// <!-- Large modal เรียกใช้modal สมัครสมาชิก-->
include '../../auth/register.php';
// <!-- เรียกใช้ฟังก์ชันค้นหาจังหวัด อำเภอ ตำบล-->
include('script.php');
?>

</body>

</html>