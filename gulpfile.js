const elixir = require('laravel-elixir');

var fs = require('fs');
var path = require('path');

var gulp = require('gulp');

// Load all gulp plugins automatically
// and attach them to the `plugins` object
var plugins = require('gulp-load-plugins')();

// Temporary solution until gulp 4
// https://github.com/gulpjs/gulp/issues/355
var runSequence = require('run-sequence');

var pkg = require('./package.json');
var dirs = pkg['h5bp-configs'].directories;
var cleanCSS = require('gulp-clean-css');
require('laravel-elixir-vue');

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



gulp.task('sass', function(){
   return gulp.src(dirs.src + '/sass/*.scss')
        .pipe(plugins.sass())
        .pipe(plugins.csscomb())
        .pipe(plugins.cssbeautify({indent: '  '}))
        .pipe(plugins.autoprefixer({
            browsers: ['last 2 versions', 'ie >= 8', '> 1%'],
            cascade: false
        }))
        .pipe(gulp.dest(dirs.dist + '/css'));
});

gulp.task('minify', function(){
   return gulp.src([dirs.dist + '/css/*.css', '!' + dirs.dist + '/css/*.min.css'])
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(plugins.rename({suffix : '.min'}))
        .pipe(gulp.dest(dirs.dist + '/css'));
});

gulp.task('dev', function(done){
    runSequence(
        ['sass'],
        done);
});

gulp.task('prod', function(done){
    runSequence(
        'sass',
        'minify',
        done);
});