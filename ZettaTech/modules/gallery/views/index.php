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
					<h1 class="fadeInUp"><span></span><?=$this->lang->line('gallery_title')?></h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="grid">
				<ul class="magnific-gallery">
                                    <?php foreach ($gallerys as $gallery):?>
					<li>
						<figure>
							<img src="uploads/contents/<?=$gallery->image?>" alt="">
							<figcaption>
								<div class="caption-content">
									<a href="uploads/contents/<?=$gallery->image?>" data-effect="mfp-zoom-in">
										<i class="pe-7s-albums"></i>
									</a>
								</div>
							</figcaption>
						</figure>
					</li>
                                    <?php endforeach;?>
				</ul>
			</div>
			<!-- /grid gallery -->
		</div>
		<!-- /container -->
		
	</main>
	<!--/main-->