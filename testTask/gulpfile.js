'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css');

sass.compiler = require('node-sass');

gulp.task('default', function () {
  return gulp.src('./style/sass/*.sass')
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(gulp.dest('./style/css'));
});
