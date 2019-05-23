<?php
    if (!isset($page_title)) { $page_title = 'Camagru'; }

    $url = $_SERVER['PHP_SELF'];
    $num = substr_count($url, "/");
    
?>

<!doctype html>
    <head>
        <title><?php echo $page_title ?></title>
        <link rel="stylesheet" href="<?php echo WWW_ROOT . '/stylesheets/style.css'?>" />
    </head>
    <body>
        <table class="nav_bar">
            <th><a href="<?php echo WWW_ROOT . '/pages/index.php'?>">HOME</a></th>
            <th><a href="#">FEED</a></th>
            <th><a href="<?php echo WWW_ROOT . '/pages/login/'?>">LOGIN</a></th>
        </table>