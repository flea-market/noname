<?php
namespace lib\completed_classes;
class Registry{
    private static $instance;
    private $values = array();
    private $request;
    
    private function __construct(){
    }
    
    static function instance(){
	if( !isset(self::$instance) ){
	    self::$instance = new self();
	}
	return self::$instance;
    }
    
    protected function get($key ){
	    return $this->values[$key];
    }
    
    protected function set($key, $value ){
	$this->values[$key] = $value;
    }
    
    protected function remove($key){
	unset($this->values[$key]);
    }
    
    public function isEmpty($key){
	if( !isset( $this->values[$key] ) ){
	    return true;
	}
	return false;
    }
    
    public function removeData($key){
	$variable = self::instance();
	if( $variable->isEmpty( $key ) == false ){
	    $variable->remove($key);
	}
    }
    
    static function getData($key){
	$variable = self::instance();
	if($variable->isEmpty($key)==false){
	    return $variable->get($key);
	}
    }
    
    static function setData($key, $value){
	$variable = self::instance();
	if( $variable->isEmpty( $key ) == true){
	    $variable->set($key ,$value);
	}
    }
    
}
?>