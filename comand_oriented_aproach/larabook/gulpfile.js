//var elixir = require('laravel-elixir');
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

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

//elixir(function (mix) {
//    mix.sass('app.scss');
//});

gulp.task('css', function () {
    gulp.src('resources/assets/sass/main.scss')
        .pipe(sass())
        .pipe(autoprefixer('last 15 version'))
        .pipe(gulp.dest('public/css'));
});

gulp.task('watch', function () {
    gulp.watch('resources/assets/sass/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);
