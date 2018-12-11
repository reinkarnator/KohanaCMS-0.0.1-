<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1440,target-densitydpi=device-dpi" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{$title}</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Odontos"/>
    <link rel="shortcut icon" href="{URL::base(TRUE)}html/favicon.ico" type="image/ico" />
    <link rel="address bar icon" href="{URL::base(TRUE)}html/favicon.ico" type="image/ico" />
    <link rel="stylesheet" href="{URL::base(TRUE)}html/fonts/fonts.css">
    <link rel="stylesheet" href="{URL::base(TRUE)}html/css/bootstrap.css">
    <link rel="stylesheet" href="{URL::base(TRUE)}html/css/lightslider.css">
    <link rel="stylesheet" href="{URL::base(TRUE)}html/css/custom.css?v=2">
	<link rel="stylesheet" href="{URL::base(TRUE)}html/css/stylep.css">
    <link rel="stylesheet" href="{URL::base(TRUE)}html/css/slick.css">
    <link rel="stylesheet" href="{URL::base(TRUE)}html/css/animate.css">
	<link rel="stylesheet" href="{URL::base(TRUE)}html/css/weather-icon-animated.css">   
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
<div class="balls">
	<div id="particles-js"></div>
</div>
<nav class="navbar navbar-default navbar-odon">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="{URL::base(TRUE)}">
                <img src="{URL::base(TRUE)}html/img/logo.png" alt="odontos logo">
            </a>
        </div>


        <div class="collapse navbar-collapse" id="menu">
              {$menumodule}
              {$langsel}
        </div>
    </div>
</nav>



<div class="container-fluid">
    <div class="row">
        {$breadcrumb}
    </div>          
    {$content}
</div>

<footer>
    <div class="container-fluid footer-back">
        <div class="row padding60-100">
            <div class="col-xs-3">
                <div class="footer-left">
                    <div class="heading">{__("Products",NULL)}</div>
                    {$brandsmodule}
                </div>
            </div>
            <div class="col-xs-3">
                <div class="footer-main">
                    <div class="heading">{__("Working time",NULL)}</div>
                    <div class="media" style="margin-bottom: 25px;">
                        <div class="media-left">
                            <img src="{URL::base(TRUE)}html/img/icon/time.png">
                        </div>
                        <div class="media-body" style="vertical-align: middle;">
                            <p class="media-text-2"><span class="bold-text">{__("Monday - Friday",NULL)}:</span> 9.00 - 18.00</p>
                            <p class="media-text-2"><span class="bold-text">{__("Saturday",NULL)}:</span> 11.00 - 15.00</p>
                        </div>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5110.819201971738!2d49.95764225846348!3d40.38865890676695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403063692ffb131b%3A0xbe31e39ed9fb72cc!2sOdontos+LTD!5e0!3m2!1sru!2s!4v1516878961408" height="184" frameborder="0" style="border:0;width: 100%;" allowfullscreen></iframe>
                    <p class="address-footer"><span class="bold-text">{__("Address",NULL)}:</span> {$address}</p>
                </div>
            </div>
            <div class="col-xs-1"></div>
            <div class="col-xs-4">
                <div class="footer-main">
                    <div class="heading" style="margin-bottom: 25px;">{__("Testimonials",NULL)}</div>
                    {$footerformmodule}
                    <div class="media" style="float: left;margin-top: 15px;">
                        {$socialsmodule}

                        <div class="media-body" style="vertical-align: middle;">
                            <p class="footer-text">{__("Copyright",NULL)}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-1">

            </div>
        </div>
    </div>
</footer>
<script src="{URL::base(TRUE)}html/js/bootstrap.js"></script>
<script src="{URL::base(TRUE)}html/js/slick.min.js"></script>
<script src="{URL::base(TRUE)}html/js/custom.js"></script>
<script>
$(function(){
// $(window).scroll(function(){
  $('div.innerItems').each(function(k){                         
    if(($(window).scrollTop() + $(window).height()) > $(this).offset().top ){
            if (k % 2 == 0) {
              $(this).addClass('animated fadeInLeft');
            } else {
              $(this).addClass('animated fadeInRight');
            }  
    }                         
  });           

  $('div.innerItems article').each(function(z){                         
    if(($(window).scrollTop() + $(window).height()) > $(this).offset().top ){
            if (z % 2 == 0) {
              $(this).addClass('animated fadeInLeft');
            } else {
              $(this).addClass('animated fadeInRight');
            }  
    }                         
  }); 
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
<script src="{URL::base(TRUE)}html/js/particles.js"></script>
<script src="{URL::base(TRUE)}html/js/app.js"></script>
<script async type="text/javascript" src="//userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/a483d68961bc61c9691bdfa3f117d7d85fbd173df7ac7f39f85c0834ef7f5553.js"></script> 
</body>
</html>