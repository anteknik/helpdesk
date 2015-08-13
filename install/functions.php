<?php
define('HELPDESK_VERSION' , '1.0.2');
define('HELPDESK_PATH', dirname(dirname(__FILE__)).'/');
function helpdesk_header(){
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>HelpDesk ver<?php echo HELPDESK_VERSION;?> Installation</title>
        <link href="install.css" type="text/css" rel="stylesheet" />
    </head>

    <body>
    <div id="wrapper">
    <div id="logo"></div>
    <div class="login_box">
<?php
}
function helpdesk_footer(){
    ?>
    </div>
    <div class="footer">
        Helpdesk Software created by Anton Programmer
    </div>
    </div>
    </body>
    </html>
    <?php
    exit;
}