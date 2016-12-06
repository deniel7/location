var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    /* Process */
    mix.sass('app.scss');

    /* Versioning / Cache Busting */
    // mix.version('css/app.css');
});

elixir(function(mix) {
    /* Process */
	mix.scripts([
        'common.js',
        'example.js'
    ]);

    /* Versioning / Cache Busting */
    mix.version('js/all.js');
});