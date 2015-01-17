<?php
use lib\completed_classes\router;
use lib\completed_classes\registry;
function myAutoloader($class){
    $class = str_replace('\\','/',$class).'.php';
    require_once($class);
}
spl_autoload_register('myAutoloader');
router::start();
registry::instance();

?>