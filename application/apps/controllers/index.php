<?
namespace apps\controllers;
class Index{
  
    public function defaultAction() {
	echo " default action index.php";
      
    }
    function somemethod(){
	echo __METHOD__.' in defalut controller';
    }


}
?>