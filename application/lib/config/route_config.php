<?php
namespace lib\config;
class route_config{
    function getParam(){
	$rigthParam = array(
	    'index'			=>	'apps/controllers/index',
	    'markets'		=>	'apps/controllers/markets',
	    'shops'		=>	'apps/controllers/shops',
	    'services'		=>	'apps/controllers/service',
	    'vacancies'		=>	'apps/controllers/vacancy',
	    'purcase'		=>	'apps/controllers/purcase',
	    'sell'			=>	'apps/controllers/sell_controller',
	    'autorization'	=>	'apps/controllers/autorization'
	    );
	return $rigthParam;
    }
}
?>