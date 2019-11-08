$(document).ready(function(){

  $('.hidemenu__button').on('click', function(e) {
    e.preventDefault();
    $('.hidemenu__button').toggleClass('hidemenu__button--active');
    $('.header__nav').toggleClass('nav--active');
  });

  $('.team__member').on('click', function() {
    $('.team__member').removeClass('team__member--active');
    $(this).toggleClass('team__member--active');
  });

  $('.products__content').not(":first").hide();

  $('.products .product__item').click(function(e) {
    e.preventDefault();
    $('.products .product__item').removeClass("product__item--active").eq($(this).index()).addClass("product__item--active");
    $('.products__content').hide().eq($(this).index()).fadeIn();
  }).eq(0).addClass("product__item--active");

});
