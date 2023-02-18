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
  </head>
<body>
<?php include 'header.php'; //เชื่อมต่อส่วนเมนูheaderด้านบน?>
  <div class="row">
          <div class="col-sm-12 mt-5 mb-4">
            <div class="d-flex justify-content-center">
              <h1>รายการสินค้า</h1>
            </div>
          </div>
        <?php
        //***คิวรี่ข้อมูลมาแสดง***
        $productObj = new product;
        $products = $productObj->getAllProduct();
        foreach($products as $product) {
        ?>
           <div class="col-sm-3 ml-5" > <!--***แสดงข้อมูลแบบ 3 3 3 3***-->
            <div class="text-center shadow p-3 mb-5 bg-body rounded"style="margin: 10px;">
              <img class="mt-3 mb-3" src="../admin/product/<?php echo $product['image'];?>" width="200px"><br>
              <h5><?php echo $product['name'];?><br></h5>
              ราคา <?php echo number_format($product['price'],2);?> บาท<br>
              พร้อมจัดส่ง <?php echo $product['stock'];?> ชิ้น <br>
              <?php if($product['stock'] > 0){
                
                echo "<a href='product_detail.php?id={$product['id']}&action=detail' style='width:75%' class='btn btn-success btn-sm mb-3'>รายละเอียด</a>";
              }else{
                echo '<a href="#" style="width:75%" class="btn btn-danger btn-sm disabled mb-3" > สินค้าหมด !!</a>';
              }
              ?>
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