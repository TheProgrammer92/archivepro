const mix = require('laravel-mix');
//desactivation des notification de laravel mix
mix.disableNotifications();
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

//mix.js('resources/js/app2.js', 'public/js')
//sass('resources/sass/Appf.scss', 'public/css');
//sass compilation

mix.sass('resources/js/assets/sass/App.scss','public/css')
    /*framework*/   .sass('resources/js/assets/sass/framework/TheProgrammer.scss','public/css')
    /*framework*/   .sass('resources/js/assets/sass/framework/animate.scss','public/css');

mix.js('resources/js/app.js','public/js');




if (mix.inProduction()) {
    mix.version();
}
