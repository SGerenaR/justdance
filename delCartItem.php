<?php
session_start();
$stockID = $_REQUEST['stock_id'];
if (sizeof($_SESSION['cart']) == 1) {
    unset($_SESSION['cart']);
} else {
    unset($_SESSION['cart'][$stockID]);
}

$qty = 0;
if (isset($_SESSION['cart'])) {
    $cartProducts = $_SESSION['cart'];
    foreach ($cartProducts as $productQty) {
        $qty += $productQty;
    }
}
echo json_encode(array('qty' => $qty));
