<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php require "../../vendor/autoload.php";
    session_start();
    include 'connect.php';

    use App\Model\orders;

    //if(isset(($_REQUEST)['action']='cancel')){
    if (isset($_REQUEST['action'])) {
        $ordersObj = new orders();
        $orders = $ordersObj->getAllOrderDetail($_REQUEST['id']);
        $n = 0;
        //หาจำนวนสินค้าของแต่ละชิ้น
        foreach ($orders as $order) {
            $n++;
            echo "
            <td>{$order['product_id']}</td>
            <td>{$order['product_name']}</td>
            <td>{$order['qty']}</td>";
            echo '<pre>';
            $p_id = $order['product_id'];
            $stock = $order['qty'];
            $stockNew = 0;
            //จำนวนสินค้าเดิม
            $stockOld = "
                    SELECT  stock 
                    FROM products
                    WHERE id =$p_id";

            if ($query = mysqli_query($conn, $stockOld)) {
                while ($stockOldRow = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    $stockOld = $stockOldRow['stock'];
                    print_r($stockOld);
                }
            }
            $stockNew = mysqli_real_escape_string($conn, $stockOld) + mysqli_real_escape_string($conn, $stock);
            echo $stockNew;
            //จำนวนสินค้าที่จะเพิ่ม
            $Updatestock = "
                    UPDATE  products SET 
                    stock = '$stockNew'
                    WHERE id = '$p_id'";
            if ($query2 = mysqli_query($conn, $Updatestock) or die("Error in query : $query2" . mysqli_error($conn, $query2))) {
                //$stockUpdate = $UpdatestockRow['stock'];
                //print_r($stockUpdate);
            }
        }
        // }exit;
        //อัพเดตคืนสินค้าแต่ละชิ้น
        alert("ยกเลิกออเดอร์แล้วเรียบร้อย");
        unset($_REQUEST['action']);
        $ordersObj = new orders;;
        $orders = $_REQUEST;
        $ordersObj->updateOrderStatusCancel($_REQUEST);
    } else {
        alert("ยกเลิกออเดอร์ไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ");
        unset($_REQUEST['action']);
    }


    function alert($msg)
    {
        echo "<script type='text/javascript'>
    alert('$msg');
    window.location ='orders.php?id=<?php echo {$_SESSION['c_id']}?>&action=detail';
    </script>";
        //header("location: orders.php?id={$_SESSION['id']}&action=show");

    }
    //
    ?>
</body>

</html>