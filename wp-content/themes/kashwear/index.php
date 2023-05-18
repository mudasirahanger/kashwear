<?php get_header(); ?>
<div id="main-nav" class="nav-row">
    <div class="mobile-features">
        <form class="mobile-search" action="/search" method="get">
            <i></i>
            <input type="text" name="q" placeholder="Search">
            <button type="submit" class="notabutton"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="multi-level-nav">
        <div class="tier-1">
                 <?php
                   display_menu_items();
                    ?>         
            <div class="mobile-social">
                <div class="social-links">
                    <ul>
                        <li class="facebook"><a href="https://facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li class="pinterest"><a href="https://pinterest.com/" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li class="instagram"><a href="https://instagram.com/" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>

            <ul>
                <li class="account-links">
                    <span class="register"><a href="wp-login.php?action=register" id="customer_register_link">Register</a></span> <span class="slash">/</span>
                    <span class="login"><a href="wp-login.php" id="customer_login_link">Log in</a></span>

                </li>
            </ul>
        </div>
    </div>
</div>
<?php get_html_modules(); ?>
<?php get_footer(); ?>