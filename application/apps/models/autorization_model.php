<?php
namespace apps\models;
use lib\completed_classes\registry;
use lib\completed_classes\autorization_check;
use apps\core\section_core;

class autorization_model extends section_core{

    function getConnect(){
	parent::getConnect();	//	use $this->connect
    }

    function getUserPersonalData($userName, $userPassword){
	$this->userName	 = $userName;
	$this->userPassword = $userPassword;
    }
    
    function restoreUser( $userLogin ){
	$this->restoredUser = $userLogin;
	$this->connect->query('USE `personal_data`');
	$this->connect->beginTransaction();
	try{
	    $stmnt->$this->connect->prepare('SELECT `userLogin`, `userStatus`, `autorized_date` FROM `users` WHERE `userLogin`=? ;');
	    $stmnt->bindParam( 1, $this->restoredUser );
	    if( $stmnt->execute() ){
		$this->connect->commit();
		$result = $stmnt-fetch(PDO::FETCH_ASSOC);
	    }
	} catch (PDOException $e) {
	    $stmnt->rollBack();
	    return 'ERROR: '.$e->getMessage();
	}
	if($result){
	    $this->activateAutorization( $result );
	    return true;
	} else {
	    return false;
	}
	
    }

    function autorization(){
	$hashedName = sha1( $this->userName );
	$firstHash 	 = sha1( $this->userPassword );
	$hash = crypt( $firstCrypt, '$2y$10$'.$cryptName.'$' );
	$this->connect->query('USE `personal_data`');
	$this->connect->beginTransaction();
	try{
	    $stmnt = $this->connect->prepare('SELECT `userLogin`,`userStatus`,`autorized_date` FROM `users` WHERE `userLogin`=? AND `userPassword`=? ;');
	    $stmnt->bindParam( 1, $this->userName );
	    $stmnt->bindParam( 2, $hash );
	    if ( $stmnt->execute() ){
		$this->connect->commit();
		$result = $stmnt->fetch(PDO::FETCH_ASSOC);
	    }
	} catch (PDOException $e){
	    $stmnt->rollBack();
	    return 'ERROR : '.$e->getMessage();
	}
	if($result){
	    $this->activateAutorization( $result );
	    return true;
	} else {
	    return false;
	}
	
    }
    
    function deactivateAutorization(){
	
	$_SESSION['autorization'] = false;
	
	
    }
    
    function activateAutorization( $array ){
	    $_SESSION['autorization'] = true;
	    $this->connect->query('USE `session_log`;');
	    $this->connect->beginTransaction();
	    try{
		$stmnt->prepare('INSERT INTO `session_list` VALUES( ?, ? , CURRENT_DATE);');
		$stmnt->bindParam(1, session_id());
		$stmnt->bindParam(2, $result['userLogin']);
		if( $stmnt->execute() ) {
		    $this->connect->commit();
		    
		}
	    } catch ( PDOException $e){
		$stmnt->rollBack();
		return 'ERROR :'.$e->getMessage();
	    }
	    $_SESSION['userLogin'] = $array['userLogin'];
	    $_SESSION['userStatus'] = $array['userStatus'];
	    $_SESSION['autorized_date'] = $array['autorized_date'];
	    //
	    $obj = autorization_check::start();
	    $obj->setCookies();
	} 
	
    }
    
}
?>