// ---------- ---------- ---------- ---------- ---------- //
// A G E   V E R I F I C A T I O N //
// ---------- ---------- ---------- ---------- ---------- //
//
// Dieses Script fragt die Nutzer nach Ihrem Alter und setzt dann entsprechend ein Cookie.
// Basierend auf den Cookie Einstellungen wird dieses Cookie ggf. für den nächsten Besuch gespeichert.

// AGE VERIFICATION
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //

export default function AgeVerification() {

    // FETCH ELEMENTS 
    // ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
    // Connect this script to <html> elements in Webflow
    const modalWrapper = document.getElementsByClassName( 'age-verification__wrapper' )[0]
    const txt_granted = modalWrapper.getElementsByClassName( 'age-verification--granted' )[0]
    const txt_denied = modalWrapper.getElementsByClassName( 'age-verification--denied' )[0]
    const btn_yes = document.getElementsByClassName( 'age-verify--yes' )[0]
    const btn_no = document.getElementsByClassName( 'age-verify--no' )[0]
    
    // GET COOKIE
    // ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
    // ### TODO ### - The Cookie is retrieved, but the check should be refactored to allow
    // for checking of substring values from the cookie.
    function getCookie( cname ) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for( let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    // CHECK FOR AGE COOKIE
    // ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
    // Check if cookies are allowed and if an age cookie from a previous visit
    // is available. If yes, hide the modal automatically.
    function ageCheckCookie( cookie ) {
        try {
            let cookiesAllowed = getCookie( 'cc_cookie' );
            let agePass = getCookie( cookie );
            if ( cookiesAllowed && agePass != "") {
                removeModal()
                return;
            }
            else {
            }
        }
        catch (err) {
        }
    }    
    ageCheckCookie( 'age' )

    // ACTION ON CLICK -- YES
    // ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
    btn_yes.addEventListener( 'click', function( e ) {
        removeModal()
        ageSetCookie( 'age', 'verified', 365 )
    }, false )

    // ACTION ON CLICK -- NO
    // ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
    btn_no.addEventListener( 'click', function( e ) {
       txt_granted.style.display = 'none'
       txt_denied.style.display = 'block'
    }, false )

    // REMOVE MODAL
    // ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
    function removeModal() {
        modalWrapper.remove( modalWrapper )
    }
}

// SET AGE COOKIE
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- //
export function ageSetCookie(cname, cvalue, exdays) {
    let d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

AgeVerification()