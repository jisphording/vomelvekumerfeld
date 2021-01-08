// keep folder structure as input use imagemin-webp
const imagemin = require('imagemin-keep-folder');
const imageminWebp = require("imagemin-webp");
const imageminSvgo = require('imagemin-svgo');

// Run imagemin on svg files found in assets
imagemin(['assets/img/*.svg'], 'dist/img', {
  use: [
      imageminSvgo({
          plugins: [
              { optimizationLevel: 3 },
              { progessive: true },
              { interlaced: true },
              { removeViewBox: false },
              { removeUselessStrokeAndFill: false },
              { cleanupIDs: false },
          ]
      })
  ]
});

// Run imagemin on content images that are kept in same folder
imagemin(['content/**/*.{jpg,png}'], {
  use: [
    imageminWebp({})
  ]
});

// Run imagemin on asset images that are moved to dist folder
imagemin(['assets/img/*.{jpg,png}'], 'dist/img', {
  use: [
      imageminWebp({quality: 75})
  ]
}).then(() => {
  console.log('Images optimized');
});
