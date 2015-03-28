<?php
namespace apps\core;
use lib\completed_classes\registry;
use apps\core\section_core;
use \PDO;
use \PDOException;

class profile_core extends section_core{

    function __constuct(){
	parent::getConnect(); 	// use $this->connect
    }
    /**/
    function getProfileData(){	//add parametres : mail, name , status , etc.
	$this->connect->query('USE `personal_data`');
	$this->connect->beginTransaction();
	    try{
		$stmnt = $this->connect->prepare('SELECT * FROM `users` WHERE  '); 
		/*
		$variable->bindParam();
		parametres of sql-query
		*/
		$stmnt->execute();
		$this->connect->commit();
		$result = $stmnt->fetch(PDO::FETCH_ASSOC);
		return $result;
	    } 
	    catch (PDOException $e ){
		$this->connect->rollBack();
		return 'ERROR: '.$e->getMessage();
	    }
    }
    /**/
    function addSaleAnnouncement( $array ){
	$this->connect->query('USE 	`sections`');
	$this->connect->beginTransaction();
	try{
	    $stmnt = $this->connect->prepare('INSERT INTO `sale_posts`(`post_name`,`post_author`,`date`,`sale_comments_table_name`) VALUES( ?, ?, ?, ? )');
	    $stmnt->bindParam(1, $array['post_name']);
	    $stmnt->bindParam(2, $array['post_author']);
	    $stmnt->bindParam(3, $array['date']);
	    $stmnt->bindParam(4, $array['sale_comments_table_name']);
	    $stmnt->execute();
	    $this->connect->commit();
	    return true;
	} 
	catch (PDOException $e ){
	    $this->connect->rollBack();
	    return 'ERROR: '.$e->getMessage();
	}
    }
    
    function deleteSaleAnnouncement( $author, $date){
	
    }
    /**/
    function addVacancyAnnouncement( $array ){
	$this->connect->query(' USE `sections`');
	$this->connect->beginTransaction();
	try{
	    $stmnt = $this->connect->prepare('INSERT INTO `vacancies_posts`(`post_name`,`post_author`,`date`,`vacancies_comments_table_name`) VALUES(?, ?, ?, ?)');
	    $stmnt->bindParam(1, $array['post_name']);
	    $stmnt->bindParam(2, $array['post_author']);
	    $stmnt->bindParam(3, $array['date']);
	    $stmnt->bindParam(4, $array['vacancies_comments_table_name']);
	    $stmnt->execute()
	    $this->connect->commit();
	    return true;
	} 
	catch (PDOException $e ){
	    $this->connect->rollBack();
	    return 'ERROR: '.$e->getMessage();
	}
    }
    
    function deleteVacancyAnnouncement( $author, $date ){
	
    }
    
    /**/
    function addPurchaseAnnouncement( $array ){
	$this->connect->query(' USE `sections`');
	$this->connect->beginTransaction();
	try{
	    $stmnt = $this->connect->prepare('INSERT INTO `purchase_posts`(`post_name`,`post_author`,`date`,`purchase_comments_table_name`) VALUES(?, ?, ?, ?)');
	    $stmnt->bindParam(1, $array['post_name']);
	    $stmnt->bindParam(2, $array['post_author']);
	    $stmnt->bindParam(3, $array['date']);
	    $stmnt->bindParam(4, $array['purchase_comments_table_name']);
	    $stmnt->execute()
	    $this->connect->commit();
	    return true;
	} 
	catch (PDOException $e ){
	    $this->connect->rollBack();
	    return 'ERROR: '.$e->getMessage();
	}
    }
    
    function deletePurchaseAnnouncement( $author, $date ){
	
    }
    /**/
    function addServiceAnnouncement( $array ){
	$this->connect->query(' USE `sections`');
	$this->connect->beginTransaction();
	try{
	    $stmnt = $this->connect->prepare('INSERT INTO `services_posts`(`post_name`,`post_author`,`date`,`services_comments_table_name`) VALUES(?, ?, ?, ?)');
	    $stmnt->bindParam(1, $array['post_name']);
	    $stmnt->bindParam(2, $array['post_author']);
	    $stmnt->bindParam(3, $array['date']);
	    $stmnt->bindParam(4, $array['services_comments_table_name']);
	    $stmnt->execute()
	    $this->connect->commit();
	    return true;
	} 
	catch (PDOException $e ){
	    $this->connect->rollBack();
	    return 'ERROR: '.$e->getMessage();
	}
    }
    
    function deleteServiceAnnouncement( $author, $date ){
	
    }
    /**/
    
}
?>