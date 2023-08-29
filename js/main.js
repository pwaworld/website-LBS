


$(document).ready(function(){
	console.log("Ready ...Go");



  $(window).on("scroll", function() {


    if($(window).scrollTop() > 600) {
      console.log( "done 600 ");
        $(".bg-v").addClass("hide-v");
        $(".s-view").addClass("hide-li");

    } else {
       $(".bg-v").removeClass("hide-v");
       $(".s-view").removeClass("hide-li");
    }
});


  window.addEventListener("scroll", function(event) {
  
    var top = this.scrollY,
        left = this.scrollX;
  
    var horizontalScroll = document.querySelector(".horizontalScroll"),   verticalScroll = document.querySelector(".verticalScroll");
    console.log( "Scroll X: " + left + "px" +"Scroll Y: " + top + "px");

    horizontalScroll.innerHTML = "Scroll X: " + top + "px";
     // verticalScroll.innerHTML = "Scroll Y: " + top + "px";
  
}, false);




  document.getElementById('next-s').onclick = function(){
    let lists = document.querySelectorAll('.item-s');
    document.getElementById('slide-s').appendChild(lists[0]);
}
document.getElementById('prev-s').onclick = function(){
    let lists = document.querySelectorAll('.item-s');
    document.getElementById('slide-s').prepend(lists[lists.length - 1]);
}
  

  $(".owl-carousel").owlCarousel();

  
  var owl = $('.owl-carousel');
  owl.owlCarousel({
      loop:true,
      nav:true,
      margin:10,
      center : true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },            
          960:{
              items:5
          },
          1200:{
              items:6
          }
      }
  });

  // owl.on('mousewheel', '.owl-stage', function (e) {
  //     if (e.deltaY>0) {
  //         owl.trigger('next.owl');
  //     } else {
  //         owl.trigger('prev.owl');
  //     }
  //     e.preventDefault();
  // });





  autoPlayYouTubeModal();


  });


  function myFunction() {   
    document.getElementById("demo").innerHTML = "Hello JavaTpoint!";  
}  




function openRightMenu() {
	document.getElementById("rightMenu").style.display = "block";
  }
  
  function closeRightMenu() {
	document.getElementById("rightMenu").style.display = "none";
  }
  



  function autoPlayYouTubeModal() {
    var triggerOpen = $("body").find('[data-tagVideo]');
    triggerOpen.click(function() {
      var theModal = $(this).data("bs-target"),
        videoSRC = $(this).attr("data-tagVideo"),
        videoSRCauto = videoSRC + "?autoplay=1";
      $(theModal + ' iframe').attr('src', videoSRCauto);
      $(theModal + ' button.btn-close').click(function() {
        $(theModal + ' iframe').attr('src', videoSRC);
      });
    });
  }
  


  function myFunction() {
    console.log("Cliecked  ...Go");
  }


  // A function we want executed based on changes in screen size 
function foo() {
  if (window.innerWidth < 1024) { 
    console.log("tablet view  ");
    }
}

const mQuery = window.matchMedia('(min-width: 320px)');
if (mQuery.matches) { 
  // Print a message to the console 
  console.log('Media query matched!') 
}



// Set up a listener 
window.addEventListener('changesize', foo);


filterSelection("all");



function filterSelection(c) {
  console.log("called : ", c)
 
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}
