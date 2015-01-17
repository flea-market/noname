<?php
namespace apps\core;

class exceptions_core extends \Exception{
    
    function __construct($message){
	$this->message = $mesage;
    }
    
    function __toString(){
	return "Error code: ".$this->getCode()."Message: ".$this->getMessage().". File: ".$this->getFile().". Line: ".$this->getLine();
    }
}
?>