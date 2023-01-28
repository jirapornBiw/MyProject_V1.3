
<?php //เรียกไฟล์เชื่อมต่อฐานข้อมูล

use App\Model\product;
use App\Model\customer;
use App\Model\type;

require "../../vendor/autoload.php";

session_start();
if(!$_SESSION['login']){
  header("location: ../../auth/login.php");
  exit;
}

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
<?php 
	include 'header.php';
 ?>

<div class="container mt-5 pt-4"> 
  <div class="row mt-3">
    <div class="col pt-3 pb-3 text-center">
            <img src="../admin/product/<?php echo $product['image'];?>"
             width="40%">
             <br>
    </div>
  </div>
    <div class="row mt-3">
    <div class="col-7 pt-3 pb-3">
            <label for="name" class="h1"><?php echo $product['type'] . $product['name'];?></label></br>
            <!--<h5>ข้อมูลจำเพราะของสินค้า</h5>-->
            <h3 class="text-danger">฿<?php echo $product['price']?></h3>
            
            
            <p style="color:darkgrey;"><i class="fa fa-archive" aria-hidden="true"></i>  จำนวน / พร้อมจัดส่ง
            <?php echo $product['stock']?>  ชิ้น</p>
            <h4>รายละเอียด</h4>
            <p>ประเภทข้าว : <?php echo $product['type']?></p>
            <p>ชื่อสายพันธุ์ข้าว   : <?php echo $product['name']?></p>
            <p>น้ำหนัก : <?php echo $product['weight']?></p>
            <form action="../../auth/login.php" method="get">
            <input type="number" name="qty" value="1" min="1" max="<?php echo $product['stock']?>">
            <input type="hidden" name="action" value="relogin">
            <!--<a href="cart.php?id=<?php echo $product['id']?>&action=add" class='mr-2 btn btn-info'>เพิ่มลงในตระกร้าสินค้า</a>-->
            <button class="btn btn-success" type ="submid">เพิ่มลงตะกร้า</button>
            </form>
          </div>
    </div>
</div>
    
DWS
  </body>
</body>
</html>