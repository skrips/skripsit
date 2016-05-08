<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Login first!</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . "assets/css/"; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . "assets/css/"; ?>simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . "assets/css/"; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . "assets/css/"; ?>uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url() . "assets/css/login/"; ?>login.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        <link href="<?php echo base_url() . "assets/css/"; ?>components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . "assets/css/"; ?>plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . "assets/css/login/"; ?>layout.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() . "assets/css/login/"; ?>default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url() . "assets/css/login/"; ?>custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="menu-toggler sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGO -->
        <div class="logo">
            <h2 style="color: white;">Welcome back!</h2>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="<?php echo base_url()."Ctl/priv";?>" method="post">
                <h3 class="form-title">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>
                        Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" autofocus="TRUE"/>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
                </div>
                <div class="form-actions">
                    <button type="submit" class="form-control btn btn-success uppercase">Login</button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright">
            2016 © Nur Hidayat. Admin Dashboard Template.
        </div>
        <script src="<?php echo base_url() . "assets/js/"; ?>jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() . "assets/js/"; ?>jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() . "assets/js/"; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() . "assets/js/"; ?>jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() . "assets/js/"; ?>uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() . "assets/js/"; ?>jquery.cokie.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url() . "assets/js/"; ?>jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url() . "assets/js/"; ?>metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url() . "assets/js/"; ?>layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url() . "assets/js/"; ?>demo.js" type="text/javascript"></script>
        <script src="<?php echo base_url() . "assets/js/"; ?>login.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            jQuery(document).ready(function() {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                Login.init();
                Demo.init();
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>