<footer>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-5 col-md-12 p-r-5">
                <p><img src="uploads/extra/logo/<?= $site->logo ?>" width="200" data-retina="true" alt=""></p>
                <p>The Pioneer Tours is a tour operator agency managed by a professional and experienced team and guides strives to provide its best services to the valued travelers to explore the Rome as well as Vatican Museum.</p>
                <div class="follow_us">
                    <ul>
                        <li>Follow us</li>
                        <li><a href="https://www.facebook.com/pioneertours2019/" target="_blank"><i class="ti-facebook"></i></a></li>
                        <li><a href="https://twitter.com/PioneerTours2" target="_blank"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="https://www.tripadvisor.com/Profile/pioneertours" target="_blank"><i class="ti-tumblr-alt"></i></a></li>
                        <li><a href="https://www.pinterest.com/pioneertours2019/" target="_blank"><i class="ti-pinterest"></i></a></li>
                        <li><a href="https://www.instagram.com/pioneertours2019/" target="_blank"><i class="ti-instagram"></i></a></li>
                    </ul>
                </div>

                <ul id="footer-selector">
                    
                    <li><img src="assets/frontend/img/upload/credit_logos3.svg" alt=""></li>
                    <li><img src="assets/frontend/img/upload/sectigo_trust_seal_sm_2x.png" alt=""></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 ml-lg-auto">
                <h5>Useful links</h5>
                <ul class="links">
                    <li><span><a href=""><?= $this->lang->line('menu_home') ?></a></span></li>
                    <li><span><a href="about"><?= $this->lang->line('menu_about_us') ?></a></span></li>
                    <li><span><a href="tour"><?= $this->lang->line('menu_our_tours') ?></a></span></li>
                    <li><span><a href="gallery"><?= $this->lang->line('menu_gallery') ?></a></span></li>
                    <li><span><a href="contact"><?= $this->lang->line('menu_contact') ?></a></span></li>
                    <li><span><a href="faq"><?= $this->lang->line('menu_faq') ?></a></span></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5>Contact with Us</h5>
                <ul class="contacts">
                    <li><a href="tel://61280932400"><i class="ti-mobile"></i> +39 06 6648 3415</a></li>
                    <li><a href="mailto:info@Panagea.com"><i class="ti-email"></i> info@pioneertours.net</a></li>
                </ul>
                <div id="newsletter">
                    <h6>Newsletter</h6>
                    <div id="message-newsletter"></div>
                    <form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
                        <div class="form-group">
                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                            <input type="submit" value="Submit" id="submit-newsletter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/row-->
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <p class="text-left" style="margin-bottom: 0px;margin-top: 8px;"><?= $site->copyrightYear ?> &copy; <?= (!empty($site->copyrightUrl) ? '<a href="' . $site->copyrightUrl . '">' . $site->copyrightText . '</a>' : $site->copyrightText) ?> <?= $this->lang->line('developed_and_maintained') ?> <?= (!empty($site->developedUrl) ? '<a href="' . $site->developedUrl . '">' . $site->developedText . '</a>' : $site->developedText) ?></p>
            </div>
            <div class="col-lg-6">
                <ul id="additional_links">
                    <li><a href="terms_and_conditions"><?= $this->lang->line('terms_and_conditions_title') ?></a></li>
                    <li><a href="privacy_policy"><?= $this->lang->line('privacy_policy_title') ?></a></li>
                    <li style="margin-right: 0px;"><a href="refund_policy"><?= $this->lang->line('refund_policy_title') ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->
</div>
<!-- page -->


<div id="toTop"></div><!-- Back to top button -->

<!-- COMMON SCRIPTS -->
<script src="assets/frontend/js/jquery-2.2.4.min.js"></script>
<script src="assets/frontend/js/common_scripts.js"></script>
<script src="assets/frontend/js/main.js"></script>
<script src="assets/frontend/assets/validate.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="assets/frontend/js/jquery.cookiebar.js"></script>
<script>
    
    var holiday = [];
    var repetHoliday = [];
                                function changeLanguage(language) {
                                    $.ajax({
                                        type: "POST",
                                        url: "<?= site_url() ?>home/setLanguage",
                                        data: {
                                            language: language
                                        },
                                        success: function (data) {
                                            location.reload();
                                        }
                                    });
                                };
                                function getHoliday() {
                                    $.ajax({
                                        type: "GET",
                                        url: "<?= site_url() ?>holiday/getHoliday",
                                        
                                        success: function (data) {
                                            var json = jQuery.parseJSON( data );
                                            if(json.error){
                                                console.log(json.error);
                                            }
                                            else{
                                                holiday = json.holiday;
                                                repetHoliday = json.repetHoliday;
                                                console.log(holiday);
                                                console.log(repetHoliday);
                                            }
                                        }
                                    });
                                };
                                function zettaCartCount() {
                                    $.ajax({
                                        type: "GET",
                                        url: "<?= site_url() ?>order/get_cart",
                                        
                                        success: function (data) {
                                            var json = jQuery.parseJSON( data );
                                            if(json.error){
                                                console.log(json.error);
                                            }
                                            else{
                                                $('.zetta-cart-count').html(json.totalItems);
                                                console.log(json.totalItems);
                                            }
                                        }
                                    });
                                };
                                $(document).ready(function () {
                                    getHoliday();
                                    zettaCartCount();
                                    $.cookieBar({
                                        fixed: true
                                    });
                                });
</script>
<!-- DATEPICKER  -->
<script>
    var today = new Date();
    var tomorrow = new Date();
    var checkdate = new Date();
    tomorrow.setDate(today.getDate() + 1);
    $('input[name="dates"]').daterangepicker({
        "minDate": tomorrow,
        "singleDatePicker": true,
        "autoApply": true,
        parentEl: '#input_date',
        "linkedCalendars": false,
        "showCustomRangeLabel": false,
        isInvalidDate: function (date) {
            
            if ((date.format('dddd') == 'Sunday')) {
                return true;
            }
            if (holiday.includes(date.format('DD/MM/YYYY'))) {
                console.log(date.format('DD/MM/YYYY'));
                return true;
            }
            if (repetHoliday.includes(date.format('DD/MM/YYYY'))) {
                return true;
            }
        },
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    }, function (start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    });
    $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY'));
  });

  $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });
</script>

<!-- INPUT QUANTITY  -->
<script src="assets/frontend/js/input_qty.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqtLcIfRZFzenOE__f6U-e2L6wa6j_HDk"></script>
<script src="assets/frontend/js/mapmarker.jquery.js"></script>
<script src="assets/frontend/js/mapmarker_func.jquery.js"></script>
<script src="assets/frontend/layerslider/js/greensock.js"></script>
<script src="assets/frontend/layerslider/js/layerslider.transitions.js"></script>
<script src="assets/frontend/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<script src="https://kit.fontawesome.com/d1f5d6e6d9.js" crossorigin="anonymous"></script>
<script>
    'use strict';
    $('#layerslider').layerSlider({
        autoStart: true,
        navButtons: false,
        navStartStop: false,
        showCircleTimer: false,
        responsive: true,
        responsiveUnder: 1280,
        layersContainer: 1200,
        skinsPath: 'assets/frontend/layerslider/skins/'
                // Please make sure that you didn't forget to add a comma to the line endings
                // except the last line!
    });
</script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v4.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="106108210804005"
     theme_color="#B31329"
     logged_in_greeting="Hi! Do you need tickets for vatican?"
     logged_out_greeting="Hi! Do you need tickets for vatican?">
</div>

</body>
</html>