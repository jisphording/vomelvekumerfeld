// INSTALLATION OF SERVICE WORKER ----- ----- ----- ----- ----- //

// The most important "application shell files" that comprise the main site design are cached here
const filesToCache = [
    '/',
    'dist/index.css',
    'dist/script.js',
    'dist/img/emblem-quadrat.svg',
    'dist/img/emblem.svg',
    'offline/index.html'
];
      
const staticCacheName = 'pwa-cache-v1';
      
self.addEventListener('install', event => {
    console.log('Inside the install handler:', event);
    console.log('Attempting to install service worker and cache static assets');
    // avoid retrieving from a cache that is not yet ready and for all promises to be completed
    // before returning control to the event handler
    event.waitUntil(
        caches.open(staticCacheName)
        .then(cache => {
        return cache.addAll(filesToCache);
        })
    );
});
  
// ACTIVATION OF SERVICE WORKER ----- ----- ----- ----- ----- //

self.addEventListener('activate', (event) => {
    console.log('Inside the activate handler:', event);
      
    const cacheAllowlist = [staticCacheName];
      
    event.waitUntil(
        caches.keys().then(cacheNames => {
        return Promise.all(
            cacheNames.map(cacheName => {
                if (cacheAllowlist.indexOf(cacheName) === -1) {
                    return caches.delete(cacheName);
                }
            })
        );
        })
    );
});
  
// FETCHING FILES FROM CACHE OF SERVICE WORKER ----- ----- ----- ----- ----- //

self.addEventListener('fetch', event => {
    console.log('Fetch event for ', event.request.url);
    event.respondWith(
      caches.match(event.request)
      .then(response => {
        if (response) {
          console.log('Found ', event.request.url, ' in cache');
          return response;
        }
        console.log('Network request for ', event.request.url);
        return fetch(event.request)
  
        .then(response => {
            // TODO 5 - Respond with custom 404 page
            return caches.open(staticCacheName).then(cache => {
                cache.put(event.request.url, response.clone());
                return response;
            });
        });
  
      }).catch(error => {
  
        // TODO 6 - Respond with custom offline page
  
      })
    );
  });