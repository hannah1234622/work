<?php

class connect_DB 
{

    var $hostname="localhost";
    var $username="root";
    var $password="";
    var $dbname="test";

    function__construct($hostname,$username,$password,$dbname){
        try {
            $db=new PDO("mysql:host=".$hostname.";dbname=".$dbname,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));//PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//錯誤訊息提醒
        } catch (PDOExcertion $e) {
            echo $e->getMEssage();
        }
    }
    
}

?>