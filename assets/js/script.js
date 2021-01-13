// HIDE NAVBAR ON SCROLL
// ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
// First we check for window with (cross browser) to only activate this behavior on smaller screen sizes
const width  = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
const height = window.innerHeight|| document.documentElement.clientHeight|| document.body.clientHeight;

if (width < 768) {
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("navbar").style.top = "0";
    } else {
      document.getElementById("navbar").style.top = "-500px";
    }
    prevScrollpos = currentScrollPos;
  }
}


// TOGGLE BURGER MENU
// ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function fadeInMenu() {
    var x = document.getElementById("mainmenu");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
}

// add onclick to burger menu
window.onload = function() {
    let bindTo = document.getElementById("burgermenu");

    bindTo.onclick = fadeInMenu;
}