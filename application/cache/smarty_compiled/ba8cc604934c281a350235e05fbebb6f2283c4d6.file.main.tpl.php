<?php /* Smarty version Smarty-3.1.18, created on 2018-12-15 13:56:45
         compiled from "E:\xampp\htdocs\odontos\application\views\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6099827365c14cfdd9d3973-26039054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba8cc604934c281a350235e05fbebb6f2283c4d6' => 
    array (
      0 => 'E:\\xampp\\htdocs\\odontos\\application\\views\\main.tpl',
      1 => 1526285858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6099827365c14cfdd9d3973-26039054',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menumodule' => 0,
    'langsel' => 0,
    'weathercurrmodule' => 0,
    'slidermodule' => 0,
    'prmainmodule' => 0,
    'phone' => 0,
    'mobile' => 0,
    'catlistmodule' => 0,
    'servicesmodule' => 0,
    'prsecondmodule' => 0,
    'partnersmodule' => 0,
    'brandsmodule' => 0,
    'address' => 0,
    'footerformmodule' => 0,
    'socialsmodule' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5c14cfddb42cd8_20099660',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c14cfddb42cd8_20099660')) {function content_5c14cfddb42cd8_20099660($_smarty_tpl) {?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1440,target-densitydpi=device-dpi" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Odontos</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Odontos"/>
    <link rel="shortcut icon" href="<?php echo URL::base(true);?>
html/favicon.ico" type="image/ico" />
    <link rel="address bar icon" href="<?php echo URL::base(true);?>
html/favicon.ico" type="image/ico" />
    <link rel="stylesheet" href="<?php echo URL::base(true);?>
html/fonts/fonts.css">
    <link rel="stylesheet" href="<?php echo URL::base(true);?>
html/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo URL::base(true);?>
html/css/lightslider.css">
    <link rel="stylesheet" href="<?php echo URL::base(true);?>
html/css/slick.css">
    <link rel="stylesheet" href="<?php echo URL::base(true);?>
html/css/custom.css?v=4">
    <link rel="stylesheet" href="<?php echo URL::base(true);?>
html/css/stylep.css">
	  <link rel="stylesheet" href="<?php echo URL::base(true);?>
html/css/weather-icon-animated.css">   
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
<div class="balls">
	<div id="particles-js"></div>
</div>
<nav class="navbar navbar-default navbar-odon mainnav">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo URL::base(true);?>
">
                <img src="<?php echo URL::base(true);?>
html/img/logo.png" alt="odontos logo">
            </a>
        </div>


        <div class="collapse navbar-collapse" id="menu">
              <?php echo $_smarty_tpl->tpl_vars['menumodule']->value;?>

              <?php echo $_smarty_tpl->tpl_vars['langsel']->value;?>

        </div>
    </div>
</nav>

<?php echo $_smarty_tpl->tpl_vars['weathercurrmodule']->value;?>


<section id="top">
    <div class="container-fluid padding-clear">
		<div class="slider-cover"></div>
        <?php echo $_smarty_tpl->tpl_vars['slidermodule']->value;?>

    </div>
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="contact-romb">
                <div class="contact-romb-fl">
                    <div class="vertical-center">
                        <?php echo $_smarty_tpl->tpl_vars['prmainmodule']->value;?>

                    </div>
                </div>
            </div>
          <!--  <div class="call-center">
                <img src="<?php echo URL::base(true);?>
html/img/ph-call3.png">
                <a href="tel:<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" class="number"><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</a>
                <a href="tel:<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
" class="number"><?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
</a>
            </div>-->

            <div class="row technic-side">
                <div class="col-xs-2"></div>
                <div class="col-xs-5 text-right vertical-center">
                    <div class="text-center technic-block">
                        <img src="<?php echo URL::base(true);?>
html/img/tri.jpg" height="190" alt="Tri">
                    </div>
                </div>
                <div class="col-xs-5 vertical-center">
                    <div class="text-center technic-block">
                        <img src="<?php echo URL::base(true);?>
html/img/dentis.jpg" height="190" alt="Dentis">
                    </div>
                </div>
            </div>

            <div class="row industrail-side">
                <!--<div class="col-xs-2"></div>-->
                <div class="col-xs-12">
                    <?php echo $_smarty_tpl->tpl_vars['catlistmodule']->value;?>

                </div>
            </div>
        </div>
    </div>


    <?php echo $_smarty_tpl->tpl_vars['servicesmodule']->value;?>

    <?php echo $_smarty_tpl->tpl_vars['prsecondmodule']->value;?>



    <div class="row padding110-73 testimonialsArea" style="padding-top:40px;padding-bottom: 40px;">
        <div class="col-xs-12">
            <h2 class="heading-text"><?php echo __("Distribution",null);?>
</h2>
        </div>

        <div class="col-xs-12 pager-default">
            <?php echo $_smarty_tpl->tpl_vars['partnersmodule']->value;?>

        </div>
    </div>
</div>

<footer>
    <div class="container-fluid footer-back">
        <div class="row padding60-100">
            <div class="col-xs-3">
                <div class="footer-left">
                    <div class="heading"><?php echo __("Products",null);?>
</div>
                    <?php echo $_smarty_tpl->tpl_vars['brandsmodule']->value;?>

                </div>
            </div>
            <div class="col-xs-3">
                <div class="footer-main">
                    <div class="heading"><?php echo __("Working time",null);?>
</div>
                    <div class="media" style="margin-bottom: 25px;">
                        <div class="media-left">
                            <img src="<?php echo URL::base(true);?>
html/img/icon/time.png">
                        </div>
                        <div class="media-body" style="vertical-align: middle;">
                            <p class="media-text-2"><span class="bold-text"><?php echo __("Monday - Friday",null);?>
:</span> 9.00 - 18.00</p>
                            <p class="media-text-2"><span class="bold-text"><?php echo __("Saturday",null);?>
:</span> 11.00 - 15.00</p>
                        </div>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5110.819201971738!2d49.95764225846348!3d40.38865890676695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403063692ffb131b%3A0xbe31e39ed9fb72cc!2sOdontos+LTD!5e0!3m2!1sru!2s!4v1516878961408" height="184" frameborder="0" style="border:0;width: 100%;" allowfullscreen></iframe>
                    <p class="address-footer"><span class="bold-text"><?php echo __("Address",null);?>
:</span> <?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</p>
                </div>
            </div>
            <div class="col-xs-1"></div>
            <div class="col-xs-4">
                <div class="footer-main">
                    <div class="heading" style="margin-bottom: 25px;"><?php echo __("Testimonials",null);?>
</div>
                        <?php echo $_smarty_tpl->tpl_vars['footerformmodule']->value;?>

                    <div class="media" style="float: left;margin-top: 15px;">
                            <?php echo $_smarty_tpl->tpl_vars['socialsmodule']->value;?>


                        <div class="media-body" style="vertical-align: middle;">
                            <p class="footer-text"><?php echo __("Copyright",null);?>
</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-1">

            </div>
        </div>
    </div>
</footer>
<script src="<?php echo URL::base(true);?>
html/js/bootstrap.js"></script>
<script src="<?php echo URL::base(true);?>
html/js/lightslider.js"></script>
<script src="<?php echo URL::base(true);?>
html/js/custom.js"></script>
<script src="<?php echo URL::base(true);?>
html/js/particles.js"></script>
<script src="<?php echo URL::base(true);?>
html/js/app.js"></script>
<script src="<?php echo URL::base(true);?>
html/js/slick.min.js"></script>
<script>
$(function(){
	$('.animated-text').fadeIn(500);
	$('ul.slide-list li').each(function(k,val){
		var tm = k*500;
		console.log(tm);
		$(this).delay(tm).slideDown(300);
	});
});
    $('#slider').lightSlider({
        item:1,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        pager:true,
        auto: true,
        loop:true,
        pause:10000,
        adaptiveHeight:true,
        controls: false,
        responsive : [
            {
                breakpoint:468,
                settings: {
                    item:1,
                    slideMove:1
                }
            }
        ]
    });
    $('#partners').slick({
          infinite: true,
          dots: false,
          slidesToShow: 4,
          slidesToScroll: 4,
          autoplay: true,
          autoplaySpeed: 6000,
          speed: 10,
          prevArrow: '<span class="glyphicon glyphicon-chevron-left slick-prev"></span>',
          nextArrow: '<span class="glyphicon glyphicon-chevron-right slick-next"></span>',
          //useTransform: true,
         // cssEase: 'cubic-bezier(0.600, -0.280, 0.735, 0.045)',
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]          
    });
    $('#testimonials').slick({
          infinite: true,
          dots: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 6000,
          speed: 1000,
          prevArrow: '<span class="glyphicon glyphicon-chevron-left slick-prev"></span>',
          nextArrow: '<span class="glyphicon glyphicon-chevron-right slick-next"></span>',      
    });
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script async type="text/javascript" src="//userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/a483d68961bc61c9691bdfa3f117d7d85fbd173df7ac7f39f85c0834ef7f5553.js"></script>
</body>
</html><?php }} ?>
