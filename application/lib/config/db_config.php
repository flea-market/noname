<?php
namespace lib\config;
class db_config{
	function getParam(){
	    $rightParam = array(
		'SERVER_NAME'	=> 'localhost',
		'USER_NAME'		=> 'root',
		'SERVER_PASSWORD'=> 'mysqlpassword',
		'DATABASE_NAME'	=> 'game'
	    );
	    return $rightParam;
	}
}
?>