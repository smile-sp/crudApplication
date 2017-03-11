<?php
$route['default_controller'] = 'Solar';
$route['solar'] = 'solar';
$route['solar/create'] = 'solar/create';
 
$route['solar/edit/(:any)'] = 'solar/edit/$1';
 
$route['solar/view/(:any)'] = 'solar/view/$1';
$route['solar/(:any)'] = 'solar/views/$1';

?>
