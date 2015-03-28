<?php
use lib\completed_classes\router;
use lib\completed_classes\registry;
use apps\core\connection_core;
use lib\completed_classes\autorization_check;
function myAutoloader($class){
    $class = str_replace('\\','/',$class).'.php';
    require_once($class);
}
spl_autoload_register('myAutoloader');
router::start();
registry::instance();
$mysql = new connection_core();
$mysql->getConfig();
$mysql->MySQLConnection();
autorization_check::start();
autorization_check::checkCookies();
?>