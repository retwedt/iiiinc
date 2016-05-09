// main.js

console.log("this is main.js!");


// get dom elements
var nav = document.querySelector(".navbar");


// when user has scrolled a certain distance, change nav bar
document.onscroll = function() {
	if (document.body.scrollTop <= 40) {
		nav.classList.add("navbar-top");
		nav.classList.remove("navbar-scroll");
	} else {
		nav.classList.add("navbar-scroll");
		nav.classList.remove("navbar-top");
	}
}