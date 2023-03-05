<?php //เรียกไฟล์เชื่อมต่อฐานข้อมูล

use App\Model\product;

require "../../vendor/autoload.php";
session_start();
// if (!$_SESSION['login']) {
//   header("location: ../../auth/login.php");
//   exit;
// }

//connect db
//if(isset($_REQUEST['action'])=='detail'){
$productObj = new product;
$product = $productObj->getProductsById($_REQUEST['id']);


//}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แสดงรายละเอียดสินค้า</title>
  <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>


  <div class="row mb-5">
    <div class="col">
      <?php
      if ($_SESSION['login'] == 1) {
        include 'header.php';
      } else {
        include '../guest/header.php';
      }
      include 'script.php';


      ?>
    </div>
  </div>
  <div class="row">
    <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "></article>
    <div class="text-align:left; margin-bottom:10px;"></div>
    <div class="spt-text-body01" style="margin-left: 50px;">
      <h1 class="sp-text-title03 ">
        <span style="color:#9b631b;"><?php echo  $product['name']; ?></span>
      </h1>
      <a href="../member/index.php?login=<?php echo $_SESSION['login'] ?>" title="หน้าแรก" class="text-muted" style="text-decoration: none; ">หน้าแรก > </a>
      <a href="../member/products.php?login=<?php echo $_SESSION['login'] ?>" title="สินค้า" class="text-muted" style="text-decoration: none; ">สินค้า</a>

    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 border">
      <div class="container d-flex justify-content-end">
        <img src="../admin/product/<?php echo $product['image']; ?>" width="100%">
      </div>

    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 border">
      <div class="container d-flex justify-content-start mt-5">
        <table border="0" class="table table-striped" id="product" style="border:1px #eee solid;">
          <tbody class="sp-text-body01">
            <tr>
              <td align="right"><strong style="color:#333;">ชื่อสินค้า </strong></td>
              <td align="center" valign="middle"><strong>:</strong></td>
              <td align="left" valign="middle" style="padding-left:10px; color:#9b631b;">
                <strong><?php echo  $product['name']; ?></strong>
              </td>
            </tr>

            <tr>
              <td align="right"><strong style="color:#333;">ประเภทสินค้า</strong></td>
              <td align="center" valign="middle"><strong>:</strong></td>
              <td align="left" valign="middle" style="padding-left:10px; color:#9b631b;">
                <strong><?php echo $product['type'] ?></strong>
              </td>
            </tr>

            <tr>
              <td width="25%" align="right"><strong style="color:#333;">ราคา</strong></td>
              <td width="1%" align="center" valign="middle"><strong>:</strong></td>
              <td width="74%" align="left" valign="middle" style="padding-left:10px;">
                <h3 class="sp-text-body01" style="color:#F00; font-size:20px;"><strong>฿ <?php echo number_format((float)$product['price'], 2, '.', ''); ?></strong></h3>
              </td>
            </tr>

            <tr>
              <td width="25%" align="right"><strong style="color:#333;">น้ำหนัก</strong></td>
              <td width="1%" align="center" valign="middle"><strong>:</strong></td>
              <td width="74%" align="left" valign="middle" style="padding-left:10px;">
                <h3 class="sp-text-body01" style="color:#9b631b; font-size:20px;"><strong><?php echo $product['weight'] ?></strong></h3>
              </td>
            </tr>

            <tr>
              <td align="right"><strong style="color:#333;">จำนวนสินค้าคงเหลือ</strong></td>
              <td align="center" valign="middle"><strong>:</strong></td>
              <td align="left" valign="middle" style="padding-left:10px; color:#9b631b;">
                <strong><?php echo $product['stock'] ?> ชิ้น</strong>
              </td>
            </tr>

            <tr>
              <td align="right"><strong style="color:#333;">รายละเอียด</strong></td>
              <td align="center" valign="middle"><strong>:</strong></td>
              <td align="left" valign="middle" style="padding-left:10px;">
                <strong><?php echo $product['Products_Detail'] ?></strong>
              </td>
            </tr>
            <?php
            if ($_SESSION['login'] == 0) {
              $form = "../../auth/login.php?action=relogin";
              $action = 'relogin';
              $name = 'relogin';
            } else if ($_SESSION['login'] == 1) {
              echo $_SESSION['login'];
              $form = "cart.php";
              $action = 'add';
              $name = 'action';
            }
            ?>
            <tr>
              <td width="25%" align="right"><strong style="color:#333;">จำนวน</strong></td>
              <td width="1%" align="center" valign="middle"><strong>:</strong></td>
              <td width="74%" align="left" valign="middle" style="padding-left:10px;">
                <form action="<?php echo $form ?>" method="GET">
                  <input type="number" name="qty" value="1" min="1" max="<?php echo $product['stock'] ?>">
                  <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                  <input type="hidden" name="<?php echo $name ?>" value="<?php echo $action ?>">
                  <button class="btn text-light" type="submid" style="background-color: #9b631b;">เพิ่มลงในตะกร้า</button>
                </form>
              </td>
            </tr>

          </tbody>
        </table>

      </div>
      <div class="container m-2">
        <h4 class="sp-text-title10" style="color:#9b631b;">รายละเอียดสินค้า</h4>
        <table border="0" class="table" id="product" style="border:1px #FFFFFF;">
          <tbody class="sp-text-body01">
            <tr>
              <td align="left"><label style="color:#333;"><?php echo $product['Products_Detail'] ?></label></td>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>




</body>
</body>

</html>