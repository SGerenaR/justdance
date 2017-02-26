<?php
session_start();
$stockID = $_REQUEST['stock_id'];
$qty = $_REQUEST['product_qty'];

if (isset($_SESSION['cart'])) {
    if (isset($_SESSION['cart'][$stockID])) {
        $_SESSION['cart'][$stockID] += $qty;
    } else {
        $_SESSION['cart'][$stockID] = $qty;
    }
} else {
    $_SESSION['cart'][$stockID] = $qty;
}

$qty = 0;
$cartProducts = $_SESSION['cart'];
foreach ($cartProducts as $productQty) {
    $qty += $productQty;
}
echo json_encode(array('qty' => $qty));
