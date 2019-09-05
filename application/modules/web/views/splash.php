<!DOCTYPE html>
<html lang="en">
    <head>
        <!--- Basic Page Needs  -->
        <meta charset="utf-8">
        <title><?php echo SMS; ?></title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Mobile Specific Meta  -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/fontawesome-all.min.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/animate.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/meanmenu.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/jquery.fancybox.min.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/style.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/responsive.css">
        <!--<link rel="stylesheet" href="<?php echo CSS_URL; ?>front/rtl.css">-->
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/png" href="<?php echo IMG_URL; ?>front/favicon.ico">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>

    <body>
        <div id="preloader"></div>
        <div class="login-area bg-with-black">
            <div class="container login-area-all-box">
                <div class="row">
                    
                    <?php if(isset($schools) && !empty($schools)){ ?> 
                        <?php foreach($schools as $obj ){ ?> 
                    
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 login-box-col">
                                <div class="single-login-box">
                                    <h2 class="title"><?php echo $obj->school_name; ?></h2>
                                    <div class="links">
                                        <a class="link glbscl-link-btn hvr-bs" href="<?php echo site_url('school/'.$obj->id); ?>"><?php echo $this->lang->line('visit'); ?> <?php echo $this->lang->line('school'); ?></a>
                                        <a class="link glbscl-link-btn hvr-bs float-right" href="<?php echo site_url('login'); ?>"><?php echo $this->lang->line('login'); ?> <?php echo $this->lang->line('school'); ?></a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="<?php echo JS_URL; ?>front/jquery-3.3.1.min.js"></script>
        <script src="<?php echo JS_URL; ?>front/jquery-ui.js"></script>
        <script src="<?php echo JS_URL; ?>front/owl.carousel.min.js"></script>
        <script src="<?php echo JS_URL; ?>front/jquery.counterup.min.js"></script>
        <script src="<?php echo JS_URL; ?>front/jquery.meanmenu.js"></script>
        <script src="<?php echo JS_URL; ?>front/jquery.fancybox.min.js"></script>
        <script src="<?php echo JS_URL; ?>front/jquery.scrollUp.js"></script>
        <script src="<?php echo JS_URL; ?>front/jquery.waypoints.min.js"></script>
        <script src="<?php echo JS_URL; ?>front/popper.min.js"></script>
        <script src="<?php echo JS_URL; ?>front/bootstrap.min.js"></script>
        <script src="<?php echo JS_URL; ?>front/theme.js"></script>
    </body>
</html>
