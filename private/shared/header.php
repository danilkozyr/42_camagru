<?php
    if (!isset($page_title)) { $page_title = 'Camagru'; }

    $url = $_SERVER['PHP_SELF'];
    $num = substr_count($url, "/");
    
?>

<!doctype html>
    <head>
        <title><?php echo $page_title ?></title>
        <link rel="stylesheet" href="<?php echo WWW_ROOT . '/stylesheets/style.css'?>" />
        <link rel="icon" href="<?php echo WWW_ROOT .'/images/icon/icon.png'?>" >
    </head>
    <body>
    <div id="page-container">
        <div id="content-wrap">
            <table class="nav_bar">
                <th><a href="<?php echo WWW_ROOT . '/'?>">HOME</a></th>
                <th><a href="<?php echo WWW_ROOT . "/feed" ?>">FEED</a></th>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) : ?>
                <th><a href="<?php echo WWW_ROOT . '/snap'?>"><img src="<?php echo WWW_ROOT . "/images/snap.png"?>"" title="hello" width="50"></a></th>
                <th><a href="<?php echo WWW_ROOT . '/profile/'?>">PROFILE</a></th>
                <th><a href="?logout=1">LOG OUT</a></th>
                <?php 
                    if (isset($_GET['logout'])) {
                        $link = $_GET['logout'];
                        if ($link === '1')
                            require_once(PRIVATE_PATH . '/login_func/logout.php');
                    }
                    ?>
                <?php else : ?>
                <th><a href="<?php echo WWW_ROOT . '/login/'?>">LOGIN</a></th>
                <?php endif; ?>
            </table>