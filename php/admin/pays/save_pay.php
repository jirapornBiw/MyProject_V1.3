<?php require "../../../vendor/autoload.php"  ?>
<?php

use App\Model\pays;
$payObj = new pays;;
$pay = $_REQUEST;
$payObj->updateStatusCorrect($_REQUEST);

header("location: index.php")
?>