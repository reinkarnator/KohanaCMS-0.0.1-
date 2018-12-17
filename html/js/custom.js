$(function(){

    updateClock();
    setInterval('updateClock()', 60000);

    $('.animated-text').fadeIn(500);
    $('ul.slide-list li').each(function(k,val){
            var tm = k*500;
            $(this).delay(tm).slideDown(300);
    }); 

    $('.row.padding110-73.extendPadding.prcnt').fadeIn(2000);
    $('.technic-side img').fadeIn(2000);


 // Addon to control year in events panel    
    if(!$('.row.events').hasClass('inner')){
        if(window.location.hash) {
            var curr_year = window.location.hash.substring(1);
            $('.curr-year').attr('data-class', curr_year);
            $('.curr-year').html(curr_year.substring(1));
            $('.left-sidebar.events ul li').each(function(){
                if ($('a',this).attr('data-class') == curr_year) {
                     $(this).prepend($('div#choosed-year'));
                }       
            }); 
            $('.row.events .col-xs-4').each(function(){
                 $(this).css('display','none'); 
                 $('.'+curr_year).css('display','block');  
            });            
        }   
        $('.left-sidebar.events ul li a').click(function(){
            $(this).parent().prepend($('div#choosed-year'));
            var year = $(this).attr('data-class');
            //window.location.hash = year;
            $('.curr-year').attr('data-class', year);
            $('.curr-year').html($('div#choosed-year').siblings('a').html());
            $('.row.events').fadeOut(200);
            $('.row.events').fadeIn(200);
            var curr_year = $('div#choosed-year').siblings('a').attr('data-class');
            $('.row.events .col-xs-4').each(function(){
                console.log(curr_year);
                 $(this).css('display','none'); 
                 $('.'+curr_year).css('display','block');  
            });        
        });
        var curr_year = $('div#choosed-year').siblings('a').attr('data-class');
        $('.row.events .col-xs-4').each(function(){
            console.log(curr_year);
             $(this).css('display','none'); 
             $('.'+curr_year).css('display','block');  
        });
    } else {
        $('.left-sidebar.events ul li a').click(function(){
            var curr_year = $(this).attr('data-class');
            window.location.hash = curr_year;
            window.location.href = events_path + curr_year;
        });         
        var curr_year = $('span.small-heading b').html();
        $('.left-sidebar.events ul li').each(function(){
            if ($('a',this).html() == curr_year) {
                 $(this).prepend($('div#choosed-year'));
            }       
        });
    
    }    


    if (typeof $.fn.lightSlider !== 'undefined') {
        $('#slider').lightSlider({
            item:1,
            slideMove:1,
            slideMargin:0,
            speed:600,
            pager:true,
            auto: true,
            loop:true,
            pause:10000,
            adaptiveHeight:true,
            controls: false
        });
    }   
    if (typeof $.fn.colorbox !== 'undefined') {
      $(".group1").colorbox({rel:'group1',maxWidth: '95%',maxHeight: '95%'});  
    }

    if (typeof $.fn.slick !== 'undefined') {
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

      $('#companySlider').slick({
          infinite: true,
          dots: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 6000,
          speed: 1000,
          prevArrow: '<a class="lSPrev"></a>',
          nextArrow: '<a class="lSNext"></a>',      
      });  

      $('#productSlider').slick({
          infinite: true,
          dots: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          asNavFor: '.slider-for-products',
          arrows: false     
      }); 

      $('.slider-for-products').slick({
          infinite: true,
          dots: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          asNavFor: '#productSlider',
          centerMode: false,
          focusOnSelect: true,
          prevArrow: '<span class="glyphicon glyphicon-chevron-left slick-prev"></span>',
          nextArrow: '<span class="glyphicon glyphicon-chevron-right slick-next"></span>', 
      });            
    }

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


$('ul.navigation-menu li').on('click',function(e){
    //var _self = this;
    //$(this).addClass('current').siblings().removeClass('current');
    $(this).each(function(){
        if ($(this).children('ul').length) {
            $(this).children('a').removeAttr('href');
        }
    });
    if ($(this).children('ul').css('display') == 'none') {
        $(this).children('ul').stop().show(500);
        $(this).siblings('li').find('ul').stop().hide(500);
    } 
});

function updateClock(){
    var d = new Date();
    var h = d.getHours();
    var m = (d.getMinutes()<10?'0':'') + d.getMinutes();
    $('#currDate').html(h + "<blink>:</blink>" + m);
}