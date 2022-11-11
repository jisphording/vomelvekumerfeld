// ---------- ---------- ---------- ---------- ---------- //
// J Q U E R Y   A N I M A T I O N //
// ---------- ---------- ---------- ---------- ---------- //
//
// Dieses Script implementiert Animationen mit JQuery.
// Da diese Library zur Zeit nich von Webflow selbst verwendet und geladen wird
// greifen wir ebenfalls darauf zu.

// JQUERY
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
function animRotate(angle, repeat) 
{
    var duration= 18000;
    setTimeout(function() {
        if(repeat && repeat == "infinite") {
            animRotate(angle,repeat);
        } else if ( repeat && repeat > 1) {
            animRotate(angle, repeat-1);
        }
    },duration)    
    var $elem = $('.emblem--rotate');

    $({deg: 0}).animate({deg: angle}, {
        duration: duration,
        easing: 'linear',
        step: function(now) {
            $elem.css({
                'transform': 'rotate('+ now +'deg)'
            });
        }
    });
}

animRotate(360,"infinite");