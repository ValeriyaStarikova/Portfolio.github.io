$(document).ready(function(){
  $('.slider').slick({
    slidesPerRow:3,
    rows: 2,
    slidesToScroll: 1,
    slidesToShow: 1,
    dots: true,
    arrows: true,
    appendArrows: $('.controls-arrows'),
		appendDots: $('.controls-dots'),
    responsive: [
    {
      breakpoint: 1280,
      settings: {
        slidesPerRow:3,
        rows: 2
        }
      },
      {
        breakpoint: 769,
        settings: {
          slidesPerRow:2,
          rows: 2
        }
      },
      {
        breakpoint: 321,
        settings: {
          arrows: false,
          slidesPerRow: 1,
          rows: 1,
          slidesToScroll: 1,
          slidesToShow: 1.2,
          infinite: false
        }
      }
    ]
  });

});
