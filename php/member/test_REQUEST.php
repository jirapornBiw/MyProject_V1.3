<?php require "../../vendor/autoload.php"  ?>
<?php

use App\Model\customer;

	$customerObj = new customer;
	$customer = $customerObj->getCustomerById($_REQUEST['id']);
    

echo '<pre>';
print_r($_REQUEST);
echo '<pre>';

echo '<ht>';

echo '<pre>';
var_dump($_REQUEST);
echo '<pre>';
?>