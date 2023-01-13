<?php require "../../vendor/autoload.php"  ?>
<?php
include 'connect.php';  

session_start();
if(!$_SESSION['login']){
  header("location: ../../auth/login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกการสั่งซื้อ</title>
    <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  </head>
<body>
    <div class="container">
        <div class="mt-5">
<h1>test</h1>
<h1>test</h1>
<h1>test</h1>
        </div>
    </div>
<?php 
	include 'header.php'; 
	include 'script.php';
 ?>

 <!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
	echo '<pre>';
    print_r($_SESSION);
    echo '<pre>';

    echo '<hr>';

    echo '<pre>';
    print_r($_POST);
    echo '<pre>';

	$dttm = Date("Y-m-d G:i:s");
	$address = $_SESSION["c_address"];
    $postcode = $_SESSION["c_zip_code"];
    $name = $_SESSION['c_name'];
    $phone = $_SESSION["c_phone"];
    //$total_qty = $_REQUEST["total_qty"];
    $total = $_REQUEST["total"];
	$email = $_SESSION["c_email"];
    $id_customer = $_SESSION["c_id"];

	//บันทึกการสั่งซื้อลงใน orders
	mysqli_query($conn, "BEGIN"); 
	$sql1	= "INSERT INTO orders 
    VALUES(
        null, 
        '$dttm', 
        '$address', 
        '$postcode', 
        '$name', 
        '$phone', 
        '$total', 
        '$email',
        'รอการชำระเงิน',
        '$id_customer',
        null
        )";
    //or die ("Error in query: $sql1" . mysqli_error($sql1))
	$query1	= mysqli_query($conn, $sql1) or die ("Error in query : $query1" .mysqli_error($conn,$sql1));
    echo $sql1;
    //exit;
	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "SELECT MAX(o_id) as o_id 
    from orders
    where name='$name' 
    and gmail='$email' 
    and dttm='$dttm' ";
	$query2	= mysqli_query($conn, $sql2);
	$row = mysqli_fetch_array($query2);
	$o_id = $row["o_id"];//order id ล่าสุดที่อยู่ในตาราง orders

    //echo $sql2;
    //echo '<br>';
    echo $o_id;
    //exit;
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql3	= "SELECT  * FROM products where id=$p_id";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$pricetotal	= $row3['price']*$qty;
        $count=mysqli_num_rows($query3);
		
		$sql4	= "INSERT INTO order_detail 
        values(
            null, 
            $o_id, 
            $p_id, 
            $qty, 
            $pricetotal
        )";
		$query4	= mysqli_query($conn, $sql4) or die ("Error in query : $query4" .mysqli_error($conn,$sql4));
        for($i=0; $i<=$count; $i++){
            $have =  $row3['stock'];
            
            $stc = $have - $qty;
            
            $sql9 = "UPDATE products SET  
               stock=$stc
               WHERE  id=$p_id ";
            $query9 = mysqli_query($conn, $sql9) or die ("Error in query : $query9" .mysqli_error($conn,$sql9));  
            }
    }
	echo '<hr>';
    echo $count;
    //ตัดสต็อก
    
          
        /*   stock  */
        
        if($query1 && $query4 && $query9){
        mysqli_query($conn, "COMMIT");
        $msg = "ตัดสต็อกเรียบร้อยแล้ว ";

        foreach((array)$_SESSION['cart'] as $p_id)
            { 
            unset($_SESSION['cart']);
            }
        }
        else{
        mysqli_query($conn, "ROLLBACK");  
        $msg = "ตัดสต็อกไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ "; 
        }
        
        mysqli_close($conn);
            
        echo '<pre>';
    /*print_r($_SESSION);
    print_r($have);
    echo '<hr>';

    print_r($p_id);
    echo '<hr>';

    print_r($stc);
    echo '<pre>';

    echo '<hr>';

    echo '<pre>';
    print_r($_REQUEST);
    echo '<pre>'; */
    
    //echo $p_id;
	/*if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $p_id)
		{	
			//unset($_SESSION['cart'][$p_id]);
			//unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($conn, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}*/
      ?> 


<script type="text/javascript">
	alert("<?php echo $msg;?>");
	//window.location ='products.php';
</script>
</body>
</html>

