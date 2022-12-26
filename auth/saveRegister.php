<?php require "../vendor/autoload.php"  ?>
<?php

use App\Model\customer;

$customer_obj = new customer;
$result = $customer_obj->CreateCustomer($_POST);
if($result) {
	header('location: login.php');
} else {
	header("location: register.php?msg=error");
}
?>