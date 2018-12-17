<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1440,target-densitydpi=device-dpi" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{$title}</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="{$title}"/>
    <link rel="shortcut icon" href="{URL::base(TRUE)}html/favicon.ico" type="image/ico" />
    <link rel="address bar icon" href="{URL::base(TRUE)}html/favicon.ico" type="image/ico" />
    <link rel="stylesheet" href="{URL::base(TRUE)}html/fonts/fonts.css">
    <link rel="stylesheet" href="{URL::base(TRUE)}html/css/bootstrap.css">
    <link rel="stylesheet" href="{URL::base(TRUE)}html/css/lightslider.css">
    <link rel="stylesheet" href="{URL::base(TRUE)}html/css/slick.css">    
	  <link rel="stylesheet" href="{URL::base(TRUE)}html/css/stylep.css">
    <link rel="stylesheet" href="{URL::base(TRUE)}html/css/colorbox.css?v=2">
    <link rel="stylesheet" href="{URL::base(TRUE)}html/css/custom.css?v=4">
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
            {$socials}
            {$langsel}
        </div>
    </div>
</nav>


<div class="container-fluid padding-clear">
        <div class="row margin-clear">
            <div class="top-heading company">
                <div class="products-back-absolute"><img src="{URL::base(TRUE)}html/img/background/events.jpg"></div>
                <div class="headingus extendHeadingus" style="margin-left: 0;position: absolute;right: 122px;">
                    <div class="vertical-center">
                        <h2>{__("Events",NULL)}</h2>
                        <p>{__("Events_text",NULL)}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row margin-clear">
            {$breadcrumb}
        </div>

        <div class="left-sidebar events">
            <div class="row margin-clear height100">
                <div class="top-column">
                    {$yearsmodule}
                </div>
            </div>
            <div class="pdf-block">
                <a href="{URL::base(TRUE)}{$language}/catalogues" class="pdf"></a>
            </div>
        </div>         


        <div class="inner events_b">   
            <div class="row padding110-73 extendPadding">
                        {$content}
            </div>
        </div>       
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
            <div class="col-xs-1"></div>
        </div>
    </div>
</footer>
<script src="{URL::base(TRUE)}html/js/bootstrap.js"></script>
<script src="{URL::base(TRUE)}html/js/slick.min.js"></script>
<script src="{URL::base(TRUE)}html/js/jquery.colorbox.js"></script>
<script src="{URL::base(TRUE)}html/js/custom.js"></script>
<script>
{literal}
    $(function(){
      $(".group1").colorbox({rel:'group1',maxWidth: '95%',maxHeight: '95%'});  
      $('.gall').slick({
          infinite: true,
          dots: false,
          slidesToShow: 4,
          slidesToScroll: 4,
          autoplay: true,
          autoplaySpeed: 6000,
          speed: 1000,
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
    }); 
{/literal}    
    function menu(o) {
        var check = $(o).find("a").attr("class");
        if(check === "open") {
            $(o).find("ul").slideUp();
            $(o).find("a").removeClass("open").addClass("cl");
        } else if (check === "cl") {
            $(o).find("ul").slideDown();
            $(o).find("a").removeClass("cl").addClass("open");
        }
    }
// Addon to control year in events panel
$(function(){
    if(!$('.row.events').hasClass('inner')){
		if(window.location.hash) {
			var curr_year = window.location.hash.substring(1);
			$('.curr-year').html(curr_year);
			$('.left-sidebar.events ul li').each(function(){
				if ($('a',this).html() == curr_year) {
					 $(this).prepend($('div#choosed-year'));
				}		
			});	
            $('.row.events .col-xs-4').each(function(){
                 $(this).css('display','none'); 
                 $('.y'+curr_year).css('display','block');  
            });  		   
		}	
        $('.left-sidebar.events ul li a').click(function(){
            $(this).parent().prepend($('div#choosed-year'));
            var year = $(this).html();
            $('.curr-year').html(year);
            $('.row.events').fadeOut(200);
            $('.row.events').fadeIn(200);
            var curr_year = $('div#choosed-year').siblings('a').html();
            $('.row.events .col-xs-4').each(function(){
                 $(this).css('display','none'); 
                 $('.y'+curr_year).css('display','block');  
            });        
        });
        var curr_year = $('div#choosed-year').siblings('a').html();
        $('.row.events .col-xs-4').each(function(){
            console.log('.y'+curr_year);
             $(this).css('display','none'); 
             $('.y'+curr_year).css('display','block');  
        });
    } else {
        $('.left-sidebar.events ul li a').click(function(){
			var curr_year = $(this).html();
			window.location.hash = curr_year;
            window.location.href = "{URL::base(TRUE)}{$language}/events#" + curr_year;
        });  		
		var curr_year = $('span.small-heading b').html();
		$('.left-sidebar.events ul li').each(function(){
			if ($('a',this).html() == curr_year) {
				 $(this).prepend($('div#choosed-year'));
			}		
		});
    }    
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
</body>
</html>