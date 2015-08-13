<?php

if($staff['admin'] != 1){
	$filename = CONTROLLERS.'home_controller.php';
	$action = '404notfound';
	include($filename);
	exit;
}
if($params[0] == ''){
	header('location: '.getUrl($controller,$action,array('general')));
	exit;
}else{
	$pagerequest = $params[0];
}
$filename = CONTROLLERS.'admin/'.$pagerequest.'_action.php';
if (!is_file($filename)){
	$filename = CONTROLLERS.'home_controller.php';
	$action = '404notfound';
}
include($filename);
exit;
?>