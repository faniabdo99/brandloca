const mix = require('laravel-mix');
mix.options({
    postCss: [
      require('autoprefixer')
    ],
    processCssUrls: false
  });
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/style.scss', 'public/css')
    .sass('resources/sass/print.scss' , 'public/css')
    .sass('resources/sass/admin/admin.scss' , 'public/admin/css');
mix.browserSync('localhost/arte');
