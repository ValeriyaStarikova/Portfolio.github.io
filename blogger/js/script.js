$(document).ready(function(){
  $('.hidemenu__button').on('click', function(e) {
    e.preventDefault();
    $('.hidemenu__button').toggleClass('hidemenu__button--active');
    $('.nav').toggleClass('nav--active');
  });
  AOS.init();
  $('.owl-carousel').owlCarousel({
    loop:true,
    autoplay: true,
    autoplayTimeout: 3000,
    dots: false,
    nav: true,
    navText:[$('.owl-navigation .owl-nav-prev'),$('.owl-navigation .owl-nav-next')],
    responsive:{
        0:{
            items:1,
            nav:true
        },
        320:{
            items:1,
            nav:true
        },
        560:{
            items:2,
            nav:true
        },
        960:{
            items:3,
            nav:true
        }
    }
  });
  $('.move__up span').click(function(){
    $('html,body').animate({
      scrollTop: 0
    },1000);
  });

});
