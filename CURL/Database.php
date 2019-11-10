<?php

include "./Controller/Controller.php";
include "./Controller/Page/Vnexpress.php";
include "./Controller/Page/Vietnamnet.php";
include "./Controller/Page/Dantri.php";
include "./Controller/Curl.php";
include "./Controller/Crawler.php";



//define database
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '';
$mysql_database = 'phpCrawler';

class Database
{
    private $mysql_host;
    private $mysql_username;
    private $mysql_password;
    private $mysql_database;

    function __construct($mysql_host, $mysql_username, $mysql_password, $mysql_database)
    {
        $this->mysql_host = $mysql_host;
        $this->mysql_username = $mysql_username;
        $this->mysql_password = $mysql_password;
        $this->mysql_database = $mysql_database;
    }

    function mysqlConnect()//mysqli_connet ket noi den mysql server va return gia tri
    {
        return mysqli_connect($this->mysql_host, $this->mysql_username, $this->mysql_password, $this->mysql_database);
    }

    function isConnectDatabase()//PHP_EOL giong /n
    {
        if (!$this->mysqlConnect()) {
            echo "Error: Unable to connect to MySQL" . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            return false;
        } else {
            mysqli_set_charset($this->mysqlConnect(), 'utf8');//thay doi bang mang ->utf8
            return true;
        }
    }
   
}
