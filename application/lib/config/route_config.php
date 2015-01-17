<?php
namespace lib\config;
class route_config{
function getParam(){
  $rigthParam = array(
    'index'		=>	'apps/controllers/index',
    'markets'	=>	'apps/controllers/markets',
    'shops'	=>	'apps/controllers/shops',
    'services'	=>	'apps/controllers/service',
    'vacancies'	=>	'apps/controllers/vacancy',
    'purcase'	=>	'apps/controllers/purcase',
    'sale'		=>	'apps/controllers/sale'
  );
  return $rigthParam;
}
}
?>