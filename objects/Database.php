<?php
class Database 
{
    function __construct()
    {
    }
    
    public static function getConnection($username, $password)
    {
        $connection = mysql_connect('localhost', $username, $password);
        mysql_select_db("sipoz");
        return $connection;
    }
}
