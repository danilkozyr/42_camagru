<?php
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . '/public');
    define("SHARED_PATH", PRIVATE_PATH . '/shared');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    define("WWW_ROOT", "");
    require_once(PRIVATE_PATH . '/login_func/send_email.php');
    require_once(PRIVATE_PATH . '/config/setup.php');
    // print_r($_SESSION);
?>
