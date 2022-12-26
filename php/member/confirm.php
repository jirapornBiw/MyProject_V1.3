<?php require "../../vendor/autoload.php"  ?>
<?php
include 'connect.php';  
use App\Model\customer;

session_start();

if(!$_SESSION['login']){
  header("location: ../../auth/login.php");
  exit;
}
$customerObj = new customer;
$customer = $customerObj->getCustomerById($_SESSION['c_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืนยันการสั่งสินค้า</title>
    <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  </head>
<body>
<?php 
	include 'header.php'; 
	include 'script.php';
 ?>
  <h1>ยืนยันการสั่งสินค้า</h1>
  <form id="frmcart" name="frmcart" method="post" action="saveorder.php">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td width="1558" colspan="4" bgcolor="#FFDDBB">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr>
      <td bgcolor="#F9D5E3">สินค้า</td>
      <td align="center" bgcolor="#F9D5E3">ราคา</td>
      <td align="center" bgcolor="#F9D5E3">จำนวน</td>
      <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
    </tr>
<?php
	$total=0;
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from products where id=$p_id";
		$query	= mysqli_query($conn, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['price']*$qty;
		$total	+= $sum;
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td align='right'>" .number_format($row['price'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
	echo "<tr>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
    echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";
?>
</table>
<p>    
<table border="0" cellspacing="0" align="center">
<tr>
	<td colspan="2" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
</tr>
<tr>
    <td bgcolor="#EEEEEE">ชื่อ</td>
    <td><label for="name"><?php echo $customer['name'];?></label></br></td>
</tr>
<tr>
    <td width="22%" bgcolor="#EEEEEE">ที่อยู่</td>
    <td width="78%">
    <label for="address"><?php echo $customer['address'];?></label>
    </td>
</tr>
<tr>
  	<td bgcolor="#EEEEEE">อีเมล</td>
  	<td><label for="address"><?php echo $customer['email'];?></label></td>
</tr>
<tr>
  	<td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
  	<td><label for="address"><?php echo $customer['phone'];?></label></td>
</tr>
<tr>
	<td colspan="2" align="center" bgcolor="#CCCCCC">
  <input type="hidden" name="total" value="<?php echo $total; ?>"/>
	<input type="submit" name="Submit2" value="สั่งซื้อ" />
</td>
</tr>
</table>
</form>
  
</body>
</html>