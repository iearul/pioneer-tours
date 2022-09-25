<?php
        /**
         * 
         * @copyright	Copyright (c) 2019 Zettabyte Technologies.
         * @Created     21/08/2019
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
?>

            <main>

                <section class="hero_in general">
                    <div class="wrapper">
                        <div class="container">
                            <h1 class="fadeInUp"><span></span><?=$this->lang->line('menu_about_us')?></h1>
                        </div>
                    </div>
                </section>
                <!--/hero_in-->

                <div class="container margin_80_55">
                    <div class="main_title_2">
                        <span><em></em></span>
                        <h2><?=$this->lang->line('about_why_choose')?> Pioneer Tours</h2>
                    </div>
                    <div class="row">
                        <?php foreach ($why_chooses as $why_choose){ ?>
                        <div class="col-lg-4 col-md-6">
                            <a class="box_feat">
                                <i class="<?=$why_choose['icon']?>"></i>
                                <h3><?=$why_choose['t_'.$zetta_language]?></h3>
                                <p><?=$why_choose['d_'.$zetta_language]?></p>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <!--/row-->
                </div>
                <!-- /container -->

                <div class="bg_color_1">
                    <div class="container margin_80_55">
                        <div class="main_title_2">
                            <span><em></em></span>
                            <h2><?=$this->lang->line('origins_and_story_title')?></h2>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-lg-6 wow" data-wow-offset="150">
                                <figure class="block-reveal">
                                    <div class="block-horizzontal"></div>
                                    <img src="assets/frontend/img/about_1.jpg" class="img-fluid" alt="">
                                </figure>
                            </div>
                            <div class="col-lg-5">
                                <p><?=$origins_and_story[$zetta_language]?></p>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/container-->
                </div>
                <!--/bg_color_1-->

            </main>
            <!--/main-->