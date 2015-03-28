<?php
namespace apps\core;
use lib\completed_classes\registry;
class section_core{
    function getConnect(){
	Registry::instance();
	$this->connect = Registry::getData('MySQL_Connect');
    }
}
?>