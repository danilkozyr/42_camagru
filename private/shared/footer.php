            </div>
            <footer class="footer-basic-centered">

                <p class="footer-company-motto">The Camagru</p>

                <p class="footer-links">
                    <a href="<?php echo WWW_ROOT . '/pages/index.php'?>">HOME</a>
                    ·
                    <a href="<?php echo WWW_ROOT . "/pages/feed.php" ?>">FEED</a>
                    ·
                    <a href="<?php echo WWW_ROOT . "/pages/photo.php" ?>">MAKE A SNAPSHOT</a>
                    ·
                    <?php if ($_SESSION['logged_in'] == true) : ?>
                        <th><a href="<?php echo WWW_ROOT . '/pages/profile/'?>">PROFILE</a></th>
                    <?php else : ?>
                    <a href="<?php echo WWW_ROOT . '/pages/login/'?>">LOGIN</a>
                    <?php endif; ?>
                </p>

                <p class="footer-company-name">dkozyr &copy; 2019</p><br>

            </footer>
        </div>
    </body>

</html>
