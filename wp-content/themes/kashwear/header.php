<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kashwear <?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700|Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:400,700|Cardo:400,400italic,700|Cardo:400,400italic,700|Lato:400,700|Lato:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles.scss.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/script.js" /></script>
</head>
<body class="template-index jsforms">
    <div id="pageheader">
        <div id="mobile-header" class="cf">
            <button class="notabutton mobile-nav-toggle"><span></span><span></span><span></span></button>
            <div class="logo">
                <a href="<?php echo home_url(); ?>" title="kashwear.com">
                    <img class="logoimage" src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="kashwear.com">
                </a>
            </div><!-- /#logo -->
        </div>
        <div class="logo-area logo-pos- cf">
            <div class="container">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>" title="kashwear.com">
                        <img class="logoimage" src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="kashwear.com">
                    </a>
                </div><!-- /#logo -->
            </div>
            <div class="util-area">
                <div class="search-box elegant-input">
                    <form class="search-form" action="https://kashwear.com/search" method="get">
                        <i class="fa fa-search"></i>
                        <input type="text" name="q" placeholder="Search" autocomplete="off">
                        <input type="submit" value="→">
                    </form>
                    <div class="results-box"></div>
                </div>
                <div class="utils">
                    <div class="social-links">
                        <ul>
                            <li class="facebook"><a href="https://facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="pinterest"><a href="https://pinterest.com/" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                            <li class="instagram"><a href="https://instagram.com/" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    
                </div><!-- /.utils -->
            </div><!-- /.util-area -->

        </div><!-- /.logo-area -->
    </div>
<!-- menu -->
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
        </div>
    </div>
</div>