<?php
namespace apps\models;
use apps\core\section_core;
use \PDOException;
use lib\completed_classes\registry;

class sell_model extends section_core{

    function __construct(){
	parent::getConnect();
    }
    
    function getSellAnnouncement(){
	$this->connect->beginTransaction();
	try{
	    $variable = $this->connect->prepare('SELECT *FROM ``.`` WHERE ');  //insert sql query
	    /*
	    $variable->bindParam();
	    parametres of sql-query
	    */
	    if( $variable->execute() ){
		/* parse returned array */
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