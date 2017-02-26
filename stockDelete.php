<?php
require_once ('objects/Stock.php');
require_once ('functions.php');

if (!empty($_REQUEST["stock_id"])) {
    $id = array($_REQUEST["stock_id"]);
    $Stock = Stock::loadArray($id);
    $Stock = $Stock[0];
    $Stock->delete();
    header('Location: home.php?page=stock');
}
