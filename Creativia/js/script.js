$(document).ready(function(){
  $('.services__item').addClass('wow zoomIn');
  $('.blog__more--button').click(function(){
    $('.blog__item').removeClass('blog__item--hidden');
    $('.blog__more--button').hide();
  });
  $('.hidemenu__button').on('click', function(e) {
    e.preventDefault();
    $('.hidemenu__button').toggleClass('hidemenu__button--active');
    $('.header__menu').toggleClass('header__menu--active');
    $('.header__slider').toggleClass('header__slider--active');
    $('.header__logo').toggleClass('header__logo--active');
  });
  new WOW().init();
  $('.content__slider').slick({
    infinite: true,
    speed: 500,
    arrows: true,
    cssEase: 'linear'
  });
  $('.client__message').slick({
    infinite: true,
    speed: 500,
    dots: true,
    arrows: false,
    cssEase: 'linear'
  });
  $(function() {
      $('.chart').easyPieChart({
        scaleColor: false,
        barColor: '#ff0036',
        rotate: 90
      });
  });
});
