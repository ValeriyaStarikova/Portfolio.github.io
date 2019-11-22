$(document).ready(function(){

  $('.hidemenu__button').on('click', function(e) {
    e.preventDefault();
    $('.hidemenu__button').toggleClass('hidemenu__button--active');
    $('.header__info').toggleClass('header__info--active');
  });
  $("#header__slider").owlCarousel({
    items: 1,
    loop: true,
    doots: true
  });
  $('.tours__content').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    variableWidth: true,
    speed: 500,
    arrows: true,
    nextArrow: '<span class="arr arr--right"></span>',
    prevArrow: '<span class="arr arr--left"></span>',
    cssEase: 'linear',
    responsive: [
    {
      breakpoint: 1900,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '20px'
      }
    },
    {
      breakpoint: 1700,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '60px'
      }
    },
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
  });
  $('.tours__content').not(":first").hide();

  $('.tour_wrapper .tour__item').click(function(e) {
    e.preventDefault();
    $('.tour_wrapper .tour__item').removeClass("tour__item--active").eq($(this).index()).addClass("tour__item--active");
    $('.tours__content').hide().eq($(this).index()).fadeIn();
  }).eq(0).addClass("tour__item--active");
});
