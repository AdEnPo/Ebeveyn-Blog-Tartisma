// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("nav");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
  	header.classList.remove("navbar-light");
  	header.classList.add("navbar-dark");
    header.classList.add("bg-dark");
    header.classList.remove("bg-dark-hidden");
  } else {
  	header.classList.add("navbar-light");
  	header.classList.remove("navbar-dark");
  	header.classList.add("bg-dark-hidden");
    header.classList.remove("bg-dark");
  }
}