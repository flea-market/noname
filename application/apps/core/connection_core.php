<?php
namespace apps\core;
use lib\config\db_config;
class connection_core{

    function getConfig(){
    $config = new db_config();
    $parametres = $config->getParam();
    $this->server		= $parametres['SERVER'];
    $this->user		= $parametres['USER'];
    $this->password	= $parametres['PASSWORD'];
    $this->dbName	= $parametres['DBNAME'];
    }

    /*
    add your connection method if you have another db
    */
    
    
    function MySQLConnection(){
	$host = 'mysql:host='.$this->server.';dbname='.$this-dbName;
	try{
	    $dbh = new PDO( $host, $this->user, $this->password, array(PDO::ATTR_PERSISTENT=>true));
	    return $dbh;
	} 
	catch (PDOException $e){
	    return 'Connection error: '.$e->getMessage();
	}
    }
}
?>