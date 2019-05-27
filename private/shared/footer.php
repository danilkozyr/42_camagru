            </div>
            <footer class="footer-basic-centered">

                <p class="footer-company-motto">The Camagru.</p>

                <p class="footer-links">
                    <a href="<?php echo WWW_ROOT . '/pages/index.php'?>">HOME</a>
                    ·
                    <?php if ($_SESSION['logged_in'] == true) : ?>
                        <th><a href="<?php echo WWW_ROOT . '/pages/profile/'?>">PROFILE</a></th>
                    <?php else : ?>
                    <a href="<?php echo WWW_ROOT . '/pages/login/'?>">LOGIN</a>
                    <?php endif; ?>
                    ·
                    <a href="#">FEED</a>
                    ·
                    <a href="#">FAQ</a>
                    ·
                    <a href="#">CONTACT</a>
                </p>

                <p class="footer-company-name">Camagru &copy; 2019</p>

            </footer>
        </div>
    </body>

</html>
