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
                            <h1 class="fadeInUp"><span></span><?=$this->lang->line('tour_title')?></h1>
                        </div>
                    </div>
                </section>
                <!--/hero_in-->

                
		<div class="container margin_60_35">
			
                    <div class="wrapper-grid">
			<div class="row">
                            <?php foreach ($tours as $tour){ ?>
				<div class="col-xl-4 col-lg-6 col-md-6">
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
			<!-- /row -->
                    </div>
                    <!-- /wrapper-grid -->
			
			
			
		</div>
		<!-- /container -->
            </main>
            <!--/main-->