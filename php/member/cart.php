<?php //เรียกไฟล์เชื่อมต่อฐานข้อมูล
require "../../vendor/autoload.php";
include 'connect.php';
session_start();
// if (!$_SESSION['login']) {
// 	header("location: ../../auth/login.php");
// 	exit;
// };

//ปิดการแจ้งเตือนต่างๆ ไม่ให้รำคาน
error_reporting(error_reporting() & ~E_NOTICE);
//ฟังก์ชันสำหรับเลี่ยงการใช้ตัวอักขระพิเศษในคำสั่ง sql
@$p_id = mysqli_real_escape_string($conn, ($_GET['id']));
$act = mysqli_real_escape_string($conn, ($_GET['action']));
//เพิ่มสินค้าลงตะกร้า
//action = add ค่า id ไม่เป็นค่าว่าง
if ($act == 'add' && !empty($p_id)) {
	$qty = $_REQUEST['qty'];
	if (isset($_SESSION['cart'][$p_id])) {
		$_SESSION['cart'][$p_id]++;
	} else {
		$_SESSION['cart'][$p_id] = $qty;
	}
}

if ($act == 'remove' && !empty($p_id))  //ลบสินค้า
{
	unset($_SESSION['cart'][$p_id]);
}

if ($act == 'update') { //อัพเดตสินค้า
	$amount_array = $_POST['amount'];
	foreach ($amount_array as $p_id => $amount) {
		$_SESSION['cart'][$p_id] = $amount;
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
		<!--<a href="product_detail.php?id=<?php echo $product['id'] ?>" class="btn btn-light">ย้อนกลับ</a>-->
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12 ">
				<form id="frmcart" name="frmcart" method="post" action="?action=update">
					<div class="col-sm-12 mt-5">
						<div class="d-flex justify-content-center">
							<h1>ตะกร้าสินค้า</h1>
						</div>
					</div>
					<div class="spt-text-body01" style="margin-left: 12%;">

						<a href="../member/index.php?login=<?php echo $_SESSION['login'] ?>" title="หน้าแรก" class="text-muted" style="text-decoration: none; ">หน้าแรก > </a>
						<a href="../member/products.php?login=<?php echo $_SESSION['login'] ?>" title="สินค้า" class="text-muted" style="text-decoration: none; ">สินค้า</a>

					</div>
					<div class="container d-flex justify-content-center mt-5" style="width: 80%;">
						<table table align="center" style="width: 100%;">

							<tr style="background-color: #9b631b;" class="text-light">
								<td align="center" class="border border-secondary" width="15%">รูปภาพ</td>
								<td class="border border-secondary" width="10%">สินค้า</td>
								<td align="center" class="border border-secondary" width="10%">ราคา</td>
								<td align="center" class="border border-secondary" width="10%">จำนวน</td>
								<td align="center" class="border border-secondary" width="10%">น้ำหนัก</td>
								<td align="center" class="border border-secondary" width="10%">รวม(บาท)</td>
								<td align="center" class="border border-secondary" width="5%">ตัวเลือก</td>
							</tr>
							<?php
							$total = 0;
							$total_weight = 0;
							$sumqty = 0; //น้ำหนักสินค้ารวม
							if (!empty($_SESSION['cart'])) {
								include("connect.php");
								foreach ($_SESSION['cart'] as $p_id => $qty) {
									$sql = "
											select 
											products.*,weight.weight 
											from products 
											LEFT JOIN weight ON products.weight_id = weight.id
											where products.id=$p_id";
									$query = mysqli_query($conn, $sql);
									$row = mysqli_fetch_array($query);




									$sum = $row['price'] * $qty;

									$weight = $row['weight'] * $qty; //น้ำหนักสินค้ารวมต่อชิ้น
									$sumqty += $row['weight'] * $qty; //น้ำหนักสินค้ารวมทุกชิ้น
									$total += $sum;

									echo "<tr align='center'>";
									echo "<td width='15%' class='border border-secondary'>" . "<img src='../admin/product/{$row["image"]}' width='50%'>" . "</td>"; //รูปภาพ
									echo "<td width='10%' class='border border-secondary'>" . $row["name"] . "</td>"; //ชื่อสินค้า
									echo "<td width='10%' align='right' class='border border-secondary'>" . number_format($row["price"], 2) . "</td>"; //ราคา
									echo "<td width='10%' align='right' class='border border-secondary'>";
									echo "<input type='number' style='width: 100%;'name='amount[$p_id]' value='$qty' min='0' max='$row[stock]' class='border border-secondary'/></td>"; //จำนวน
									echo "<td width='10%' align='right' class='border border-secondary'>" . number_format($weight) . "</td>"; //น้ำหนัก
									echo "<td width='10%' align='right' class='border border-secondary'>" . number_format($sum, 2) . "</td>"; //รวม(บาท)
									echo "<td width='5%' align='center' class='border border-secondary'><a href='cart.php?id=$p_id&action=remove' class='btn btn-danger btn-sm'>ลบ</a></td>";
									echo "</tr>";
								}
								echo "<tr>";
								//$shipping_cost = 20;
								//ค่าจัดส่งเริ่มต้น 20 ทุก1 กิโลกรัม จะคิดเพิ่ม 15 บาท
								if ($sumqty >= 1) {
									$shipping_cost = (($sumqty - 1) * 15) + 20;
								} else {
									$shipping_cost = ($sumqty + 20);
								}
								//น้ำหนักสินค้ารวม
								echo "<td colspan='5'  align='right' class='border border-secondary'><b>น้ำหนักสินค้ารวม</b></td>";
								echo "<td colspan='2' align='right'  class='border border-secondary'>" . "<b>" . number_format($sumqty, 2) . "</b>" . "</td>";
								echo "</tr>";
								//ค่าจัดส่งสินค้า


								echo "<td colspan='5'  align='right' class='border border-secondary'><b>ค่าจัดส่งสินค้า</b></td>";
								echo "<td colspan='2' align='right'  class='border border-secondary'>" . "<b>" . number_format($shipping_cost, 2) . "</b>" . "</td>";
								echo "</tr>";
								$amount = $total + $shipping_cost;
								echo "<tr style='background-color: #efe5db;'>";
								echo "<td colspan='5' align='right' class='border border-secondary'><b>ราคารวม</b></td>";
								echo "<td colspan='2' align='right' class='border border-secondary'>" . "<b>" . number_format($amount, 2) . "</b>" . "</td>";
								echo "</tr>";
								echo "<br>";
							}
							?>

						</table>
					</div>


					<div class="container mt-5 d-flex justify-content-end" style="width: 80%;">
						<input type="submit" name="button" id="button" value="ปรับปรุงสินค้าในตะกร้า" class="btn" style="background-color: #f5f5f5;"/>
						<input type="button" id="submit_confirm" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" class="btn text-light" style="background-color: #9b631b;"/>
					</div>
				</form>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="container d-flex justify-content-center mt-5">
					<img src="https://angthongfiber.com/wp-content/uploads/2019/12/%E0%B8%A5%E0%B8%97%E0%B8%9A%E0%B8%9E%E0%B8%B1%E0%B8%AA%E0%B8%94%E0%B8%B8-1600x1600.jpg" width="100%" >
				</div>
				<div class="container mt-5">
					<h4>***อัตราค่าจัดส่ง***</h4>
					<p>ค่าจัดส่งกิโลกรัมแรก เริ่มต้นที่ 20 บาท</p>
					<p>ทุก 1 กิโลกรัม จะคิดเพิ่ม 15 บาท</p>
				</div>
			</div>

		</div>

	</div>

</body>

</html>