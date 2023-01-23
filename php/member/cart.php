<?php //เรียกไฟล์เชื่อมต่อฐานข้อมูล

require "../../vendor/autoload.php";
include 'connect.php'; 
session_start(); ?>


<?php
//ปิดการแจ้งเตือนต่างๆ ไม่ให้รำคาน
error_reporting( error_reporting() & ~E_NOTICE );
	//ฟังก์ชันสำหรับเลี่ยงการใช้ตัวอักขระพิเศษในคำสั่ง sql
@$p_id = mysqli_real_escape_string($conn,($_GET['id'])); 
$act = mysqli_real_escape_string($conn,($_GET['action']));

	//เพิ่มสินค้าลงตะกร้า
	//action = add ค่า id ไม่เป็นค่าว่าง
	if($act=='add' && !empty($p_id))
	{
		$qty = $_REQUEST['qty'];
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=$qty;
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
		<div class="col-sm-12 mt-5">
            <div class="d-flex justify-content-center">
              <h1>ตะกร้าสินค้า</h1>
            </div>
        </div>
  <table border="0" align="center" class="square">
    
    <tr>
	<td align="center" class="border border-secondary" width="200">รูปภาพ</td>
      <td class="border border-secondary" width="350">สินค้า</td>
      <td align="center" class="border border-secondary" width="50">ราคา</td>
      <td align="center" class="border border-secondary" width="30">จำนวน</td>
      <td align="center" class="border border-secondary" width="100">รวม(บาท)</td>
      <td align="center" class="border border-secondary" width="60">ตัวเลือก</td>
    </tr>
<?php
$total=0;
$total_weight=0;
if(!empty($_SESSION['cart']))
{
	include("connect.php");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select products.*,weight.weight from products 
		LEFT JOIN weight ON products.weight_id = weight.id
		where products.id=$p_id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['price'] * $qty;
		$weight = $row['weight'] * $qty;
		$total += $sum;
		$total_weight += $weight;
		
		echo "<tr>";
		echo "<td width='200' class='border border-secondary'>" . "<img src='../admin/product/{$row["image"]}' width='100px'>". "</td>";
		echo "<td width='350' class='border border-secondary'>" . $row["name"] . "</td>";
		echo "<td width='50' align='right' class='border border-secondary'>" .number_format($row["price"],2) . "</td>";
		echo "<td width='60' align='right' class='border border-secondary'>";  
		echo "<input type='number' style='width: 3em;'name='amount[$p_id]' value='$qty' min='0' max='$row[stock]' class='border border-secondary'/></td>";
		
		echo "<td width='100' align='right' class='border border-secondary'>".number_format($sum,2)."</td>";
		echo "<td width='50' align='center' class='border border-secondary'><a href='cart.php?id=$p_id&action=remove' class='btn btn-danger btn-sm'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
	//$shipping_cost = 20;
	//ค่าจัดส่งเริ่มต้น 20 ทุก1 กิโลกรัม จะคิดเพิ่ม 15 บาท
	$shipping_cost =($total_weight*15)+20;
	//น้ำหนักสินค้ารวม
	echo "<td colspan='4'  align='right' class='border border-secondary text-right'><b>น้ำหนักสินค้ารวม</b></td>";
	echo "<td colspan='2' align='right'  class='border border-secondary'>"."<b>".number_format($weight,2)."</b>"."</td>";
	echo "</tr>";
	//ค่าจัดส่งสินค้า
  	echo "<td colspan='4'  align='right' class='border border-secondary'><b>ค่าจัดส่งสินค้า</b></td>";
	echo "<td colspan='4' align='right'  class='border border-secondary'>"."<b>".number_format($shipping_cost,2)."</b>"."</td>";
	echo "</tr>";
	$amount = $total+$shipping_cost;
	echo "<tr>";
  	echo "<td colspan='4' bgcolor='#EAEAEA' align='right' class='border border-secondary'><b>ราคารวม</b></td>";
  	echo "<td colspan='4' align='right' bgcolor='#EAEAEA' class='border border-secondary'>"."<b>".number_format($amount,2)."</b>"."</td>";
	echo "</tr>";
	echo "<br>";
	
}
?>
<tr>
<td><a href="products.php" class="btn btn-outline-info">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" value="ปรับปรุง" class="btn btn-outline-warning"/>
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" class="btn btn-outline-success"/>
</td>
</tr>
</table>
</form>
    </div>
<div class="container mt-5">
	<h4>***อัตราค่าจัดส่ง***</h4>
	<p>ค่าจัดส่งกิโลกรัมแรก เริ่มต้นที่ 20 บาท</p>
	<p>ทุก 1 กิโลกรัม จะคิดเพิ่ม 15 บาท</p>
</div>
</body>

</html>