<!DOCTYPE html>
<html lang="en">
        <!--        
        /**
         * 
         * @copyright	Copyright (c) 2017 Zettabyte Technologies.
         * @Created     19/03/2017
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
        -->
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <title><?=$site->title?> | <?=$page_title?></title>
        <base href="<?=base_url()?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="uploads/extra/logo/<?=$site->favicon?>"/>
        <style>
            .login .content {
                background-color: #eceef1;
            }
            .login {
                background-color: #ffffff !important;
            }
        </style>
    </head>
    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="">
                <img src="uploads/extra/logo/<?=$site->logo?>" style="max-height: 200px;max-width: 200px;" alt=""/>
            </a>
        </div>
        <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <?=form_open('user/reset_password/' . $code, array('class' => 'login-form'))?>
            <?php echo form_input($username);?>
            <?php echo form_hidden($csrf); ?>
                    <h3 class="form-title">Reset Password</h3>
                    <?php if(!empty($message)){ ?>
                        <div class="alert alert-success">
                            <button class="close" data-close="alert"></button>
                            <span>
                            <?=$message?> </span>
                        </div>
                    <?php }if(!empty($message_error)){ ?>
                    <div class="alert alert-danger">
                            <button class="close" data-close="alert"></button>
                            <span>
                            <?=$message_error?> </span>
                    </div>
                    <?php } ?>
                    <p>
                            At least 8 characters long.
                    </p>
                     <div class="form-group">
                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                            <label class="control-label visible-ie8 visible-ie9">New Password</label>
                            <div class="input-icon">
                                    <i class="fa fa-lock"></i>
                                    <?=form_input($new_password)?>
                            </div>
                    </div>
                    
                    <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Confirm New Password</label>
                            <div class="input-icon">
                                    <i class="fa fa-lock"></i>
                                    <?=form_input($new_password_confirm)?>
                            </div>
                    </div>
                    <div class="form-actions">
                            <button type="submit" class="btn green pull-right">
                            Submit <i class="m-icon-swapright m-icon-white"></i>
                            </button>
                    </div>
            <?=form_close()?>
            <!-- END LOGIN FORM -->

        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
                <?=$site->copyrightYear?> &copy; <?=(!empty($site->copyrightUrl))?'<a href="'.$site->copyrightUrl.'">'.$site->copyrightText.'</a>':$site->copyrightText?> <?=(!empty($site->developedUrl))?'Developed & Maintained By <a href="'.$site->developedUrl.'">'.$site->developedText.'</a>':'Developed & Maintained By '.$site->developedText?>
        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="assets/global/plugins/respond.min.js"></script>
        <script src="assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>