<?php
require_once('functions.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

//$conn = mysql_connect('localhost', 'root', 'mysql');
//mysql_select_db('sipoz', $conn);
openDB();

//$username = mysql_real_escape_string($username);
$sql = "
    SELECT 
        *
    FROM 
        sipoz_user
    WHERE 
        sipoz_user_username = '$username';
";
//$result = mysql_query($query);
$MysqliResult = $db->query($sql);
$userData = $MysqliResult->fetch_assoc();

// User not found. So, redirect to login_form again.
if($MysqliResult->num_rows == 0)
{
    header('Location: home.php?page=login');
}

//$userData = mysql_fetch_array($result, MYSQL_ASSOC);

//echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT)."\n";

if (hash("sha256", $password) == $userData["sipoz_user_password"]) {
    $sql = "
        SELECT
            *
        FROM
            sipoz_client
        WHERE
            sipoz_client_username = '" . $userData['sipoz_user_username'] . "'
    ";
    $MysqliResult = $db->query($sql);
    $clientData = $MysqliResult->fetch_assoc();
	session_regenerate_id();
	$_SESSION['sipoz_user_id'] = $userData['sipoz_user_id'];
	$_SESSION['sipoz_user_username'] = $userData['sipoz_user_username'];
    $_SESSION['sipoz_user_group'] = $userData['sipoz_user_group'];
    $_SESSION['sipoz_client_id'] = $clientData['sipoz_client_id'];
	session_write_close();
	header('Location: home.php');
} else {
    header('Location: home.php?page=login');
}
//mysql_close($conn);
//closeDB();S
