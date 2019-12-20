$(document).ready(function(){

  $('.hidemenu__button').on('click', function(e) {
    e.preventDefault();
    $('.hidemenu__button').toggleClass('hidemenu__button--active');
    $('.header__nav').toggleClass('nav--active');
  });

  $('.lang').click(function(e) {
    e.preventDefault();
    $('.lang').removeClass("lang--active").eq($(this).index()).addClass("lang--active");
  }).eq(0).addClass("lang--active");

});
