document.addEventListener("DOMContentLoaded", function () {

	'use strict';

	gsap.registerPlugin(ScrollTrigger);

	const gTl = gsap.timeline();

	var tl = gsap.timeline({repeat: 2, repeatDelay: 1});
	tl.to("#section-903", {x: 900, duration: 2});

	tl.to("#section-902", {x: 900, duration: 2});

	tl.to("#section-901", {x: 900, duration: 2});
//tl.to("#section-2", {x: 2000, duration: 3});
tl.to("#section-904", {opacity: 0, duration: 2});


tl.to("#section-900", {y: 900, duration: 2});



// then we can control the whole thing easily...

//tl.resume(); 
tl.seek(5.0);
tl.reverse();

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


		  (function(){
			$('.flex-container').waitForImages(function() {
				
			}, $.noop, true);
			
			$(".flex-slide").each(function(){
				$(this).hover(function(){
					$(this).find('.flex-title').css({
						transform: 'rotate(0deg)',
						top: '10%'
					});
					$(this).find('.flex-about').css({
						opacity: '1'
					});
				}, function(){
					$(this).find('.flex-title').css({
						transform: 'rotate(90deg)',
						top: '15%'
					});
					$(this).find('.flex-about').css({
						opacity: '0'
					});
				})
			});
		})();


});