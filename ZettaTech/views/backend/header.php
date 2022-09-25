<!DOCTYPE html>
<html lang="en">
    <head>
        <!--        
        /**
         * 
         * @copyright	Copyright (c) 2017 Zettabyte Technologies.
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
        -->
        <meta charset="utf-8"/>
        <title><?=(!empty($page_title) ? $page_title.' | ' : '').$site->title?></title>
        <base href="<?=base_url()?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout4/css/custom.css" rel="stylesheet" type="text/css" />
        
        <link rel="shortcut icon" href="uploads/extra/logo/<?=$site->favicon?>"/>
        
         <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script>
        function startTime() {
            var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
            var today = new Date();
            var H = today.getHours();
            var m = today.getMinutes();
            m = checkTime(m);
            var dt=today.getDate(),
            mo=today.getMonth(),
            y=today.getFullYear();
            var a = ((H > 12) ? 'PM' : "AM");
            var h = ((H > 12) ? H - 12 : H);
            document.getElementById('nowtime').innerHTML =
            months[mo]+' '+dt+', '+y +', '+ h + ":" + m + " " + a;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
        </script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </head>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo" style="word-wrap: break-word;" onload="startTime()">
        <!-- BEGIN HEADER -->
    
        <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">
                            
                                <a href="">
                                    <img src="uploads/extra/logo/<?=$site->logo?>" alt="LOGO"  class="logo-default"/>
                                </a>
                                <div class="menu-toggler sidebar-toggler">
                                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                                </div>
                        </div>
                        <!-- END LOGO -->
                        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                        <!-- END RESPONSIVE MENU TOGGLER -->
                        <!-- BEGIN TOP NAVIGATION MENU -->
                        <div class="page-top">
                            <div class="top-menu">
                                <ul class="nav navbar-nav pull-right">
                                       <!-- BEGIN USER LOGIN DROPDOWN -->
                                        <li class="dropdown dropdown-user">                                                
                                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                    <span class="username username-hide-on-mobile"> <?=$user->first_name.' '.$user->last_name?> </span>
                                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                                    <img alt="" class="img-circle" src="<?=(file_exists('uploads/users/'.$user->avatar) && !empty($user->avatar))? 'uploads/users/'.$user->avatar : 'uploads/extra/users/zettatech.png' ?>" /> 
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-default">
                                                        <li>
                                                            <?=anchor("user/change_avatar", '<i class="fa fa-image"></i> Change Image')?>
                                                        </li>
                                                        <li>
                                                            <?=anchor("user/change_password", '<i class="icon-lock"></i> Change Password')?>
                                                        </li>
                                                        <li class="divider">
                                                        </li>
                                                        <li>
                                                            <?=anchor("user/logout", '<i class="icon-key"></i> Log Out')?>
                                                        </li>
                                                </ul>
                                        </li>
                                        <!-- END USER LOGIN DROPDOWN -->
                                </ul>
                            </div>
                        
                        </div>
                </div>
                <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li  class="nav-item start <?=($controller == 'dashboard')?'active':''?>">
                                        <?=anchor('dashboard','<span class="title">Dashboard</span>',array('class' => 'nav-link'))?>
				</li>
                                <?php if($this->ion_auth->is_admin()){ ?>
				<li class="nav-item <?=($controller == 'user')?'active open':''?>">
					<a href="javascript:;" class="nav-link nav-toggle">
					<span class="title">User</span>
					<span class="arrow <?=($controller == 'user')?'open':''?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item <?=($controller == 'user' && $method == 'all')?'active':''?>">
							<?=anchor('user/all','<span class="title"> All Users</span>')?>
						</li>
						<li class="nav-item <?=($controller == 'user' && $method == 'create')?'active':''?>">
                                                        <?=anchor('user/create','<span class="title"> Create User</span>')?>
						</li>
                                            
					</ul>
				</li>
                                <li class="nav-item  <?=($controller == 'settings')?'active':''?>">
                                        <?=anchor('settings','<span class="title">Settings</span>')?>
				</li>
                                <li class="nav-item  <?=($controller == 'privacy_policy')?'active':''?>">
                                        <?=anchor('privacy_policy/edit','<span class="title">Privacy Policy</span>')?>
				</li>
                                <li class="nav-item  <?=($controller == 'terms_and_conditions')?'active':''?>">
                                        <?=anchor('terms_and_conditions/edit','<span class="title">Terms and Conditions</span>')?>
				</li>
                                <li class="nav-item  <?=($controller == 'refund_policy')?'active':''?>">
                                        <?=anchor('refund_policy/edit','<span class="title">Refund Policy</span>')?>
				</li>
                                <?php } ?>                                
				<li class="nav-item <?=($controller == 'about')?'active open':''?>">
					<a href="javascript:;" class="nav-link nav-toggle">
					<span class="title">About</span>
					<span class="arrow <?=($controller == 'about')?'open':''?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item <?=($controller == 'about' && $method == 'origins_and_story')?'active':''?>">
							<?=anchor('about/origins_and_story','<span class="title"> Origins and Story</span>')?>
						</li>
                                            
					</ul>
				</li>      
                                <li class="nav-item <?=($controller == 'why_choose')?'active open':''?>">
					<a href="javascript:;" class="nav-link nav-toggle">
					<span class="title">Why Choose US</span>
					<span class="arrow <?=($controller == 'why_choose')?'open':''?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item <?=($controller == 'why_choose' && $method == 'all')?'active':''?>">
							<?=anchor('why_choose/all','<span class="title"> All Why Choose US</span>')?>
						</li>
						<li class="nav-item <?=($controller == 'why_choose' && $method == 'create')?'active':''?>">
                                                        <?=anchor('why_choose/create','<span class="title"> Create Why Choose US</span>')?>
						</li>
                                            
					</ul>
				</li>   
				<li class="nav-item <?=($controller == 'tour')?'active open':''?>">
					<a href="javascript:;" class="nav-link nav-toggle">
					<span class="title">Tour</span>
					<span class="arrow <?=($controller == 'tour')?'open':''?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item <?=($controller == 'tour' && $method == 'all')?'active':''?>">
							<?=anchor('tour/all','<span class="title"> All Tour</span>')?>
						</li>
						<li class="nav-item <?=($controller == 'tour' && $method == 'create')?'active':''?>">
                                                        <?=anchor('tour/create','<span class="title"> Create Tour</span>')?>
						</li>
                                            
					</ul>
				</li>   
                                <li  class="nav-item start <?=($controller == 'booking')?'active':''?>">
                                        <?=anchor('booking/all','<span class="title">Bookings</span>',array('class' => 'nav-link'))?>
				</li>
                                <li  class="nav-item start <?=($controller == 'payment')?'active':''?>">
                                        <?=anchor('payment/all','<span class="title">Payment Report</span>',array('class' => 'nav-link'))?>
				</li>
				<li class="nav-item <?=($controller == 'gallery')?'active open':''?>">
					<a href="javascript:;" class="nav-link nav-toggle">
					<span class="title">Gallery</span>
					<span class="arrow <?=($controller == 'gallery')?'open':''?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item <?=($controller == 'gallery' && $method == 'all')?'active':''?>">
							<?=anchor('gallery/all','<span class="title"> All Gallery</span>')?>
						</li>
						<li class="nav-item <?=($controller == 'gallery' && $method == 'create')?'active':''?>">
                                                        <?=anchor('gallery/create','<span class="title"> Create Gallery</span>')?>
						</li>
                                            
					</ul>
				</li>                                  
				<li class="nav-item <?=($controller == 'faq')?'active open':''?>">
					<a href="javascript:;" class="nav-link nav-toggle">
					<span class="title">FAQ</span>
					<span class="arrow <?=($controller == 'faq')?'open':''?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item <?=($controller == 'faq' && $method == 'all')?'active':''?>">
							<?=anchor('faq/all','<span class="title"> All FAQ</span>')?>
						</li>
						<li class="nav-item <?=($controller == 'faq' && $method == 'create')?'active':''?>">
                                                        <?=anchor('faq/create','<span class="title"> Create FAQ</span>')?>
						</li>
                                            
					</ul>
				</li>                              
				<li class="nav-item <?=($controller == 'slider')?'active open':''?>">
					<a href="javascript:;" class="nav-link nav-toggle">
					<span class="title">Slider</span>
					<span class="arrow <?=($controller == 'slider')?'open':''?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item <?=($controller == 'slider' && $method == 'all')?'active':''?>">
							<?=anchor('slider/all','<span class="title"> All Slider</span>')?>
						</li>
						<li class="nav-item <?=($controller == 'slider' && $method == 'create')?'active':''?>">
                                                        <?=anchor('slider/create','<span class="title"> Create Slider</span>')?>
						</li>
                                            
					</ul>
				</li>             
                                <li class="nav-item <?=($controller == 'holiday')?'active open':''?>">
					<a href="javascript:;" class="nav-link nav-toggle">
					<span class="title">Holiday</span>
					<span class="arrow <?=($controller == 'holiday')?'open':''?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item <?=($controller == 'holiday' && $method == 'all')?'active':''?>">
							<?=anchor('holiday/all','<span class="title"> All Holidays</span>')?>
						</li>
						<li class="nav-item <?=($controller == 'holiday' && $method == 'create')?'active':''?>">
                                                        <?=anchor('holiday/create','<span class="title"> Create Holiday</span>')?>
						</li>
                                            
					</ul>
				</li>   
                        </ul>
			<!-- END SIDEBAR MENU -->
		</div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
		<div class="page-content">
			
			<div class="page-head">
				
				<div class="page-toolbar">
					<div class="btn-group pull-right padding-bottom-20">
						<button type="button" class="btn btn-fit-height grey-salt">
                                                    <i class="fa fa-calendar"></i> <span id="nowtime"></span>
						</button>
						
					</div>
				</div>
			</div>
                        <?php if(!empty($message)){ ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                            <strong>Success!</strong> <?=$message?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if(!empty($message_error)){ ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                            <strong>Error!</strong> <?=$message_error?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>