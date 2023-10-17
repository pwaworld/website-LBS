document.addEventListener("DOMContentLoaded", function () {
	'use strict';


	$(window).on("scroll", function() {

		if($(window).scrollTop() > 200) {

		} else {
			
		}
	});

	
	ScrollTrigger.create({
		trigger: "#section-h1",
		start: "top top",
		end: "+=200px",
		pin: true,
		markers: true
	  })

	  ScrollTrigger.create({
		trigger: "#section-h2",
		start: "top top",
		end: "+=200px",
		pin: true,
		markers: true
	  })


	  ScrollTrigger.create({
		trigger: "#section-services",
		start: "top top",
		end: "+=200px",
		pin: true,
		markers: true
	  })

	  
	  ScrollTrigger.create({
		trigger: "#section-projects",
		start: "top top",
		end: "+=400px",
		pin: true,
		//markers: true
	  })


	  ScrollTrigger.create({
		trigger: "#section-resources",
		start: "top top",
		end: "+=400px",
		pin: true,
		markers: true
	  })




	  ScrollTrigger.create({
		trigger: "#section-contact",
		start: "top top",
		end: "+=200px",
		pin: true,
		//markers: true
	  })







  
  // Function to handle the scroll event
  function handleScroll() {
	const scrollPosition = window.scrollY;

	console.log( "scrollPosition : "+scrollPosition);

	if(scrollPosition >100){

		console.log( "trigger text hide  : ");

	}else{

		console.log( "disable  text hide  : ");
	}
  }
  
  // Attach the scroll event listener to the window
  window.addEventListener('scroll', handleScroll);



	




	/**start   


let sections = gsap.utils.toArray("section");
const firstElem = document.querySelector("section");

function goToSection(i, anim) {
      
  gsap.to(window, {

    scrollTo: {y: i*innerHeight + firstElem.offsetTop, autoKill: false},
    duration: 0.9,

  });

  if(anim) {
    anim.restart();
  }

  console.log(i*innerHeight + firstElem.offsetTop);

}

sections.forEach((section, i) => {
  
    ScrollTrigger.create({
       trigger: section,
       onEnter: () => goToSection(i),
       markers: true
     });
     
     ScrollTrigger.create({
       trigger: section,
       //start: "bottom center",
	   start: "bottom 20%",
		markers: true,
       onEnterBack: () => goToSection(i),
     });
  
});

/**end  */



// when the scroll velocity is more than 2500px/second, skip the smooth scrubbing
// function killWhenFast(self) {
//   let tween = self.getTween();
//   tween && Math.abs(self.getVelocity()) > 2500 && tween.progress(1);
// }







//animation for Home End 





	//let sectiomList = gsap.utils.toArray('section')
	//console.log("sectiomList  start ",sectiomList);

	//gsap.to(".slide-s", {rotation: 360, x: 100, duration: 2});


	//header comming from top to zero position 
	//gsap.fromTo(".hed-c", {y: -100},{ y: 0, duration: 2});
	//gsap.fromTo(".text-1", {x: -100},{ x: 0, duration: 1});


	//ScrollTrigger.defaults({toggleActions: "restart pause resume pause"	//scroller: ".container"
	//  });
	//const gTl = gsap.timeline();

	//var tl = gsap.timeline({repeat: 2, repeatDelay: 1});

/*	gsap.to("#section-projects", {
		x: 400,
		duration: 1,
		
		scrollTrigger: {
		  trigger: "#section-projects",
		  start: "top center",
		  end: "top 600px",
		  scrub: true,
		  markers: true,
		  id: "section-projects"
		}
	  }); */



	/* gsap.to("#section-h2", {
		opacity: 0.9
	  });
	  
	gsap.to("#section-resources1", {
		x: 400,
		duration: 1,
		
		scrollTrigger: {
		  trigger: ".b",
		  start: "top center",
		  end: "top 100px",
		  scrub: true,
		  markers: true,
		  id: "section-resources"
		}
	  }); */
	
	//tl.to("#section-h5", {x: 150, duration: 1});
	//tl.to("#section-h6", {x: 200, duration: 2});
	//tl.to("#section-h7", {x: 250, duration: 2});
	

//tl.to("#section-2", {x: 2000, duration: 3});
//tl.to("#section-h9", {opacity: 0, duration: 2});


//tl.to("#section-h8", {y: 900, duration: 2});

// then we can control the whole thing easily...

//tl.resume(); 
//tl.seek(5.0);
//tl.reverse();

	//console.log("data  animate "+gTl);
	//console.log("start animate ");




/*
	function intro() {
		console.log("intro  start ");
		var tl = gsap.timeline();
		//...add animations here...
		//tl.to("#section-903", {y: 900, duration: 2});
		return tl;
	}
	
	function middle() {
		console.log("middle  start ");
		var tl = gsap.timeline();
		//tl.to("#section-902", {x: 900, duration: 2});
		return tl;
	}
	
	function conclusion() {
		console.log("conclusion  start ");
		var tl = gsap.timeline();
		//...add animations here...
		return tl;
	}
	
	// stitch them together in a master timeline...
	var master = gsap.timeline();
	master.add(intro())
		  .add(middle(), "+=3")     //with a gap of 2 seconds
		  .add(conclusion(), "-=1")  */



});