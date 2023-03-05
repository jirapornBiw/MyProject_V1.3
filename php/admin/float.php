<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>แถบเมนูด้านซ้าน</title>
</head>

<body>
    <nav>
        <div class="col text-center">
            <img src="../../../img/Green Black Minimalist Leaf Farm Logo .png" style="width: 100px;" alt="logo">
            <h3>หมู่บ้าน บ้านกอก</h3>
        </div>
        <label for="btn" class="button">
            <!-- <span class="fa fa-caret-down"></span> -->
        </label>
        <input type="checkbox" id="btn" class="checkbox" checked>
        <ul class="menu">
            <!-- <li><a href="#">Home</a></li> -->
            <li>
                <label for="" class="first"><a href='../news/index.php'>
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        จัดการข่าวสาร</a>
                </label>
            </li>
            <li>
                <label for="" class="second"><a href='../product/index.php'>
                        <i class="fa fa-archive" aria-hidden="true"></i>
                        จัดการสินค้า</span></a>
                </label>
            </li>
            <li>
                <label for="btn-2" class="third"><i class="fa fa-list-alt" aria-hidden="true"></i> รายการสั่งซื้อ
                    <span class="fa fa-caret-down"></span>
                </label>
                <input type="checkbox" id="btn-2" class="checkbox" checked>
                <ul>
                    <li><a href="../orders/index.php">รายการทั้งหมด</a></li>
                    <li><a href="../orders/index.php?action=รอการชำระเงิน">รายการใหม่</a></li>
                    <li><a href="../orders/index.php?action=รอการตรวจสอบ">ชำระเงินแล้ว</a></li>
                    <li><a href="../orders/index.php?action=จัดส่งสินค้าสำเร็จ">จัดส่งสินค้า</a></li>
                    <li><a href="../orders/index.php?action=ตรวจสอบไม่ผ่าน">ตรวจสอบไม่ผ่าน</a></li>
                    <li><a href="../orders/index.php?action=รอการตรวจสอบพัสดุเสียหาย">แจ้งพัสดุเสียหาย</a></li>
                </ul>
            </li>
            <li>
                <lavel>
                    <a href="../../member/logout.php"><i class="fa fa-archive" aria-hidden="true"></i> ออกจากระบบ</a>
                </lavel>
            </li>
        </ul>
    </nav>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    </header>
</body>

</html>
<script>
    $('nav .button').click(function() {
        $('nav .button span').toggleClass("rotate");
    });
    $('nav ul li .first').click(function() {
        $('nav ul li .first span').toggleClass("rotate");
    });
    $('nav ul li .second').click(function() {
        $('nav ul li .second span').toggleClass("rotate");
    });
</script>