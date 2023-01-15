<?php require "../../vendor/autoload.php"  ?>
<?php
use App\Model\customer; 
?>
    <!DOCTYPE html>

    <header class="header">

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
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
            <a class="nav-link active text-light" aria-current="page" href="products.php?id=<?php
                        echo"{$_SESSION['c_id']}";
                    ?>">
            <i class="fa fa-home text-light" aria-hidden="true"></i>
                สินค้า</a>
            </li>

            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="news.php">
            <i class="fa fa-newspaper-o text-light" aria-hidden="true"></i>
                ข่าวสาร</a>
            </li>

            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="cart.php?id=<?php
                        echo"{$_SESSION['c_id']}&action=show";
                    ?>">
            <i class="fa fa-shopping-cart text-light" aria-hidden="true"></i>
            ตระกร้าสินค้า</a>
            </li>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user-circle-o text-light" aria-hidden="true"></i>
            <?php echo $_SESSION['c_name']; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"><!--ส่งค่า id และ actionไป-->
                <li><a class="dropdown-item" href="profile.php?id=<?php
                echo"{$_SESSION['c_id']}&action=show";
                    ?>">
                <i class="fa fa-address-card-o" aria-hidden="true"></i>
                ข้อมูลส่วนตัว
            </a></li>
                <li><a class="dropdown-item" href="orders.php">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                การสั่งซื้อ</a></li>

                <li><a class="dropdown-item" href="tracking.php?id=<?php
                echo"{$_SESSION['c_id']}";
                    ?>">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                ประวัติการสั่งซื้อ</a></li>

                <li><a class="dropdown-item" href="claim.php?id=<?php
                echo"{$_SESSION['c_id']}";
                    ?>">
                <i class="fa fa-truck" aria-hidden="true"></i>
                แจ้งพัสดุเสียหาย</a></li>
                
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../index.php">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                ออกจากระบบ</a></li>
            
            </ul>
            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="../../index.php">
            <i class="fa fa-sign-out text-light" aria-hidden="true"></i>
            ออกจากระบบ</a>
            </li>
        </ul>   
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

    
</body>
</html>