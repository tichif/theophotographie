$(document).ready(function () {

  //toggle button
  $('.btn').click(function () {
    $('.nav-links').slideToggle(1500);
    $('.btn').toggleClass('change');
  });

  //transparent background
  $(window).scroll(function () {
    let position = $(window).scrollTop();

    if (position >= 100) {
      $('nav, nav-container').addClass('nav-background');
    } else {
      $('nav, nav-container').removeClass('nav-background');
    }
  });

 // Owl Carousel
  $('.owl-carousel').owlCarousel({
    loop:true,
    smartSpeed:2000,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
  });


});
