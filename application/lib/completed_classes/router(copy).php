<?php
namespace lib\completed_classes;
use lib\completed_classes\route_config as route_config;

class Router{
  
  private function __construct(){
    $this->errorController		= 'application/apps/controllers/error_404';
    $this->defaultPath			= 'application/apps/controllers';
    $this->defaultController 	= 'application/apps/controllers/index';
  }
  
  static function start(){
    $instanse = new Router(); 
    $instanse->setPath();
    $instanse->getController();
  }
  
  function setPath(){
    $routing = new route_config();
    $parametres = $routing->getParam();
    $this->controller_name = 'index';
    $this->defaultAction = 'defaultAction';
    /**/
	$variable = $_SERVER['REQUEST_URI'];
	$variable = trim($variable, '/\\');
	$variable = explode('/',$variable);
	array_shift($variable);
	if( isset( $variable[4] ) ){
	    $this->action_name = $variable[4];
	}
	if( isset( $variable[3] ) ){
	    $this->controller_name = $variable[3];
	if( isset( $this->controller_name ) ){
	    $selectedController = $this->defaultPath.'/'.$this->controller_name;
	    foreach( $parametres as $key=>$value){
		if( $selectedController == $value){
		    $this->controller = $selectedController.'.php';
		    break;
		} else {
		    $this->controller = $this->errorController.'.php';
		}
	    }
	}    
	} else {
	    $this->controller = $this->defaultController.'.php';
	}
    
  }
  
  function getController(){
	require_once($this->controller);
	echo $this->controller;
	$controller = new $this->controller_name();
	if( isset( $this->action_name ) ){
	if( method_exists( $controller, $this->action_name ) ){
	    $method = $this->action_name;
	    $controller->$method();
	}
	} else {
		$controller->defaultAction();
	}
  }
  
}

?> 