<?php
require("php_console.php");
PhpConsole::start();
require("global.php");
require("_bd.php");
require("session_manager.php");
validateSession();
if (isset($_SESSION['lang'])) {
	require 'languages/lang_'.$_SESSION['lang'].'.php';
}

/**
logoff: destroys session and sends back to login page
*/
function logoff() {
	gotoLoginPage();
}

?>