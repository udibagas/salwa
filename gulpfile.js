const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
    // DESKTOP
       .styles([
           'carousel.css',
           'chosen.min.css',
           'font-awesome.min.css',
           'gallery.css',
       ])
    //    QURAN DESKTOP
       .styles([
           'quran-desktop.css',
           'font-awesome.min.css',
       ], 'public/css/quran-desktop.css')
    //    QURAN MOBILE
       .styles([
           'quran-mobile.css',
           'font-awesome.min.css',
           'jquery.sidr.bare.css',
       ], 'public/css/quran-mobile.css')
    //    MOBILE
       .styles([
           'carousel.css',
           'chosen.min.css',
           'font-awesome.min.css',
           'gallery.css',
           'jquery.sidr.bare.css',
           'mobile.css',
       ], 'public/css/mobile.css')
       .scripts([
           'carousel.js',
           'chosen.jquery.min.js',
           'initial.min.js',
           'jquery.sidr.min.js',
           'pager.js',
           'main.js'
       ])
       .webpack('app.js');
});
