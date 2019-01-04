var gulp = require('gulp');
var sass = require('gulp-sass');
var gutil = require('gulp-util');

gulp.task('style', function () {
    gulp.src('scss/*.scss')
        .pipe(sass())
        .on('error', gutil.log)
        .pipe(gulp.dest('css'));
});

gulp.task('default', ['style']);

gulp.task('watch', function () {
    gulp.watch('scss/**/*.scss', ['style']);
});
