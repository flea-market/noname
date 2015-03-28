<?php
namespace apps\models;
use apps\core\section_core;
use \PDOException;
use lib\completed_class\registry;

class purchase_model extends section_core{
    
    function getConnect(){
	parent::getConnect();
    }
    function getPurchaseAnnouncement(){
	$this->connect->beginTransaction();
	try{
	    $variable = $this->connect->prepare('SELECT * FROM ``.`` WHERE ');  //insert sql query
	    /*
	    $variable->bindParam();
	    parametres of sql-query
	    */
	    if( $variable->execute() ){
		while( $row = $variable->fetch() ){
		    /*parse returned array*/
		}
	    }
	    $variable->commit();
	} 
	catch (PDOException $e ){
	    $variable->rollBack();
	    return 'ERROR: '.$e->getMessage();
	}
    }
    
    
}

?>