$(document).ready(function(){
	

  var owl = $(".owl-carousel");
  owl.owlCarousel({
    items: 1,
    margin: 5,
    
    loop: true,
    dots:false,
    nav: false,
    animateOut: 'fadeOut'
  });



// Custom Button
$('.customNextBtn').click(function() {
  owl.trigger('next.owl.carousel');
});
$('.customPreviousBtn').click(function() {
  owl.trigger('prev.owl.carousel');
});



  });


