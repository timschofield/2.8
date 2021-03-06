<?php
//define the base path for all the following includes
define('CARE_BASE', substr(dirname(__FILE__),0,-15 ));


$debug = false;
if ($debug==true) {
	require_once CARE_BASE . 'classes/Log/Log.php';
	$mask = $mask = Log::MAX(PEAR_LOG_INFO);
	$conf = array ('lineFormat' => 	'%2$s [%3$s] %4$s  - %5$s:%6$s');
	$logger = Log::singleton('firebug', '', 'c2x-log', $conf );
	//$logger = Log::singleton('win', 'LogWindow', 'ident', $conf);
	$logger->setMask($mask);
	function errorHandler($code, $message, $file, $line)
	{
	    global $logger;
	
	    switch ($code) {
	    case E_WARNING:
	    case E_USER_WARNING:
	        $priority = PEAR_LOG_WARNING;
	        break;
	    case E_NOTICE:
	    case E_USER_NOTICE:
	        $priority = PEAR_LOG_NOTICE;
	        break;
	    case E_ERROR:
	    case E_USER_ERROR:
	        $priority = PEAR_LOG_ERR;
	        break;
	    default:
	        $priority = PEAR_LOG_INFO;
	    }
	
	    $logger->log($message . ' in ' . $file . ' at line ' . $line, $priority);
	}
	
	set_error_handler('errorHandler');
}

#
# Page generation time measurement
# define to 1 to measure page generation time
#
define('USE_PAGE_GEN_TIME',0);

#
# Doctors on duty change time
# Define the time when the doc-on-duty will change in 24 hours H.M format (eg. 3 PM = 15.00, 12 PM = 0.00)
#
define('DOC_CHANGE_TIME','7.30');

#
# Nurse on duty change time
# Define the time when the nurse-on-duty will change in 24 hours H.M format (eg. 3 PM = 15.00, 12 PM = 0.00)
#
define('NOC_CHANGE_TIME','7.30');

#
# Html output base 64 encryption
# Define to TRUE if you want to send the html output in base64 encrypted form
#
define('ENCRYPT_PAGE_BASE64',FALSE);

#
# SQL "no-date" values for different database types
#Define the "no-date" values for the db date field
#
define('NODATE_MYSQL','0000-00-00');
define('NODATE_POSTGRE','0001-01-01');
define('NODATE_ORACLE','0001-01-01');
define('NODATE_DEFAULT','0000-00-00');

#
# Template theme for Care2x`s own template object
# Set the default template theme
#
//$template_theme='biju';
$template_theme='default';
#
# Set the template path
#
$template_path= CARE_BASE .'gui/html_template/';
#
# ---------- Do not edit below this ---------------------------------------------
#

#
# globalize the POST, GET, & COOKIE variables
#
if (!ini_get('register_globals')) {
    $superglobals = array($_SERVER, $_ENV,
        $_FILES, $_COOKIE, $_POST, $_GET);
    if (isset($_SESSION)) {
        array_unshift($superglobals, $_SESSION);
    }
    foreach ($superglobals as $superglobal) {
        extract($superglobal, EXTR_SKIP);
    }
}
#
# Set global defines
#
if(!defined('LANG_DEFAULT')) define ('LANG_DEFAULT','en');

#
# Establish db connection
#
require_once('inc_db_makelink.php');

#
# Session configurations
#
if(!defined('NOSTART_SESSION')||(defined('NOSTART_SESSION')&&!NOSTART_SESSION)){
	# If the session is existing, destroy it. This is a workaround for php engines which are configured to session autostart = On
	if(session_id()) session_destroy();
	# Set sessions handler to "user"
	ini_set('session.save_handler','files');
	# Set transparent session id
	if(!ini_get('session.use_trans_sid')) ini_set('session.use_trans_sid',1);
	//ini_set('session.use_trans_sid',0);
	# Set session name to "sid"
	ini_set('session.name','sid');
	# Set garbage collection max lifetime
	ini_set('session.gc_maxlifetime',10800); # = 3 Hours
	# Set cache lifetime
	//ini_set('session.cache_expire',1); # = 3 Hours
	session_start();
}

#
# Set the url append data
#

if (ini_get('session.use_trans_sid')!=1) {
    define('URL_APPEND', '?sid='.$sid.'&lang='.$lang);
	$not_trans_id=true;
} else {
	# Patch to avoid missing constant
	 define('URL_APPEND', '?ntid=false&lang='.$lang);
	//define('URL_APPEND','?lang='.$lang);
	$not_trans_id=false;
}

define('URL_REDIRECT_APPEND','?sid='.$sid.'&lang='.$lang);

#
# Page generation time start
#
/*
if(defined('USE_PAGE_GEN_TIME')&&USE_PAGE_GEN_TIME){
	include(CARE_BASE .'classes/loadtime/loadtimeclass.php');
	$pgt=new loadtime();
	$pgt->start();
}
*/
//echo URL_APPEND; echo URL_REDIRECT_APPEND;
define('CARE_GUI',$httprotocol . '://' . $main_domain);

#
# Template align tags, default values
#
$TP_DIR='ltr';
