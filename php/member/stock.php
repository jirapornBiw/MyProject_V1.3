<?php
    session_start();  
 
 /*
 echo "<pre>";
 print_r($_SESSION);
 echo "<hr>";
 print_r($_POST);
 echo "</pre>";
 exit();
 */
    
?>
 
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
   
require_once('Connections/dbfreshcoffee.php');
 
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
 
 $member_firstname = $_POST["member_firstname"]; 
 $member_address = $_POST["member_address"];
 $member_email = $_POST["member_email"];
 $member_phone = $_POST["member_phone"];
 $member_username=$_POST["member_username"];
 $p_qty = $_POST["p_qty"];
 $total = $_POST["total"];
 $order_date = date("Y-m-d H:i:s");
 $status = 1;
 
 
 
  
  //ตัดสต๊อก
  for($i=0; $i<$count; $i++){
  $have =  $row3['product_total'];
  
  $stc = $have - $p_qty;
  
  $sql9 = "UPDATE tbl_product SET  
     product_total=$stc
     WHERE  product_id=$product_id ";
  $query9 = mysql_db_query($database_dbfreshcoffee, $sql9);  
  }
    
  /*   stock  */
 }
 if($query1 && $query4){
  mysql_db_query($database_dbfreshcoffee, "COMMIT");
  $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
  foreach($_SESSION['shopping_cart'] as $product_id)
  { 
   unset($_SESSION['shopping_cart']);
  }
 }
 else{
  mysql_db_query($database_dbfreshcoffee, "ROLLBACK");  
  $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ "; 
 }
 
 mysql_close($dbfreshcoffee);
?>
 
 
<script type="text/javascript">
 alert("<?php echo $msg;?>");
 window.location ='product.php';
</script>
 
 
 
</body>
</html>