
<?php //เรียกไฟล์เชื่อมต่อฐานข้อมูล

use App\Model\product;
use App\Model\type;
use App\Model\customer;
use App\Database\Db;
require "../../vendor/autoload.php";
include 'connect.php';  ?>


<?php

session_start();
//echo '<pre>';
//print_r($_SESSION);
//echo '<pre>';
if(!$_SESSION['login']){
  header("location: ../../auth/login.php");
  exit;


}

//connect db

	//$productObj = new product;
	//$product = $productObj->getProductsById($_REQUEST['id']);
//ปิดการแจ้งเตือนต่างๆ ไม่ให้รำคาน
error_reporting( error_reporting() & ~E_NOTICE );
	//ฟังก์ชันสำหรับเลี่ยงการใช้ตัวอักขระพิเศษในคำสั่ง sql
@$p_id = mysqli_real_escape_string($conn,($_GET['id'])); 
$act = mysqli_real_escape_string($conn,($_GET['action']));

	//เพิ่มสินค้าลงตะกร้า
	//action = add ค่า id ไม่เป็นค่าว่าง
	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}
 
	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$p_id]);
	}
 
	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้าของฉัน</title>
    <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  </head>
<body>
<?php 
	include 'header.php'; 
	include 'script.php';
 ?>


    <div class="container-fluid mt-5 pt-5">

    <!-- Content here -->
    <!--<a href="product_detail.php?id=<?php echo $product['id']?>" class="btn btn-light">ย้อนกลับ</a>-->

    <form id="frmcart" name="frmcart" method="post" action="?action=update">
  <table border="0" align="center" class="square">
    <tr>
    	<td>
      		<b>ตะกร้าสินค้า</span><br>
		</td>
    </tr>
    <tr>
	<td align="center" class="border border-secondary"></td>
      <td class="border border-secondary">สินค้า</td>
      <td align="center" class="border border-secondary">ราคา</td>
      <td align="center" class="border border-secondary">จำนวน</td>
      <td align="center" class="border border-secondary">รวม(บาท)</td>
      <td align="center" class="border border-secondary"></td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("connect.php");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select * from products where id=$p_id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='200' class='border border-secondary'>" . "<img src='../admin/product/{$row["image"]}' width='100px'>". "</td>";
		echo "<td width='334' class='border border-secondary'>" . $row["name"] . "</td>";
		echo "<td width='46' align='right' class='border border-secondary'>" .number_format($row["price"],2) . "</td>";
		echo "<td width='57' align='right' class='border border-secondary'>";  
		echo "<input type='text' name='amount[$p_id]' value='$qty' size='2' class='border border-secondary'/></td>";
		echo "<td width='93' align='right' class='border border-secondary'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center' class='border border-secondary'><a href='cart3.php?id=$p_id&action=remove' class='btn btn-danger btn-sm'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='4' bgcolor='#EAEAEA' align='center' class='border border-secondary'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#EAEAEA' class='border border-secondary'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#EAEAEA' class='border border-secondary'></td>";
	echo "</tr>";
	echo "<br>";
	
}
?>
<tr>
<td><a href="products.php">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" value="ปรับปรุง" />
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>
    </div>

  </body>
</body>
</html>