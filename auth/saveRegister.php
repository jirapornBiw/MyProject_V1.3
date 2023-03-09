<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  </head>
  
<?php require "../vendor/autoload.php" ;
use App\Model\customer;

$customer_obj = new customer;
$result = $customer_obj->CreateCustomer($_POST);
if($result) {
	'alert("<?php echo $msg;?>");';
	$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
	header('location: login.php');
} else {
	$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณากรอกข้อมูลให้ครบถ้วน ";
	//header("location: register.php?msg=error");
}
?>

<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='#.php';
</script>
</html>