<!DOCTYPE html>

<header class="header">

  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แถบเมนู</title>
    <link rel="stylesheet" href="../../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style-main-admin.css">
    <script src=""></script>
    <style>

    </style>
  </head>

  <body>

    <nav>
      <div class="col text-center">
        <img src="../../../img/Green Black Minimalist Leaf Farm Logo .png" style="width: 100px;" alt="logo">
        <p class="text-light">หมู่บ้าน บ้านกอก</p>
      </div>
      <p class="text-light">ภาพรวมร้าน</p>
      <div class="btn-float mt-3">
        <div class="d-grid gap-3">

           <a href='../index.php' class='btn btn-outline-light'>
          <i class="fa fa-tachometer" aria-hidden="true"></i>  
          Dashboard</a> 

          <a href='../product/index.php' class='btn btn-outline-light'>
            <i class="fa fa-archive" aria-hidden="true"></i>
            ระบบจัดการสินค้า</a>


          <a href='../news/index.php' class='btn btn-outline-light'>
            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            กระดานข่าวสาร</a>

          <a href='../orders/index.php' class='mr-2 btn btn-outline-light'>
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
            รายงานการขาย</a>

          <a href='../claims/index.php' class='mr-2 btn btn-outline-light'>
            <i class="fa fa-refresh" aria-hidden="true"></i>
            รายงานพัสดุเสียหาย</a>
          <a href='../../guest/index.php' class='mr-2 btn btn-outline-light'>
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            ออกจากระบบ</a>
        </div>


      </div>

      </ul>
    </nav>

    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
         $('nav .button').click(function(){
           $('nav .button span').toggleClass("rotate");
         });
           $('nav ul li .first').click(function(){
             $('nav ul li .first span').toggleClass("rotate");
           });
           $('nav ul li .second').click(function(){
             $('nav ul li .second span').toggleClass("rotate");
           });
      </script>
</header>
</body>

</html>