<main>
		<section class="hero_in general">
                    <div class="wrapper">
                        <div class="container">
                            <h1 class="fadeInUp"><span></span><?=$this->lang->line('order_cart_title')?></h1>
                        </div>
                    </div>
                </section>
		<!--/hero_in-->

		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<div class="box_cart">
						<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th>
										<?=$this->lang->line('order_cart_title')?>
									</th>
									<th>
										<?=$this->lang->line('order_cart_item')?>
									</th>
									<th>
										<?=$this->lang->line('order_cart_person')?>
									</th>
									<th>
										<?=$this->lang->line('order_cart_price')?>
									</th>
								</tr>
							</thead>
							<tbody>
                                                            <?php foreach ($cart as $item){ ?>
								<tr>
									<td>
										
										<span class="item_cart"><?=$item['name']?></span>
									</td>
									<td>
										<?=($item['adult_qty']+$item['student_qty']+$item['child_qty'])?>
									</td>
									<td>
										<strong>€<?=sprintf('%0.2f', $item['price'])?></strong>
									</td>
									<td class="options" style="width:5%; text-align:center;">
										<a href="order/remove_cart/<?=$item['rowid']?>"><i class="icon-trash"></i></a>
									</td>
								</tr>
                                                            <?php } ?>
							</tbody>
						</table>
						<div class="cart-options clearfix">
							
							<div class="float-right fix_mobile">
                                                            <a href="order/cart" class="btn_1 outline"><?=$this->lang->line('order_cart_re_cart')?></a>
							</div>
						</div>
						<!-- /cart-options -->
					</div>
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail booking">
                                                    <?=form_open('order/makePayment/') ?>  
							<div class="form-group">
                                                            <input class="form-control" type="text" name="full_name" required placeholder="<?=$this->lang->line('tour_detail_fullname')?>">
								<i class="icon-user"></i>
							</div>
							<div class="form-group">
								<input class="form-control" type="email" name="email" required placeholder="<?=$this->lang->line('email_title')?>">
								<i class="icon-mail"></i>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name="phone" required placeholder="<?=$this->lang->line('tour_detail_mobile')?>">
								<i class="icon-mobile"></i>
							</div>    
							<div id="total_cart">
								<?=$this->lang->line('tour_detail_total')?> <span class="float-right">€<?=$totalPrice?></span>
							</div>
							<ul class="cart_details">
								<li><?=$this->lang->line('order_cart_subtotal')?> <span>€<?=$subtotalPrice?></span></li>
								<li><?=$this->lang->line('tour_detail_fees')?> <span>€<?=$totalFees?></span></li>
							</ul>
                                                        <button type="submit" class="btn_1 full-width purchase"><?=$this->lang->line('order_cart_checkout')?></button>
							<div class="text-center"><small><?=$this->lang->line('makePaymentDet')?></small></div>
                                                    </form>
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