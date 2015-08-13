<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
define('HELPDESK_PATH', dirname(dirname(__FILE__)).'/');
require_once __DIR__.'/functions.php';
helpdesk_header();
?>
<p>Welcome to HelpDesk v<?php echo HELPDESK_VERSION;?>, please select the action that you want to do:</p>

    <div align="center">
        <button onclick="location.href='./install.php';">Install HelpDesk</button>
        
    </div>
<?php
helpdesk_footer();
?>