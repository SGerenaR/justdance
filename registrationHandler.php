<?php
require_once ('objects/User.php');
require_once ('functions.php');

if (!empty($_REQUEST["name"]) && !empty($_REQUEST["surname"]) && !empty($_REQUEST["address"]) && !empty($_REQUEST["phone"]) && !empty($_REQUEST["username"]) && !empty($_REQUEST["password"]) && !empty($_REQUEST["confirmpassword"])) {
    $create = false;
    $User = User::loadArray(null, $_REQUEST['username']);
    if (empty($User)) {
        $create = true;
        if ($_REQUEST['password'] === $_REQUEST['confirmpassword']) {
            $create = true;
        } else {
            $create = false;
            $alert = "Error. The passwords do not match.";   
        }
    } else {
        $alert = "Error. The username you entered already exists.";
    }
    if ($create) {
        $User = new User();
        $User->setFirstName($_REQUEST['name']);
        $User->setLastName($_REQUEST['surname']);
        $User->setAddress($_REQUEST['address']);
        $User->setPhone($_REQUEST['phone']);
        $User->setUserName($_REQUEST['username']);
        $User->setPassword(hash('sha256', ($_REQUEST['password'])));
        $User->save();
        $alert = "Success. Your user has been created. You can now login.";
    }
} else {
    $alert = "Error. All fields are mandatory.";
}
header('Location: home.php?page=registration&alert=' . $alert);
