<?php

$getvar = $_SERVER['QUERY_STRING'];
if($params[0] == 'manage'){
	include(CONTROLLERS.'staff/params/news_manage.php');
}elseif($params[0] == 'insert'){
	include(CONTROLLERS.'staff/params/news_insert.php');
}elseif($params[0] == 'view'){
	include(CONTROLLERS.'staff/params/news_view.php');
}else{
	header('location: '.getUrl($controller,$action,array('manage')));
	exit;
}
?>