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
 //for minify blade:
/* function common */
function appendArr(resArr, arr) {
	return resArr.slice().concat(arr);
}
/* for function common */
var jsLibs = [
	'public/js/src/libs/jquery.3.2.1.min.js',
	'public/js/src/libs/bootstrap.3.3.7.min.js'
];
var cssLibs = [
	'public/css/src/libs/bootstrap.3.3.7.min.css'
];

/* for app all common */
	//js
mix.scripts(appendArr(jsLibs,[
	'public/js/app-footer.min.js'
]), 'public/js/all/mix-footer.js');
	//css
mix.styles([
	'public/css/src/libs/bootstrap.3.3.7.min.css',
	'public/css/app.min.css',
], 'public/css/all/mix.css');
function useJsCommon() {
	return 'public/js/all/mix-footer.js';
}
function useJsModule(name, child='index', min=1) {
	return 'public/js/modules/'+name+'/'+child+(min?'.min':'')+'.js';
}
function useJsFile(name, min=1) {
	return 'public/js/'+name+(min?'.min':'')+'.js';
}

// for all

if (mix.inProduction()) { //if in: npm run production
	//mix.minTemplate = require('laravel-mix-template-minifier');
	//mix.minTemplate('storage/framework/views/*.php', 'storage/framework/views/');
}

//mix.js('resources/assets/js/app.js', 'public/js') .sass('resources/assets/sass/app.scss', 'public/css');
/* for home page */
	//js using scripts(not minify) or combine (minify)
mix.scripts([
	useJsCommon(),
	useJsFile('copy'),
	'public/js/src/glide/jquery.glide.min.js',
	'public/js/src/owl/owl.carousel.min.js',
	'public/js/run-slider.min.js',
	'public/js/app-footer.min.js'
], 'public/js/home/mix-footer.js');
	//css
mix.styles([
	'public/css/src/libs/bootstrap.3.3.7.min.css',
	'public/css/home.min.css',
	'public/css/src/owl/owl.carousel.min.css',
	'public/css/src/owl/owl.theme.default.min.css'
], 'public/css/home/mix.css');

/* for store detail */
	//css
mix.styles([
	'public/css/src/libs/bootstrap.3.3.7.min.css',
	'public/css/detail.min.css',
], 'public/css/detail/mix.css');
mix.scripts([
	useJsCommon(),
	useJsModule('store-detail'),
	useJsFile('copy')
], 'public/js/home/mix-footer.js');
/* for catgory page */
	//css
mix.styles([
	'public/css/src/libs/bootstrap.3.3.7.min.css',
	'public/css/category.min.css',
], 'public/css/category/mix.css');
	//js
mix.scripts([
	useJsCommon(),
	useJsModule('category'),
], 'public/js/category/mix-footer.js');
console.log(useJsModule('category'));

/* for static */
	//css
mix.styles([
	'public/css/src/libs/bootstrap.3.3.7.min.css',
	'public/css/static_page.min.css',
], 'public/css/static/mix.css');

mix.browserSync('localhost');
