<?php

error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once __DIR__.'/functions.php';
include('../includes/global.php');
include(INCLUDES.'helpdesk.inc.php');
function helpdeskz_notneedupdate()
{
    helpdeskz_header();
    echo 'You are using the lastest version of HelpDeskZ, you do not need to make an upgrade.';
    helpdeskz_footer();
}
function helpdeskz_upgradecompleted()
{
    helpdeskz_header();
    echo 'Your helpdesk has been successfully upgraded to version '.HELPDESKZ_VERSION.'.';
    helpdeskz_footer();
}
function helpdeskz_startupgrade()
{
    helpdeskz_header();
    echo 'Your HelpDeskZ will be updated to version <strong>'.HELPDESKZ_VERSION.'</strong>, please click in the button below to start with this process.';
    echo '<div align="center"><button onclick="location.href=\'./upgrade.php?process=start\';">Upgrade my HelpDeskZ</button></div>';
    helpdeskz_footer();
}

function helpdeskz_102(){
    global $db;
    $db->query("INSERT INTO `".TABLE_PREFIX."settings` (`field` ,`value`)VALUES ('facebookoauth', '0');");
    $db->query("INSERT INTO `".TABLE_PREFIX."settings` (`field` ,`value`)VALUES ('facebookappid', NULL), ('facebookappsecret', NULL);");
    $db->query("INSERT INTO `".TABLE_PREFIX."settings` (`field` ,`value`)VALUES ('googleoauth', '0');");
    $db->query("INSERT INTO `".TABLE_PREFIX."settings` (`field` ,`value`)VALUES ('googleclientid', NULL), ('googleclientsecret', NULL);");
    $db->query("INSERT INTO `".TABLE_PREFIX."settings` (`field` ,`value`)VALUES ('socialbuttonnews', '0');");
    $db->query("INSERT INTO `".TABLE_PREFIX."emails` (`id`, `orderlist`, `name`, `subject`, `message`) VALUES
    ('staff_ticketnotification', 6, 'New ticket notification to staff', 'New ticket notification', 'Dear %staff_name%,\r\n\r\nA new ticket has been created in department assigned for you, please login to staff panel to answer it.\r\n\r\n\r\nTicket Details\r\n---------------\r\n\r\nTicket ID: %ticket_id%\r\nDepartment: %ticket_department%\r\nStatus: %ticket_status%\r\nPriority: %ticket_priority%\r\n\r\n\r\nHelpdesk: %helpdesk_url%');");
    $db->query("INSERT INTO `".TABLE_PREFIX."settings` (`field` ,`value`)VALUES ('socialbuttonkb', '0');");
    $db->query("ALTER TABLE `".TABLE_PREFIX."staff` ADD `newticket_notification` SMALLINT( 1 ) NOT NULL DEFAULT '0';");
    $db->update(TABLE_PREFIX."settings", array('value' => '1.0.2'), "field='helpdeskz_version'");
}

if($settings['helpdeskz_version'] >= HELPDESKZ_VERSION)
{
    if($_GET['process'] == 'completed')
    {
        helpdeskz_upgradecompleted();
    }else{
        helpdeskz_notneedupdate();
    }
}else{
    if($_GET['process'] == 'start')
    {
        if($settings['helpdeskz_version'] == '1.0')
        {
            helpdeskz_102();
            header('location: upgrade.php?process=completed');
            exit;
        }
    }else{
        helpdeskz_startupgrade();
    }
}
