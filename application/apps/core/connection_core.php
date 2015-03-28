<?php
namespace apps\core;
use lib\config\db_config;
use lib\completed_classes\registry;
use \PDO;
use \PDOException;

class connection_core{

    function getConfig(){
	$config = new db_config();
	$parametres = $config->getParam();
	$this->server		= $parametres['SERVER_NAME'];
	$this->user		= $parametres['USER_NAME'];
	$this->password	= $parametres['SERVER_PASSWORD'];
	$this->dbName	= $parametres['DATABASE_NAME'];
    }
    /*
    add your connecting method if you have another sql-server
    */
    function MySQLConnection(){
	$host = 'mysql:host='.$this->server.';dbname='.$this->dbName;
	try{
	    $dbh = new PDO( $host, $this->user, $this->password, array(PDO::ATTR_PERSISTENT=>true));
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    Registry::instance();
	    Registry::setData('MySQL_Connect',$dbh);
	} 
	catch (PDOException $e){
	    return 'Connection error: '.$e->getMessage();
	}
    }
    /*other connections*/
}
?>