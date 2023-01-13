<?php require "../../vendor/autoload.php"  ?>
<?php

use App\Model\pays;
use App\Model\orders;
use App\Model\claims;
$claimObj = new claims;

$image_file = $_FILES['txt_file']['name'];
$type = $_FILES['txt_file']['type'];
$size = $_FILES['txt_file']['size'];
$temp = $_FILES['txt_file']['tmp_name'];

$path = "" . $image_file;

move_uploaded_file($temp, '../admin/claims/upload/'.$image_file);

    $claim = $_REQUEST;
    unset($claim['action']);
    unset($claim['new_id']);
    $claim['image'] = $path;
    $claimObj->addClaim($claim);

header("location: index.php");
?>