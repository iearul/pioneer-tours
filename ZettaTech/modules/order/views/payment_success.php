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
		<div class="hero_in cart_section last">
			<div class="wrapper">
				<div class="container">
					<!-- End bs-wizard -->
					<div id="confirm">
						<h4><?=$this->lang->line('paymentSuccess_success')?></h4>
						<?php foreach($order_details as $order_detail){ ?>
                                                <p><?=$this->lang->line('paymentSuccess_id')?> <?=$order_detail->tourID?> - <a class="btn_1" href="order/downloadTicket/<?=$order_detail->url?>"><?=$this->lang->line('paymentSuccess_download')?></a></p>
                                                <?php } ?>
                                                <p><?=$this->lang->line('paymentSuccess_email')?></p>
					</div>
				</div>
			</div>
		</div>
		<!--/hero_in-->
	</main>
	<!--/main-->