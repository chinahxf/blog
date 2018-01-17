let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    // .extract(['vue','wangeditor','axios','jquery'])
   .sass('resources/assets/sass/app.scss', 'public/css')
/*    .webpackConfig({
        output: {
            filename: 'app.js',
            path: '/home/proj/public/assets'
        }
})*/;
