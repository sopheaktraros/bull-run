const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/admin/app.js', 'public/js/admin')
.js('resources/js/admin/custom.js', 'public/js/admin/custom.js')
.js('resources/js/admin/admin.js', 'public/js/admin/admin.js')

    // .js('resources/js/admin/stisla.js', 'public/js/admin/stisla.js')
    // .js('resources/js/admin/index.js', 'public/js/admin/index.js')
    .styles('resources/css/admin/owl.carousel.css', 'public/css/admin/owl.carousel.css')
    .sass('resources/sass/admin/app.scss', 'public/css/admin/');