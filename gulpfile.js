var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    "assets": "resources/assets/",
    "pubcss": "public/css/",
    "pubfont": "public/fonts/",
    "budfont": "public/build/fonts/",
    "fontawesome": "./vendor/fortawesome/font-awesome/"
}

elixir(function(mix) {

	mix.less('app.less')
		.less('admin.less')
		.copy([
			paths.fontawesome + 'css/font-awesome.min.css',
			paths.fontawesome + 'css/font-awesome.css.map',
		], paths.pubcss )
		.copy([
			paths.fontawesome + 'fonts/fontawesome-webfont.eot',
			paths.fontawesome + 'fonts/fontawesome-webfont.svg',
			paths.fontawesome + 'fonts/fontawesome-webfont.ttf',
			paths.fontawesome + 'fonts/fontawesome-webfont.woff',
			paths.fontawesome + 'fonts/fontawesome-webfont.woff2',
			paths.fontawesome + 'fonts/FontAwesome.otf',
		], paths.pubfont )
		.copy([
		   paths.pubfont + '*',
		], paths.budfont )
		.version( paths.pubcss + 'app.css')
		.phpUnit();
});

