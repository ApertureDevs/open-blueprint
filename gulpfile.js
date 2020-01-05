'use strict';

let gulp = require('gulp');
let sass = require('gulp-sass');
let postcss = require('gulp-postcss')
let autoprefixer = require('autoprefixer')
sass.compiler = require('node-sass');

gulp.task('css', () => {
    return gulp.src('./src/scss/styles.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([ autoprefixer() ]))
        .pipe(gulp.dest('./dist/css/'));
});

gulp.task('css:watch', () => {
    gulp.watch('./src/scss/**/*.scss', ['sass']);
});
