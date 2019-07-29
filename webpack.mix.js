let mix = require('laravel-mix');
const tailwindcss = require('tailwindcss')

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copy('public/js/app.js','public_html/js/app.js')
   .copy('public/css/app.css','public_html/css/app.css');

mix.sass('resources/sass/tailwind.scss', 'public/css')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('./path/to/your/tailwind.config.js') ],
  })
