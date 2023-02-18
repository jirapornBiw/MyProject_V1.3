<?php require "../../vendor/autoload.php" ;
include 'connect.php';

use App\Model\customer;

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
  <div class="container-fluid mt-5 pt-5">
    <div class="col-sm-12 mt-5">
      <div class="d-flex justify-content-center">
        <h1>ยืนยันการสั่งซื้อสินค้า</h1>
      </div>
    </div>
    <form id="frmcart" name="frmcart" method="post" action="saveorder.php">
      <table width="600" border="0" align="center" class="square">

        <tr>
          <td bgcolor="#F9D5E3" class="border border-secondary">สินค้า</td>
          <td align="center" bgcolor="#F9D5E3" class="border border-secondary">ราคา</td>
          <td align="center" bgcolor="#F9D5E3" class="border border-secondary">จำนวน</td>
          <td align="center" bgcolor="#F9D5E3" class="border border-secondary">รวม/รายการ</td>
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
          echo "<td  class='border border-secondary'>" . $row["name"] . "</td>";
          echo "<td align='right' class='border border-secondary'>" . number_format($row['price'], 2) . "</td>";
          echo "<td align='right' class='border border-secondary'>$qty</td>";
          echo "<td align='right' class='border border-secondary'>" . number_format($sum, 2) . "</td>";
          echo "</tr>";
        }
        echo "<tr>";
        echo "<td  align='right' class='border border-secondary' colspan='3' ><b>ค่าจัดส่ง</b></td>";
        echo "<td align='right' class='border border-secondary' >" . "<b>" . number_format($shipping_cost, 2) . "</b>" . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td  align='right' class='border border-secondary' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
        echo "<td align='right' class='border border-secondary' bgcolor='#F9D5E3'>" . "<b>" . number_format($amount, 2) . "</b>" . "</td>";
        echo "</tr>";
        ?>
      </table>
      <p>

      <table border="0" cellspacing="0" align="center">
        <tr>
          <td colspan="2" bgcolor="#CCCCCC" class='border border-secondary'>รายละเอียดในการติดต่อจัดส่งสินค้า</td>
        </tr>
        <tr>
          <td bgcolor="#EEEEEE" class='border border-secondary'>ชื่อ</td>
          <td class='border border-secondary'><label for="name"><?php echo $customer['first_name']; ?></label></br></td>
        </tr>
        <tr>
          <td width="22%" bgcolor="#EEEEEE" class='border border-secondary'>ที่อยู่</td>
          <td width="78%" class='border border-secondary'>
            <label for="address" name="address" id="address"><?php echo $customer['address'] . ' ต.' . $customer['districts'] . ' อ.'
                                                                . $customer['amphures'] . ' จ.' . $customer['provinces']; ?></label>
          </td>
        </tr>
        <tr>
          <td bgcolor="#EEEEEE" class='border border-secondary'>อีเมล</td>
          <td class='border border-secondary'><label for="address"><?php echo $customer['email']; ?></label></td>
        </tr>
        <tr>
          <td bgcolor="#EEEEEE" class='border border-secondary'>เบอร์ติดต่อ</td>
          <td class='border border-secondary'><label for="address"><?php echo $customer['phone']; ?></label></td>
        </tr>
        <tr>
          <td colspan="2" align="center" bgcolor="#CCCCCC" class='border border-secondary'>
            <input type="hidden" name="total" value="<?php echo $total; ?>" />
						<input type="button" name="Submit2" value="แก้ไขที่อยู่" onclick="window.location='edit_profile.php?id=<?php echo $_SESSION['c_id']?>&action=edit';" class="btn btn-light" />
            <input type="submit" name="Submit2" value="สั่งซื้อ" class="btn btn-secondary"/>
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>