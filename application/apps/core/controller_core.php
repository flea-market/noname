<?php
namespace apps\core;
use apps\core\view_core;
use lib\completed_classes\registry;

class controller_core{
    
    function __construct(){
	$this->view = new view_core();
	registry::instance();
	$this->connect = registry::getData('MySQL_Connect');
    }
    
    function defaultAction(){}
    
    function getViewTemplates(){}
    
    function getModelData(){}
    
    function checkData(){}
}

?>