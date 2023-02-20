<?php require "../../vendor/autoload.php" ;
include 'connect.php';

use App\Model\customer;
use App\Model\order;

session_start();

if (!$_SESSION['login']) {
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
<div class="row">
		<div class="col-sm-12 mt-5">
			<div class="d-flex justify-content-center">
				<h1>รายละเอียดการสั่งซื้อ</h1>
			</div>
		</div>
		<div class="container mt-5 mb-5 align-items-cente 
		justify-content-centerr border border-secondary rounded" style="width: 40rem;">

			<div class="form-group mt-3">
				<h4>ข้อมูลลูกค้า</h4>
				<hr>
        <!-- <?php print_r($_SESSION) ?><br> -->
				<label for="name">ชื่อ : <?php echo $_SESSION['c_name']; ?></label></br>
        <label for="address" name="address" id="address">ที่อยู่ : <?php echo $customer['address'] . ' ต.' . $customer['districts'] . ' อ.'
                                                                . $customer['amphures'] . ' จ.' . $customer['provinces']; ?></label><br>
				<label for="name">รหัสไปรษณีย์ : <?php echo $customer['zip_code']; ?></label></br>
				<label for="name">เบอร์โทรศัพท์ : <?php echo $customer['phone']; ?></label></br>
				<label for="name">อีเมลล์ : <?php echo $customer['email']; ?></label></br>
				<hr>
				<h4>รายการการสั่งซื้อ</h4>
				<div class="card-body " align="center">
				
					


    <form id="frmcart" name="frmcart" method="post" action="saveorder.php">
      <table width="600" border="0" align="center" class="square">

      <tr>
          <td  class="border">สินค้า</td>
          <td align="center" class="border">ราคา</td>
          <td align="center" class="border">จำนวน</td>
          <td align="center" class="border">รวม/รายการ</td>
        </tr>
        <?php
        $total = 0;
        $total_weight = 0;
        foreach ($_SESSION['cart'] as $p_id => $qty) {
          $sql = "select products.*,weight.weight from products 
		LEFT JOIN weight ON products.weight_id = weight.id
		where products.id=$p_id";
          $query = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($query);
          $sum = $row['price'] * $qty;
          $weight = $row['weight'] * $qty;
          $total += $sum;
          $total_weight += $weight;
          $shipping_cost = ($total_weight * 15) + 20;
          $amount = $total + $shipping_cost;
          echo "<tr>";
          echo "<td  class='border'>" . $row["name"] . "</td>";
          echo "<td align='right' class='border'>" . number_format($row['price'], 2) . "</td>";
          echo "<td align='right' class='border'>$qty</td>";
          echo "<td align='right' class='border'>" . number_format($sum, 2) . "</td>";
          echo "</tr>";
        }
        echo "<tr>";
        echo "<td  align='right' class='border' colspan='3' ><b>ค่าจัดส่ง</b></td>";
        echo "<td align='right' class='border' >" . "<b>" . number_format($shipping_cost, 2) . "</b>" . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td  align='right' class='border' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
        echo "<td align='right' class='border' bgcolor='#F9D5E3'>" . "<b>" . number_format($amount, 2) . "</b>" . "</td>";
        echo "</tr>";
        ?>
      </table>
      <p>

      <table border="0" cellspacing="0" align="center">
       
            <input type="hidden" name="total" value="<?php echo $total; ?>" />
						<input type="button" name="Submit2" value="แก้ไขที่อยู่" onclick="window.location='edit_profile.php?id=<?php echo $_SESSION['c_id']?>&action=edit';" class="btn btn-light" />
            <input type="submit" name="Submit2" value="สั่งซื้อ" class="btn btn-secondary"/>
        </tr>
      </table>
    </form>

</body>

</html>