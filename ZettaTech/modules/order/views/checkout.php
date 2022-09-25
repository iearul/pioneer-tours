<main>
		<section class="hero_in general">
                    <div class="wrapper">
                        <div class="container">
                            <h1 class="fadeInUp"><span></span><?=$this->lang->line('makePayment_confirm_tour')?></h1>
                        </div>
                    </div>
                </section>
		<!--/hero_in-->

		<div class="bg_color_1">
			<div class="container margin_60_35">
                                <div class="row">
                                        <div class="col-lg-8">
                                            <div class="box_cart">
                                                <div class="form_title">
							<h3><strong>></strong>Your Details</h3>
						</div>
                                                <div class="step">
                                                    <div class="row">
                                                            <div class="col-sm-12">

                                                                    <div class="form-group">
                                                                            <label><?=$this->lang->line('tour_detail_fullname')?></label>
                                                                            <input class="form-control" type="text" name="full_name" required placeholder="<?=$this->lang->line('tour_detail_fullname')?>">
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                            <label><?=$this->lang->line('email_title')?></label>
                                                                            <input class="form-control" type="email" name="email" required placeholder="<?=$this->lang->line('email_title')?>">
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                            <label><?=$this->lang->line('tour_detail_mobile')?></label>
                                                                            <input class="form-control" type="text" name="phone" required placeholder="<?=$this->lang->line('tour_detail_mobile')?>">
                                                                    </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!--End step -->
                                            </div>
                                        </div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail">
							<div id="total_cart">
								Total <span class="float-right">€<?=$totalPrice?></span>
							</div>
							<ul class="cart_details">
								<li>Subtotal <span>€<?=$subtotalPrice?></span></li>
								<li>Fees <span>€<?=$totalFees?></span></li>
							</ul>
							<a href="order/checkout" class="btn_1 full-width purchase">Checkout</a>
							<div class="text-center"><small>No money charged in this step</small></div>
						</div>
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
	<!--/main-->