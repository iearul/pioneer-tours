<?php
        /**
         * 
         * @copyright	Copyright (c) 2019 Zettabyte Technologies.
         * @Created     16/08/2019
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
?>
            <main>
                <!-- Slider -->
		<div id="full-slider-wrapper">
			<div id="layerslider" style="width:100%;height:750px;">
				<!-- first slide -->
                                <?php foreach ($sliders as $slider){ ?>
				<div class="ls-slide" data-ls="slidedelay: 5000; transition2d:85;">
					<img src="uploads/contents/<?=$slider->image?>" class="ls-bg" alt="Vatican Tickets">
					<h3 class="ls-l slide_typo" style="top: 47%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                                            <?=$this->lang->line('home_slider_title')?>
                                        </h3>
					<p class="ls-l slide_typo_2" style="top:55%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
						<?=$this->lang->line('home_slider_description')?>
					</p>
				</div>
                                <?php } ?>
			</div>
		</div>
		<!-- End layerslider -->
                
                <!-- /hero_single -->

                <div class="container-fluid margin_80_0">
                    <div class="main_title_2">
                        <span><em></em></span>
                        <h2><?=$this->lang->line('home_popular_tour_title')?></h2>
                        
                    </div>
                    <div id="reccomended" class="owl-carousel owl-theme">
                        
                        <!-- /item -->
                        <?php foreach ($tours as $tour){ ?>
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="tour/detail/<?=$tour['url']?>"><img src="uploads/contents/<?=(!empty($tour_images[$tour['url']]) ? $tour_images[$tour['url']] : '')?>" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
						</figure>
						<div class="wrapper">
							<h3><a href="tour/detail/<?=$tour['url']?>"><?=$tour['t_'.$zetta_language]?></a></h3>
							<span class="price"><?=$this->lang->line('tour_from')?> <strong>€<?=$tour['price_adult']?></strong> / <?=$this->lang->line('tour_per_person')?></span>
						</div>   
                                                <?php if(!empty($tour['duration'])){ ?>
						<ul>
							<li><i class="icon_clock_alt"></i> <?=$tour['duration']?></li>
							<li></li>
						</ul>
                                                <?php } ?>
					</div>
				</div>
				<!-- /box_grid -->
                            <?php } ?>
                    </div>
                    <!-- /carousel -->
                    <div class="container">
                        <p class="btn_home_align"><a href="tour" class="btn_1 rounded">View all Tours</a></p>
                    </div>
                    <!-- /container -->
                    <hr class="large">
                </div>
                <!-- /container -->

                <div class="call_section" style="background: url(../assets/frontend/img/upload/us.jpg) center center no-repeat fixed;">
                    <div class="container clearfix">
                        <div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
                            <div class="block-reveal">
                                <div class="block-vertical"></div>
                                <div class="box_1">
                                    <h3>Enjoy a GREAT travel with us</h3>
                                    <p>We treats our clients as guest and will provide best quality services to explore the Rome and Vatican Museum with sincerity and honesty</p>
                                    <a href="about" class="btn_1 rounded">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/call_section-->
            </main>
            <!-- /main -->
            