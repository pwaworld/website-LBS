document.addEventListener("DOMContentLoaded", function () {

	'use strict';

	gsap.registerPlugin(ScrollTrigger);

	const gTl = gsap.timeline();

	var tl = gsap.timeline({repeat: 2, repeatDelay: 1});
	tl.to("#section-1", {x: 500, duration: 2});
//tl.to("#section-2", {x: 2000, duration: 3});
tl.to("#section-2", {opacity: 0, duration: 2});

// then we can control the whole thing easily...

//tl.resume();
tl.seek(4.0);
tl.reverse();

	console.log("data  animate "+gTl);
	console.log("start animate ");

});