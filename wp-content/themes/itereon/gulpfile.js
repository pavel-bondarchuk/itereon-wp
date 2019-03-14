'use strict';

/**************** gulpfile.js configuration ****************/

const

	// directory locations
	dir = {
		src: 'assets/src/',
		build: 'assets/dist/'
	},

	// modules
	gulp = require( 'gulp' ),
	newer = require( 'gulp-newer' ),
	size = require( 'gulp-size' ),
	imagemin = require( 'gulp-imagemin' ),
	sass = require( 'gulp-sass' ),
	postcss = require( 'gulp-postcss' ),
	sassGlob = require( 'gulp-sass-glob' ),
	sourcemaps = require( 'gulp-sourcemaps' ),
	rename = require( 'gulp-rename' ),
	browsersync = require( 'browser-sync' ).create();

// Default error handler
const onError = function( err ) {
	console.log( 'An error occured:', err.message );
	this.emit( 'end' );
}

/**************** images task ****************/

const imgConfig = {
	src: dir.src + 'img/**/*',
	build: dir.build + 'img/',
	minOpts: {
		optimizationLevel: 5
	}
};

function images() {

	return gulp.src( imgConfig.src )
		.pipe( newer( imgConfig.build ) )
		.pipe( imagemin( imgConfig.minOpts ) )
		.pipe( size( {showFiles: true} ) )
		.pipe( gulp.dest( imgConfig.build ) );

}

/**************** CSS task ****************/

const cssConfig = {

	src: [dir.src + 'scss/main.scss', dir.src + 'scss/login.scss'],
	watch: dir.src + 'scss/**/*',
	build: dir.build + 'css/',
	sassOpts: {
		sourceMap: true,
		outputStyle: 'nested',
		imagePath: '/img/',
		precision: 3,
		errLogToConsole: true
	},

	postCSS: [
		require( 'autoprefixer' )( {
			browsers: ['> 1%']
		} ),
		require( 'cssnano' )
	]

};

function styles() {

	return gulp.src( cssConfig.src )
		.pipe( sourcemaps.init() )
		.pipe( sassGlob() )
		.pipe( sass( cssConfig.sassOpts ).on( 'error', sass.logError ) )
		.pipe( postcss( cssConfig.postCSS ) )
		.pipe( sourcemaps.write() )
		.pipe( size( {showFiles: true} ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( cssConfig.build ) )
		.pipe( browsersync.reload( {stream: true} ) );
}

/**************** JS task ****************/

const jsConfig = {

	src: dir.src + 'js/**/*.js',
	watch: dir.src + 'js/**/*',
	build: dir.build + 'css/',
	sassOpts: {
		sourceMap: true,
		outputStyle: 'nested',
		imagePath: '/img/',
		precision: 3,
		errLogToConsole: true
	},

	postCSS: [
		require( 'autoprefixer' )( {
			browsers: ['> 1%']
		} ),
		require( 'cssnano' )
	]

};

function js() {

	return gulp.src(['file.js'])
		.pipe(jshint('.jshintrc'))
		.pipe(jshint.reporter('jshint-stylish'))
}

/**************** browser-sync task ****************/

const syncConfig = {
	proxy: {
		target: "http://wp.test" // UPDATE TO YOUR LOCAL DOMAIN
	},
	port: 8000,
	files: [
		dir.src + '/**/*.*',
		{
			match: ["./**/*.php"],
			fn: function( event, file ) {
				/** Custom event handler **/
			},
			options: {
				ignored: '*.txt'
			}
		}
	],
	open: false
};

// browser-sync
function bs() {
	return browsersync.init( syncConfig );
}

/**************** watch task ****************/

// gulp.task( 'default', ['css', 'browsersync'], () => {
// 	// image changes
// 	gulp.watch( imgConfig.src, ['images'] );
// 	// CSS changes
// 	gulp.watch( cssConfig.watch, ['css'] );
//
// } );
exports.styles = styles;
exports.images = images;