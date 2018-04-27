'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

var DEST = 'dist/css';

gulp.task('default', function() {
  return gulp.src('src/styles/*.scss')
    // This will output the non-minified version
    // This will clean up our css with compatibliity to ie8
    .pipe(sass().on('error', sass.logError))
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
//    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest(DEST));
});

gulp.task('copy', function() {
  gulp.src(['dist/css/barebones.css'])
  .pipe(gulp.dest('css'));
});
