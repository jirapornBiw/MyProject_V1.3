<?php require "../../../vendor/autoload.php"  ?>
<?php

use App\Model\news;
$newObj = new news;;

    $new = $newObj->getNewById($_REQUEST['New_Id']);
    if( $new['image']){
        unlink('upload/'.$image_file.$product['image']);
    }
    $newObj->deleteNew($_REQUEST['id']);
header("location: index.php");
?>