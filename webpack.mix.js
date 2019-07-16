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
	'public/js/src/libs/bootstrap.3.3.7.min.js',
	'public/js/src/libs/select2/select2.min.js'
];
var cssLibs = [
	'public/css/src/libs/bootstrap.3.3.7.min.css',
	'public/js/src/libs/select2/select2.min.css',
	'public/js/src/libs/select2/select2-bootstrap.min.css'
];

/* for app all common */
	//js

mix.scripts(jsLibs, 'public/js/all/mix-libs.js');
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
function useJsCommonNoMix() {
	return appendArr(['public/js/all/mix-libs.js'],[
		'public/js/app-footer.min.js'
	]);
}
function useJsModule(name, child='index', min=1) {
	return 'public/js/modules/'+name+'/'+child+(min?'.min':'')+'.js';
}
function useJsFile(name, min=1) {
	return 'public/js/'+name+(min?'.min':'')+'.js';
}

// for all

//if (mix.inProduction()) { //if in: npm run production
if(0) {
	mix.minTemplate = require('laravel-mix-template-minifier');
	mix.minTemplate('storage/framework/views/*.php', 'storage/framework/views/');
}
//}

//mix.js('resources/assets/js/app.js', 'public/js') .sass('resources/assets/sass/app.scss', 'public/css');

var useMix = [
	{
		title: 'home page',
		js: useJsCommonNoMix().concat([
			useJsFile('copy'),
			'public/js/src/glide/jquery.glide.min.js',
			'public/js/src/owl/owl.carousel.min.js',
			'public/js/run-slider.min.js'
		]),
		mixjs: 'public/js/home/mix-footer.js',
		css: [
			'public/css/src/libs/bootstrap.3.3.7.min.css',
			'public/css/home.min.css',
			'public/css/src/owl/owl.carousel.min.css',
			'public/css/src/owl/owl.theme.default.min.css'
		],
		mixcss: 'public/css/mix-home.css'
	},
	{
		title: 'detail page',
		js: useJsCommonNoMix().concat([
			useJsModule('store-detail'),
			useJsFile('copy')
		]),
		mixjs: 'public/js/detail/mix-footer.js',
		css: [
			'public/css/src/libs/bootstrap.3.3.7.min.css',
			'public/css/detail.min.css'
		],
		mixcss: 'public/css/mix-detail.css'
	},
	{
		title: 'category page',
		js: useJsCommonNoMix().concat([
			useJsModule('category'),
		]),
		mixjs: 'public/js/mix-category.js',
		css: [
			'public/css/src/libs/bootstrap.3.3.7.min.css',
			'public/css/category.min.css',
		],
		mixcss: 'public/css/mix-category.css'
	},
	{
		title: 'statics page',
		js: useJsCommonNoMix().concat([
		]),
		mixjs: 'public/js/statics/mix-footer.js',
		css: [
			'public/css/src/libs/bootstrap.3.3.7.min.css',
			'public/css/static_page.min.css',
		],
		mixcss: 'public/css/mix-static.css'
	},


];
/* for home page */
	//js using scripts(not minify) or combine (minify)
for(let i in useMix) if(useMix.hasOwnProperty(i)) {
	console.log('mix ---------- '+useMix[i].title);
	console.log('	js file: ', useMix[i].js);
	console.log('	css file: ', useMix[i].css);
	console.log("\n");
	mix.scripts(useMix[i].js, useMix[i].mixjs);
	mix.styles(useMix[i].css, useMix[i].mixcss);
}

mix.browserSync('localhost');
