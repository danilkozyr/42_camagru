<?php
    session_destroy();
    $_SESSION = array();
    header("Location:" . WWW_ROOT . "/");
?>