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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/bootstrap.min.js', 'public/layouts/js')
    .js('resources/js/jquery.js', 'public/layouts/js')
    .js('resources/js/jquery.scrollUp.min.js', 'public/layouts/js')
    .js('resources/js/main.js', 'public/layouts/js')
    .styles('resources/css/bootstrap.min.css', 'public/layouts/css/bootstrap.min.css')
    .styles('resources/css/font-awesome.min.css', 'public/layouts/css/font-awesome.min.css')
    .styles('resources/css/main.css', 'public/layouts/css/main.css')
    .styles('resources/css/responsive.css', 'public/layouts/css/responsive.css'); 