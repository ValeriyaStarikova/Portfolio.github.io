'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css');
var svgSprite = require('gulp-svg-sprite');

sass.compiler = require('node-sass');

gulp.task('default', function () {
  return gulp.src('./style/sass/*.sass')
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(gulp.dest('./style/css'));
});

gulp.task('svgSprite', function () {
    return gulp.src('img/icon/*.svg')
        .pipe(svgSprite({
                mode: {
                    stack: {
                        sprite: "../sprite.svg"
                    }
                },
            }
        ))
        .pipe(gulp.dest('img/icon/'));
});
