// ---------- ---------- ---------- ---------- ---------- //
// G S A P   A N I M A T I O N //
// ---------- ---------- ---------- ---------- ---------- //
//
// Dieses Script implementiert Animationen mit GSAP
//
// ### TODO ### Add check if user agent already has cached GSAP
// Add GSAP to enable Animations on the site

import loadAsync from "../utils/loadasync.mjs";

// GSAP
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
function runGSAP() 
{
    // ROTATE EMBLEMS
    // ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
    // Gather elements
    let emblems = document.getElementsByClassName('emblem--rotate')

    // Loop through the elements and apply an infinite 360deg rotation to them
    for (let i = 0; i < emblems.length; i++) {
        let emblem = emblems[i];
        // ( element, speed, degree of rotation, easing, repeat:-1 = infinite exec)
        gsap.to(emblem, 24, { rotation: "360", ease: Linear.easeNone, repeat: -1 });
    }
}

// LOAD GSAP SCRIPT
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
// load and execute the script at the given path
loadAsync('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js', function() {
    // the callback runs after the script is loaded
    runGSAP();
});