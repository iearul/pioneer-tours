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
    <section class="hero_in contacts">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span><?= $this->lang->line('contact_us_title') ?></h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="contact_info">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <i class="pe-7s-map-marker"></i>
                    <h4><?= $this->lang->line('address_title') ?></h4>
                    <span>Via degli Scipioni 9, CAP 00192<br>ROMA-ITALY</span>
                </li>
                <li>
                    <i class="pe-7s-mail-open-file"></i>
                    <h4><?= $this->lang->line('email_title') ?></h4>
                    <span>info@pioneertours.net<br><small>Monday to Saturday 8.30am - 4.30pm</small></span>

                </li>
                <li>
                    <i class="pe-7s-phone"></i>
                    <h4><?= $this->lang->line('contact_title') ?></h4>
                    <span>+39 06 6648 3415 <br><small>Monday to Saturday 7.30am - 4.30pm</small></span>
                </li>
            </ul>
        </div>
    </div>
    <!--/contact_info-->

    <div class="bg_color_1">
        <div class="container margin_80_55">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="map_contact">
                    </div>
                    <!-- /map -->
                </div>
                <div class="col-lg-6">
                    <h4><?= $this->lang->line('send_a_message_title') ?></h4>
                    <div id="message-contact"></div>
                    <form method="post" action="assets/contact.php" id="contactform" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" id="name_contact" name="name_contact">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input class="form-control" type="text" id="lastname_contact" name="lastname_contact">
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" id="email_contact" name="email_contact">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input class="form-control" type="text" id="phone_contact" name="phone_contact">
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" id="message_contact" name="message_contact" style="height:150px;"></textarea>
                        </div>
                        <p class="add_top_30"><input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact"></p>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->
</main>
<!--/main-->