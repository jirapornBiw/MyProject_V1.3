<?php require "../../vendor/autoload.php"  ?>
<?php

use App\Model\customer;
$customerObj = new customer;;
$customer = $_REQUEST;
$customerObj->updateCustumer($_REQUEST);

header("location: profile.php?id={$_SESSION['id']}&action=show")
?>