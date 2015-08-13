<?php

include(INCLUDES.'helpdesk.inc.php');
$template_vars = array();
$filename = CONTROLLERS.'client/'.$action.'_action.php';
if (!is_file($filename)){
	$filename = CONTROLLERS.'home_controller.php';
	$action = '404notfound';
}
include($filename);
exit;
?>