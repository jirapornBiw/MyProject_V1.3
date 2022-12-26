<?php require "../../../vendor/autoload.php"  ?>
<?php

use App\Model\news;
$newObj = new news;;

$image_file = $_FILES['txt_file']['name'];
$type = $_FILES['txt_file']['type'];
$size = $_FILES['txt_file']['size'];
$temp = $_FILES['txt_file']['tmp_name'];

$path = "upload/" . $image_file;

move_uploaded_file($temp, 'upload/'.$image_file);

    $new = $_REQUEST;
    unset($new['action']);
    unset($new['new_id']);
    $new['image'] = $path;
    $newObj->addNew($new);

header("location: index.php");
?>