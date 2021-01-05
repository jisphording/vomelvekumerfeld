// workbox-config.js
module.exports = {
    globDirectory: "dist",
    globPatterns: [
      "**/*.{html,js,css,png,svg,jpg,gif,json,woff,woff2,eot,ico,webmanifest,map}"
    ],
    swDest: "dist/serviceworker.js",
    clientsClaim: true,
    skipWaiting: true,
    cacheId: "VomElvekumerFeld",
    cleanupOutdatedCaches: true,
    directoryIndex: "/",

    // Define runtime caching rules.
    runtimeCaching: [{
    // Match any request that ends with .png, .jpg, .jpeg or .svg.
    urlPattern: /\.(?:png|jpg|jpeg|svg|webp)$/,

    // Apply a cache-first strategy.
    handler: 'CacheFirst',

    options: {
      // Use a custom cache name.
      cacheName: 'images',

      // Only cache 10 images.
      expiration: {
        maxEntries: 10,
      },
    },
  }],
};