// ---------- ---------- ---------- ---------- ---------- //
// L O A D   A S Y N C //
// ---------- ---------- ---------- ---------- ---------- //
//
// Load Async with callback to propagate script availability to Webflow
//
// ### TODO ### Check if this is actually the best way to load the script this way.
export default function loadAsync(src, callback) {
    // creates a <script> tag and appends it to the page head
    let script = document.createElement('script');
    // provide src of script to be loaded with callback
    script.src = src;

    // Fire callback onload
    script.onload = () => callback(script);

    // Append script to <head> of page
    document.head.append(script);
}