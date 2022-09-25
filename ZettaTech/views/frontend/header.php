<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150258725-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-150258725-1');
        </script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Zettatech - Web Development.">
        <meta name="author" content="Zettabyte Technologies">
        <title><?= $site->title . (!empty($page_title) ? ' : ' . $page_title  : '') ?></title>
        <base href="<?= base_url() ?>">

        <!-- Favicons-->
        <link rel="shortcut icon" href="uploads/extra/logo/<?= $site->favicon ?>" type="image/x-icon">

        <!-- BASE CSS -->
        <link href="assets/frontend/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/frontend/css/style.css" rel="stylesheet">
        <link href="assets/frontend/css/vendors.css" rel="stylesheet">
        
        <link href="assets/frontend/layerslider/css/layerslider.css" rel="stylesheet">
        <!-- YOUR CUSTOM CSS -->
        <link href="assets/frontend/css/custom.css" rel="stylesheet">

    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSSQH7D"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <div id="page">

            <header class="header menu_fixed">
                <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
                
                <div id="logo">
                    <a href="">
                        <img src="uploads/extra/logo/<?= $site->logo ?>" width="100" data-retina="true" alt="" class="logo_normal">
                        <img src="uploads/extra/logo/<?= $site->logo ?>" width="150" height="36" data-retina="true" alt="" class="logo_sticky">
                    </a>
                </div>
                <ul id="top_menu" style="margin-bottom: 0px;">
                    <li><a href="order/cart" class="cart-menu-btn" title="Cart"><strong class="zetta-cart-count">0</strong></a></li>
                    <li class="logo_normal">
                        <div class="styled-select" id="lang-selector">
                            <select onchange="changeLanguage($(this).val())">
                                <option value="english" <?= ($zetta_language == 'english' || empty($zetta_language) ? 'selected' : '') ?>>English</option>
                                <option value="italian" <?= ($zetta_language == 'italian' ? 'selected' : '') ?>>Italiano</option>
                                <option value="spanish" <?= ($zetta_language == 'spanish' ? 'selected' : '') ?>>Español</option>
                                <option value="german" <?= ($zetta_language == 'german' ? 'selected' : '') ?>>Deutsche</option>
                                <option value="french" <?= ($zetta_language == 'french' ? 'selected' : '') ?>>Française</option>
                                <option value="russian" <?= ($zetta_language == 'russian' ? 'selected' : '') ?>>русский</option>
                            </select>
                        </div>
                    </li>
                    <li class="logo_sticky">
                        <div class="styled-select" id="lang-selector" style="background-color: #B31329;">
                            <select onchange="changeLanguage($(this).val())">
                                <option value="english" <?= ($zetta_language == 'english' || empty($zetta_language) ? 'selected' : '') ?>>English</option>
                                <option value="italian" <?= ($zetta_language == 'italian' ? 'selected' : '') ?>>Italiano</option>
                                <option value="spanish" <?= ($zetta_language == 'spanish' ? 'selected' : '') ?>>Español</option>
                                <option value="german" <?= ($zetta_language == 'german' ? 'selected' : '') ?>>Deutsche</option>
                                <option value="french" <?= ($zetta_language == 'french' ? 'selected' : '') ?>>Française</option>
                                <option value="russian" <?= ($zetta_language == 'russian' ? 'selected' : '') ?>>русский</option>
                            </select>
                        </div>
                    </li>
                </ul>
                <!-- /top_menu -->
                <a href="#menu" class="btn_mobile">
                    <div class="hamburger hamburger--spin" id="hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <nav id="menu" class="main-menu">
                    <ul>
                        <li><span><a href=""><?= $this->lang->line('menu_home') ?></a></span></li>
                        <li><span><a href="about"><?= $this->lang->line('menu_about_us') ?></a></span></li>
                        <li><span><a href="tour"><?= $this->lang->line('menu_our_tours') ?></a></span></li>
                        <li><span><a href="gallery"><?= $this->lang->line('menu_gallery') ?></a></span></li>
                        <li><span><a href="contact"><?= $this->lang->line('menu_contact') ?></a></span></li>
                        <li><span><a href="faq"><?= $this->lang->line('menu_faq') ?></a></span></li>

                    </ul>
                </nav>

            </header>
            <!-- /header -->
