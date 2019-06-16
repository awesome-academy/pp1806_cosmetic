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
    .sass('resources/sass/app.scss', 'public/css')

    .copy('resources/js/jquery.js', 'public/layouts/js')
    .copy('resources/js/bootstrap.min.js', 'public/layouts/js')
    .copy('resources/js/jquery.scrollUp.min.js', 'public/layouts/js')
    .copy('resources/js/price-range.js', 'public/layouts/js')
    .copy('resources/js/jquery.prettyPhoto.js', 'public/layouts/js')
    .copy('resources/js/main.js', 'public/layouts/js')

    .js('resources/js/admin_custom.js', 'public/js')
    .styles('resources/css/bootstrap.min.css', 'public/layouts/css/bootstrap.min.css')
    .styles('resources/css/font-awesome.min.css', 'public/layouts/css/font-awesome.min.css')
    .styles('resources/css/main.css', 'public/layouts/css/main.css')
    .styles('resources/css/responsive.css', 'public/layouts/css/responsive.css')
    .styles('resources/css/animate.css', 'public/layouts/css/animate.css')
    .styles('resources/css/prettyPhoto.css', 'public/layouts/css/prettyPhoto.css')
    .styles('resources/css/price-range.css', 'public/layouts/css/price-range.css')
    .copy('resources/fonts/', './public/layouts/fonts/', false)

    .js('resources/js/cart.js', 'public/js')
    .styles('resources/css/style.css', 'public/layouts/css/style.css');
