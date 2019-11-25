$(document).ready(function(){

  $('.hidemenu__button').on('click', function(e) {
    e.preventDefault();
    $('.hidemenu__button').toggleClass('hidemenu__button--active');
    $('.header__info').toggleClass('header__info--active');
  });
  $(".header__slider").owlCarousel({
    items: 1,
    loop: true,
    center: true,
    doots: true
  });
  $(".tours__content").owlCarousel({
    loop: true,
    nav: true,
    doots: false,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:2,
        margin:20
      },
      1000:{
        items:3,
        margin:10,
        center: true
      }
    }
  });

  (function($){
          $(window).on("load",function(){
              $(".content__text").mCustomScrollbar({
                theme: "rounded-dark"
              });
          });
      })(jQuery);

  $('.tours__content').not(":first").hide();

  $('.tour_wrapper .tour__item').click(function(e) {
    e.preventDefault();
    $('.tour_wrapper .tour__item').removeClass("tour__item--active").eq($(this).index()).addClass("tour__item--active");
    $('.tours__content').hide().eq($(this).index()).fadeIn();
  }).eq(0).addClass("tour__item--active");
});
