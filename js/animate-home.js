document.addEventListener("DOMContentLoaded", function () {

	'use strict';

	gsap.registerPlugin(ScrollTrigger);

	let sectiomList = gsap.utils.toArray('section')

	console.log("sectiomList  start ",sectiomList);




	gsap.to(".slide-s", {rotation: 360, x: 100, duration: 2});


	//header comming from top to zero position 
	gsap.fromTo(".hed-c", {y: -100},{ y: 0, duration: 2});
	gsap.fromTo(".text-1", {x: -100},{ x: 0, duration: 1});


	ScrollTrigger.defaults({
		toggleActions: "restart pause resume pause"
		//scroller: ".container"
	  });
	const gTl = gsap.timeline();

	var tl = gsap.timeline({repeat: 2, repeatDelay: 1});

	gsap.to("#section-projects", {
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
	  });



	gsap.to("#section-h2", {
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
	  });
	
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

	console.log("data  animate "+gTl);
	console.log("start animate ");





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
		  .add(conclusion(), "-=1") 



});