<?php require "../../vendor/autoload.php"  ?>
<?php

use App\Model\customer;

echo '<pre>';
print_r($_REQUEST);
echo '<pre>';

echo '<ht>';

echo '<pre>';
var_dump($_REQUEST);
echo '<pre>';

$customerObj = new customer;;
$customer = $_REQUEST;
$customerObj->updateCustumer($_REQUEST);




header("location: profile.php?id={$_SESSION['id']}&action=show")
?>