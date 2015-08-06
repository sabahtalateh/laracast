var gulp = require('gulp');
var phpspec = require('gulp-phpspec');
var run = require('gulp-run');
var notify = require('gulp-notify');

gulp.task('test', function () {
    gulp.src('spec/**/*.php')
        .pipe(phpspec('', {
            notify: true,
            'verbose': 'v'
        }))
        .on('error', notify.onError({
            title: 'Crap',
            message: 'Test fails',
            icon: __dirname + '/fail.png'
        }))
        .pipe(notify({
            title: 'Yeah!',
            message: 'Tests are green',
            icon: __dirname + '/success.jpg'
        }));
});

gulp.task('watch', function () {
    gulp.watch(['spec/**/*.php', 'src/**/*.php'], ['test']);
});

gulp.task('default', ['test', 'watch']);

