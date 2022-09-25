<?php
        /**
         * 
         * @copyright	Copyright (c) 2019 Zettabyte Technologies.
         * @Created     15/09/2019
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
?>

            <main>
                <!-- Slider -->
                <section class="hero_in general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span><?=$tour['t_'.$zetta_language]?></h1>
				</div>
			</div>
		</section>
		<!-- End layerslider -->
                <div class="contact_info">
                    <div class="container">
                        <ul class="clearfix">
                            <li>
                                <h4><?=$this->lang->line('tour_detail_adult')?></h4>
                                <span><strong>€<?=$tour['price_adult']?></strong> / <?=$this->lang->line('tour_per_person')?></span>
                            </li>
                            <li>
                                <h4><?=$this->lang->line('tour_detail_student')?></h4>
                                <span><strong>€<?=$tour['price_student']?></strong> / <?=$this->lang->line('tour_per_person')?></span>
                                <br><span><?=$this->lang->line('tour_detail_student_terms')?></span>

                            </li>
                            <li>
                                <h4><?=$this->lang->line('tour_detail_child')?></h4>
                                <span><strong>€<?=$tour['price_child']?></strong> / <?=$this->lang->line('tour_per_person')?></span>
                                <br><span><?=$this->lang->line('tour_detail_child_terms')?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/contact_info-->
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<section id="description">
							<h2><?=$this->lang->line('tour_detail_description')?></h2>
							<p><?=$tour['d_'.$zetta_language]?></p>
							
						</section>
						<!-- /section -->
                                                <div class="container margin_60_35">
                                                <div class="grid">
                                                        <ul class="magnific-gallery">
                                                            <?php foreach ($tour_images as $tour_image){ ?>
                                                                <li>
                                                                        <figure>
                                                                                <img src="uploads/contents/<?=$tour_image->image?>" alt="">
                                                                                <figcaption>
                                                                                        <div class="caption-content">
                                                                                                <a href="uploads/contents/<?=$tour_image->image?>" data-effect="mfp-zoom-in">
                                                                                                        <i class="pe-7s-albums"></i>
                                                                                                </a>
                                                                                        </div>
                                                                                </figcaption>
                                                                        </figure>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                </div></div>
                                                <!-- /grid gallery -->
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail booking">			
                                                    <?=form_open('order/add_cart/'.$tour['url']) ?>  
							
                                                        <?php if($tour['type'] == 'Regular Tour'){ ?>
							<div class="form-group">
                                                                <select class="form-control" name="language" onchange="getTourTime($(this).val());" required>
                                                                    <option value=""><?=$this->lang->line('tour_detail_select_language')?></option>
                                                                    <option value="english">English</option>
                                                                    <option value="italian">Italiano</option>
                                                                    <option value="spanish">Español</option>
                                                                    <option value="german">deutsche</option>
                                                                    <option value="french">Française</option>
                                                                    <option value="russian">русский</option>
                                                                </select>
							</div> 
                                                        <?php } ?>
							<div class="form-group" id="input_date">
								<input class="form-control" type="text" name="dates" required placeholder="<?=$this->lang->line('tour_detail_when')?>...">
								<i class="icon_calendar"></i>
							</div>                                                     
							<div class="form-group">
                                                                <select class="form-control" name="time" required>
                                                                    <option value=""><?=$this->lang->line('tour_detail_select_time')?></option>
                                                                    <?php
                                                                        $tour_times = json_decode($tour['tour_time'], TRUE);
                                                                        if(!empty($tour_times['english'])){
                                                                        foreach ($tour_times['english'] as $tour_time){
                                                                    ?>
                                                                        <option value="<?=$tour_time?>"><?=$tour_time?></option>
                                                                        <?php }} ?>
                                                                </select>
							</div>
							<div class="panel-dropdown">
								<a href="#"><?=$this->lang->line('tour_detail_guests')?> <span class="qtyTotal">1</span></a>
								<div class="panel-dropdown-content right">
									<div class="qtyButtons">
										<label><?=$this->lang->line('tour_detail_adult')?></label>
										<input type="text" name="qtyInput[]" value="0">
									</div>
									<div class="qtyButtons">
										<label><?=$this->lang->line('tour_detail_student')?></label>
										<input type="text" name="qtyInput[]" value="0">
									</div>
									<div class="qtyButtons">
										<label><?=$this->lang->line('tour_detail_child')?></label>
										<input type="text" name="qtyInput[]" value="0">
									</div>
								</div>
							</div>
                                                        
                                                                <input type="hidden" name="qtyInputVal[]" value="<?=$tour['price_adult']?>">	
                                                                <input type="hidden" name="qtyInputVal[]" value="<?=$tour['price_student']?>">
                                                                <input type="hidden" name="qtyInputVal[]" value="<?=$tour['price_child']?>">
                                                        <div class="price">
							</div>
                                                        <div class="price">
                                                                <div class="zetta-price-tag"><?=$this->lang->line('tour_detail_adult')?> <span class="zetta-adult"></span></div>   
                                                                <div class="clearfix"></div>
								<div class="zetta-price-tag"><?=$this->lang->line('tour_detail_student')?> <span class="zetta-student"></span></div>   
                                                                <div class="clearfix"></div>
                                                                <div class="zetta-price-tag"><?=$this->lang->line('tour_detail_child')?> <span class="zetta-child"></span></div> 
                                                        </div>
                                                        <div class="price">
								<?=$this->lang->line('tour_detail_total')?> <span class="zetta-price"></span>
							</div>
                                                        
                                                                <button type="submit" class="btn_1 full-width purchase"><?=$this->lang->line('tour_detail_submit')?></button>
                                                    </form>    
						</div>
						<ul class="share-buttons">
							<li><a class="fb-share" href="http://www.facebook.com/sharer.php?u=https://www.pioneertours.net" target="_blank"><i class="social_facebook"></i> Share</a></li>
							<li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Tweet</a></li>
							<li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
						</ul>
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
            </main>
            <!-- /main -->
            <script>
            function  getTourTime(tourTimeLan){
                $.ajax({
                    type: "POST",
                    url: "<?= site_url() ?>tour/getTime/<?=$tour['url']?>",
                    data: {
                        language: tourTimeLan
                    },
                    success: function(data){
                        var json = jQuery.parseJSON( data );
                        if(json.error){
                            console.log(json.error);
                        }
                        else{
                            $("select[name='time']").html(json.searchData);
                        }
                    }
                });
            }
            </script>