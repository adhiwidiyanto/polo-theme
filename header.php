<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <div id="wrapper">
        <header id="header">
            <div id="header-wrap">
                <div class="container">
                    <div id="logo">
                        <a href="#" class="logo"> LOGO </a>
                    </div>
                    <div id="top-search">
                        <form action="search-results-page.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Start typing & press  &quot;Enter&quot;">
                        </form>
                    </div>

                    <div class="header-extras">
                        <ul>
                            <li>
                                <!--top search-->
                                <a id="top-search-trigger" href="#" class="toggle-item">
                                    <i class="fa fa-search"></i>
                                    <i class="fa fa-close"></i>
                                </a>
                                <!--end: top search-->
                            </li>
                            <li class="hidden-xs">
                                <!--shopping cart-->
                                <div id="shopping-cart">
                                    <a href="shop-cart.html">
                                        <span class="shopping-cart-items">8</span>

                                        <i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <!--end: shopping cart-->
                            </li></ul>
                    </div>

                    <div id="mainMenu-trigger">
                        <button class="lines-button x"> <span class="lines"></span> </button>
                    </div>

                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section id="page-content" class="sidebar-left">
    