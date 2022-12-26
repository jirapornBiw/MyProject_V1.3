<?php
	// save.php
    isset( $_GET['id'] ) ? $id = $_GET['id'] : $n1 = "";
    isset( $_GET['n2'] ) ? $n2 = $_GET['n2'] : $n2 = "";
    if( !empty( $n1 ) && !empty( $n2 ) ) {
        echo "ตัวแปร n1 = {$n1} และ n2 = {$n2}";                                 
    }
?>