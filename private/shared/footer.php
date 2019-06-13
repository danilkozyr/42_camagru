            </div>
            <footer class="footer-basic-centered">

                <p class="footer-company-motto">The Camagru</p>

                <p class="footer-links">
                    <a href="<?php echo WWW_ROOT . '/'?>">HOME</a>
                    ·
                    <a href="<?php echo WWW_ROOT . "/feed" ?>">FEED</a>
                    ·
                    <a href="<?php echo WWW_ROOT . "/snap" ?>">MAKE A SNAPSHOT</a>
                    ·
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) : ?>
                        <th><a href="<?php echo WWW_ROOT . '/profile/'?>">PROFILE</a></th>
                    <?php else : ?>
                    <a href="<?php echo WWW_ROOT . '/login/'?>">LOGIN</a>
                    <?php endif; ?>
                </p>

                <p class="footer-company-name">dkozyr &copy; 2019</p><br>

            </footer>
        </div>
    </body>

</html>
