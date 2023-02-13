<?php require "../vendor/autoload.php"  ?>
<?php
use App\Model\customer;

$customerObj = new customer;
$result = $customerObj->checkCustomer($_POST);



if($result){
	if($_SESSION['userlevel']=='member'){
		$customerObj = new customer;
		$customer = $customerObj->getCustomerById($_SESSION['c_id']);
		header("location: ../php/member/index.php?id={$_SESSION['c_id']}&action=show");
	} 
	if($_SESSION['userlevel']=='admin'){
		header("location: ../php/admin/product/index.php");
	}
} else {
	header("location: login.php?msg=error");
}
?>