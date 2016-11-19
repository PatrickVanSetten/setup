var gulp = require('gulp');
var gutil = require('gulp-util');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
var sh = require('shelljs');
var ftp = require( 'vinyl-ftp' );
var livereload = require('gulp-livereload');

var paths = {
 sass: ['./assets/scss/**']
};

gulp.task('default', ['sass']);

gulp.task('sass', function(done) {
    gulp.src('./assets/scss/{global,head}.scss')
   .pipe(sass())
   .on('error', sass.logError)
   .pipe(gulp.dest('./assets/css/'))
   .pipe(minifyCss({
     keepSpecialComments: 0
   }))
   .pipe(rename({ extname: '.min.css' }))
   .pipe(gulp.dest('./assets/css/'))
   .pipe(livereload())
   .on('end', done);
});

gulp.task('watch', function() {
	livereload.listen();
	gulp.watch(paths.sass, ['sass']);
});