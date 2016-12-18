const elixir = require('laravel-elixir');

// require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.sourcemaps = false;
elixir.config.production = true;
elixir(mix => {
    mix.sass('material.scss', 'public/css/material.css')
        .webpack('libs.js', 'public/js/libs.js')
        .copy('./node_modules/materialize-css/fonts', 'public/fonts');
});
