<?php
namespace lib\config;
class dbConfig{
	function getParam(){
	    $rightParam = array(
		'SERVER'		=> 'localhost',
		'USER'		=> 'root',
		'PASSWORD'	=> '',
		'DBNAME'	=> ''
	    );
	    return $rightParam;
	}
}
?>