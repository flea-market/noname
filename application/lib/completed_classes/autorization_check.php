<?php
namespace lib\completed_classes;
use apps\models\autorization_model;
use lib\completed_classes\registry;
class autorization_check{
    private static $instance;
    
    private function __construct(){
	Registry::instance();
	$this->connect = Registry::getData('MySQL_Connect');
	$this->connect->query('USE `session_log`');
    }
    
    static function start(){
	if( !isset(self::$instance) ){
	    self::$instance = new self();
	}
	return self::$instance;	
    }
    
    function setCookies(){
	
	setcookie( 'construction', session_id(), $time+3600*24*3, '/', true, true);
	
    }
    
    function checkCookies(){

	if ( isset( $_COOKIE['construction'] ) ) {
	    $this->sessionID = $_COOKIE['construction'];
	    $variable = $this->connect->prepare("SELECT `userName`,`session_id` FROM `session_list` WHERE `session_id`=( ? ); ");
	    $variable->bindParam(1, $this->sessionID, PDO::PARAM_STR );
	    $variable->execute();
	    $result = $variable->fetch(PDO::FETCH_ASSOC);
	    if( isset( $result['session_id'] ) ){
		$object = new autorization_model();
		$object->restoreUser($result['userName']);
		}
		
	    }
	    
	}
		
    }
    


?>