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
                            <h1 class="fadeInUp"><span></span><?=$this->lang->line('faq_title')?></h1>
                        </div>
                    </div>
                </section>
                <!--/hero_in-->

                <div class="container margin_60_35">
                    <div class="row">
                        <aside class="col-lg-3" id="sidebar">
                            <div class="box_style_cat" id="faq_box">
                                <ul id="cat_nav">
                                    <li><a href="#payment" class="active"><i class="icon_document_alt"></i><?=$this->lang->line('sidebar_payments')?></a></li>
                                    <li><a href="#suggestions"><i class="icon_document_alt"></i><?=$this->lang->line('sidebar_suggestions')?></a></li>
                                    <li><a href="#reccomendations"><i class="icon_document_alt"></i><?=$this->lang->line('sidebar_recommendations')?></a></li>
                                    <li><a href="#booking"><i class="icon_document_alt"></i><?=$this->lang->line('sidebar_booking')?></a></li>
                                    <li><a href="#terms"><i class="icon_document_alt"></i><?=$this->lang->line('sidebar_tearms')?></a></li>
                                    <li><a href="#refund"><i class="icon_document_alt"></i><?=$this->lang->line('sidebar_refund')?></a></li>
                                </ul>
                            </div>
                            <!--/sticky -->
                        </aside>
                        <!--/aside -->

                        <div class="col-lg-9" id="faq">
                            <h4 class="nomargin_top"><?=$this->lang->line('sidebar_payments')?></h4>
                            <div role="tablist" class="add_bottom_45 accordion_2" id="payment">
                                <?php
                                    if(!empty($faqs['Payments'])){
                                        foreach($faqs['Payments'] as $faq){
                                ?>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse_<?=$faq['url']?>" aria-expanded="false">
                                                <i class="indicator ti-plus"></i><?=$faq['q_'.$zetta_language]?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse_<?=$faq['url']?>" class="collapse" role="tabpanel" data-parent="#payment">
                                        <div class="card-body">
                                            <p><?=$this->zettatech->textToHTML($faq['a_'.$zetta_language])?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /card -->
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                            <!-- /accordion payment -->

                            <h4 class="nomargin_top"><?=$this->lang->line('sidebar_suggestions')?></h4>
                            <div role="tablist" class="add_bottom_45 accordion_2" id="suggestions">
                                <?php
                                    if(!empty($faqs['Suggestions'])){
                                        foreach($faqs['Suggestions'] as $faq){
                                ?>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse_<?=$faq['url']?>" aria-expanded="false">
                                                <i class="indicator ti-plus"></i><?=$faq['q_'.$zetta_language]?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse_<?=$faq['url']?>" class="collapse" role="tabpanel" data-parent="#suggestions">
                                        <div class="card-body">
                                            <p><?=$this->zettatech->textToHTML($faq['a_'.$zetta_language])?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /card -->
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                            <!-- /accordion suggestions -->

                            <h4 class="nomargin_top"><?=$this->lang->line('sidebar_recommendations')?></h4>
                            <div role="tablist" class="add_bottom_45 accordion_2" id="reccomendations">
                                <?php
                                    if(!empty($faqs['Recommendations'])){
                                        foreach($faqs['Recommendations'] as $faq){
                                ?>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse_<?=$faq['url']?>" aria-expanded="false">
                                                <i class="indicator ti-plus"></i><?=$faq['q_'.$zetta_language]?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse_<?=$faq['url']?>" class="collapse" role="tabpanel" data-parent="#reccomendations">
                                        <div class="card-body">
                                            <p><?=$this->zettatech->textToHTML($faq['a_'.$zetta_language])?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /card -->
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                            <!-- /accordion Reccomendations -->

                            <h4 class="nomargin_top"><?=$this->lang->line('sidebar_booking')?></h4>
                            <div role="tablist" class="add_bottom_45 accordion_2" id="booking">
                                <?php
                                    if(!empty($faqs['Booking'])){
                                        foreach($faqs['Booking'] as $faq){
                                ?>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse_<?=$faq['url']?>" aria-expanded="false">
                                                <i class="indicator ti-plus"></i><?=$faq['q_'.$zetta_language]?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse_<?=$faq['url']?>" class="collapse" role="tabpanel" data-parent="#booking">
                                        <div class="card-body">
                                            <p><?=$this->zettatech->textToHTML($faq['a_'.$zetta_language])?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /card -->
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                            <!-- /accordion Booking -->

                            <h4 class="nomargin_top"><?=$this->lang->line('sidebar_tearms')?></h4>
                            <div role="tablist" class="add_bottom_45 accordion_2" id="terms">
                                <?php
                                    if(!empty($faqs['Terms & Conditions'])){
                                        foreach($faqs['Terms & Conditions'] as $faq){
                                ?>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse_<?=$faq['url']?>" aria-expanded="false">
                                                <i class="indicator ti-plus"></i><?=$faq['q_'.$zetta_language]?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse_<?=$faq['url']?>" class="collapse" role="tabpanel" data-parent="#terms">
                                        <div class="card-body">
                                            <p><?=$this->zettatech->textToHTML($faq['a_'.$zetta_language])?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /card -->
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                            <!-- /accordion Terms -->

                            <h4 class="nomargin_top"><?=$this->lang->line('sidebar_refund')?></h4>
                            <div role="tablist" class="add_bottom_45 accordion_2" id="refund">
                                <?php
                                    if(!empty($faqs['Refund Policy'])){
                                        foreach($faqs['Refund Policy'] as $faq){
                                ?>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse_<?=$faq['url']?>" aria-expanded="false">
                                                <i class="indicator ti-plus"></i><?=$faq['q_'.$zetta_language]?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse_<?=$faq['url']?>" class="collapse" role="tabpanel" data-parent="#refund">
                                        <div class="card-body">
                                            <p><?=$this->zettatech->textToHTML($faq['a_'.$zetta_language])?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /card -->
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                            <!-- /accordion Terms -->
                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->
                </div>
                <!--/container-->
            </main>
            <!--/main-->