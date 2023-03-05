<?php //เรียกไฟล์เชื่อมต่อฐานข้อมูล
use App\Model\product;

require "../../vendor/autoload.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>สินค้าทั้งหมด</title>
  <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <style>
    .container-rightmenu ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 200px;
      background-color: #9b631c;
    }

    .container-rightmenu li a {
      display: block;
      color: #000;
      padding: 8px 16px;
      text-decoration: none;
      color: white;
    }

    .container-rightmenu li a.active {
      background-color: #4a2a00;
      color: white;
    }

    .container-rightmenu li a:hover:not(.active) {
      background-color: #4a2a00;
      color: white;
    }
    h1{
      color: #9d651e;
    }
  </style>
</head>

<body>

  <div class="row">
    <?php include 'header.php'; //เชื่อมต่อส่วนเมนูheaderด้านบน
    ?>
  </div>
  <div class="row mt-5">
    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 ">
      <div class="container-rightmenu mx-auto p-4" >
        <ul>
          <li><a class="active" href="products.php?">รายการสินค้า</a></li>
          <li><a href="products.php?action=ข้าวหอมมะลิ">ข้าวหอมมะลิ</a></li>
          <li><a href="products.php?action=ข้าวเหนียว">ข้าวเหนียว</a></li>
          <li><a href="products.php?action=ข้าวเสาไห้">ข้าวเสาไห้</a></li>
          <li><a href="products.php?action=ข้าวขาว">ข้าวขาว</a></li>
          <li><a href="products.php?action=ข้าวไรซ์เบอร์รี่">ข้าวไรซ์เบอร์รี่</a></li>
          <li><a href="products.php?action=ข้าว4สี">ข้าว4สี</a></li>
          <li><a href="products.php?action=ของชำร่วย">ของชำร่วย</a></li>
        </ul>
      </div>
<?php
echo '<pre>';
print_r($_REQUEST);
echo '<pre>';
?>
    </div>
    <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12" style="background-color: #f5f5f5;">
      <div class="row">
        <div class="col-sm-12 mt-5 mb-4">
          <div class="d-flex justify-content-center">
            <h1>รายการสินค้า</h1>
          </div>
        </div>
        <?php
        //***คิวรี่ข้อมูลมาแสดง***
        $productObj = new product;
        if (!empty($_REQUEST['action'])){
        $action = $_REQUEST['action'];
        $products = $productObj->getAllProductJS($action);
        }
        else {
          $products = $productObj->getAllProduct();
        }
        foreach ($products as $product) {
        ?>
          <div class="col-sm-12 col-md-6 col-lg-4 ml-5 d-flex justify-content-center"> <!--***แสดงข้อมูลแบบ 3 3 3 3***-->
            <div class="text-center shadow mb-5 bg-body rounded" style="margin: 10px;width:270px;background-color: #f5f5f5;">
              <img class="mt-3 mb-3" src="../admin/product/<?php echo $product['image']; ?>" width="200px"><br>
              <div class="sp-description" style="background-color: #efe5db;">
              <h5><?php echo $product['name']; ?><br></h5>
              ราคา <?php echo number_format($product['price'], 2); ?> บาท<br>
              พร้อมจัดส่ง <?php echo $product['stock']; ?> ชิ้น <br>
              <?php if ($product['stock'] > 0) {

                echo "<a href='product_detail.php?id={$product['id']}&action=detail' style='width:75%;background-color: #9c631c;' class='btn btn-sm mb-3 text-light'>รายละเอียด</a>";
              } else {
                echo '<a href="#" style="width:75%" class="btn btn-danger btn-sm disabled mb-3" > สินค้าหมด !!</a>';
              }
              ?>
              </div>

              
            </div>

          </div> <!-- //col -->

        <?php } ?>
        <br><br>
      </div>
    </div>
  </div>
</body>
</body>

</html>