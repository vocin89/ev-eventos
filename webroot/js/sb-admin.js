(function($) {
  "use strict"; // Start of use strict
  

  $("#exampleAccordion").hover(function(e) {
    e.preventDefault();
    $("body").toggleClass("sidenav-toggled");

    if($("body").hasClass("sidenav-toggled"))
      $(".navbar-sidenav .nav-link-collapse:not(.collapsed)").click();  
  }); 

  $('.main-layout .nav-item').hover(function(){

    $(this).closest('.nav-item').find('.sub-item').toggleClass('collapse');

  })

   

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
    var e0 = e.originalEvent,
      delta = e0.wheelDelta || -e0.detail;
    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
    e.preventDefault();
  });
  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });
  
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });
})(jQuery); // End of use strict
