<?php
require_once ('objects/Stock.php');
require_once ('functions.php');

if (!empty($_REQUEST["stock_id"])) {
    $id = array($_REQUEST["stock_id"]);
    $Stock = Stock::loadArray($id);
    $Stock = $Stock[0];
} else {
    $Stock = new Stock();
}

try {
    $Stock->setName($_REQUEST["name"]);
    $Stock->setDescription($_REQUEST["description"]);
    $Stock->setOnHand($_REQUEST["onHand"]);
    $Stock->setPrice($_REQUEST["price"]);
    $Stock->setStatus($_REQUEST["status"]);
    $Stock->setPath("catalogue/{$_FILES['uploadFile']['name']}");
    $Stock->save();
    if (!empty($_FILES['uploadFile'])) {
        move_uploaded_file ($_FILES['uploadFile']['tmp_name'], "catalogue/{$_FILES['uploadFile']['name']}");
    }
} catch (Exception $e) {
    error_log('There was an error with your request: ' . $e->getMessage());
}
header('Location: home.php?page=stock');
