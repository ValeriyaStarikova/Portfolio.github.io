$(document).ready(function(){
  $('.header__slider').slick({
    infinite: true,
    speed: 500,
    arrows: false,
    dots: true,
    cssEase: 'linear'
  });
  var $el = $('.about__wrapper');
  let counter = 0;
$(window).scroll(function() {
    var scroll = $(window).scrollTop() + $(window).height();
    var offset = $el.offset().top + 400;
    console.log(offset);
    if(scroll > offset && counter == 0){

      $('.count').each(function () {
        $(this).prop('Counter',0).animate({
          Counter:$(this).text()},
          {
            diration: 4000,
            easing: 'swing',
            step:function(now){
              $(this).text(Math.ceil(now));
            }
          });
        });
      counter = 1;
    }
});

});
