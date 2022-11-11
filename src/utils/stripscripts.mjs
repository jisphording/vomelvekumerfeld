// ---------- ---------- ---------- ---------- ---------- //
// S T R I P   S C R I P T S //
// ---------- ---------- ---------- ---------- ---------- //
//
// ### TODO ###
// This is a workaround that should be improved.
//
// This script removes unused google font references that are still hanging around in the exported
// Webflow code. As soon as Webflow updates the code on their end this workaround can be removed.

// IMPORT LIBRARY
import { stripHtml } from "string-strip-html";

export default function stripScripts( s ) {
    
    // Get references to <head> & <html> tags
    const head = document.getElementsByTagName( 'head' )[0]
    const html = document.getElementsByTagName( 'html' )[0]
    const stylesheets = head.getElementsByTagName( 'link' )
    
    // Get the text content to be parsed
    let headContent = head.innerHTML
    // remove the original head node
    head.remove()

    // remove google font stylesheet
    stylesheets[1].remove(stylesheets[1]) // ### TODO ### - Should be done with regex

    // strip all unneeded <script> tags
    let headTags = stripHtml( headContent, {
        onlyStripTags: [ 
            'meta',
            'script',
            'link'
        ]
    })

    // create a new <head> tag
    let newHead = document.createElement( 'head' )

    // give it the stripped result
    newHead.innerHTML = headTags.result

    // and add it back to the page
    html.prepend( newHead )

    // add other stylesheets back to the page
    newHead.prepend( ...stylesheets )
}

stripScripts();