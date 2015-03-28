<?php
namespace apps\models;
use lib\completed_classes\registry;
class mailbox_model{

    function __construct(){
	
    }
    
    function deleteMail(){
	
    }
    
    function clearMailBox(){
	
    }
    
    function getMail(){
	$this->connect->beginTransaction();
	try{
	    $stmnt = $this->connect->prepare('SELECT * FROM `user_mail` WHERE ');
	    /*
	    $variable->bindParam();
	    parametres of sql-query
	    */
	    $stmnt->execute();
	    $this->connect->commit();
	    $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
	    return $result;
	} 
	catch (PDOException $e ){
	    $this->connect->rollBack();
	    return 'ERROR: '.$e->getMessage();
	}
    }
    
    function sendMail( $array ){
	$this->connect->beginTransaction();
	try{
	    $stmnt = $this->connect->prepare('INSERT INTO ``.`` VALUES()');  //insert sql query
	    /*
	    $variable->bindParam();
	    parametres of sql-query
	    */
	    $stmnt->execute();
	    $this->connect->commit();
	} 
	catch (PDOException $e ){
	    $this->connect->rollBack();
	    return 'ERROR: '.$e->getMessage();
	}
    }
    
}
?>