<?php
require_once ('objects/User.php');
require_once ('functions.php');

if (!empty($_REQUEST["user_id"])) {
    $user_id = array($_REQUEST["user_id"]);
    $User = User::loadArray($user_id);
    $User = $User[0];
    
    if (!Empty($User)) {
        if (!empty($_REQUEST["password"])) {
            if ($_REQUEST['password'] === $_REQUEST['confirmpassword']) {
                $User->setPassword(md5($_REQUEST['password']));
                $alert = "success,Password successfully updated.";
            } else {
                $alert = "error,The passwords do not match.";
            }
            
        }
        $User->setFirstName($_REQUEST['firstname']);
        $User->setLastName($_REQUEST['lastname']);
        $User->save();
        header('Location: home.php?page=myAccountEdit&alert=' . $alert);
    } 
}
