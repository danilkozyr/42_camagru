<?php
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . '/public');
    define("SHARED_PATH", PRIVATE_PATH . '/shared');
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    session_start();
    // $public_end = strpos($_SERVER['SCRIPT_NAME'], '/index.php') + 7;
    // $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $pub lic_end);
    // $doc_root = str_replace("index.php", "", $public_end);
    define("WWW_ROOT", $doc_root);
    require_once(PRIVATE_PATH . '/login_func/send_email.php');
?>
