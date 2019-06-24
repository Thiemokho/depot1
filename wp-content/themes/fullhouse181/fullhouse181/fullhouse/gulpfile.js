'use strict';

const gulp       = require('gulp'),
      cssnano    = require('cssnano'),
      sass       = require('gulp-sass'),
      sourcemaps = require('gulp-sourcemaps');
const glob       = require("glob");
const path       = require('path');
const fs         = require('fs-extra');
const rtlcss     = require('rtlcss');

const babel  = require('gulp-babel');
const concat = require('gulp-concat');
const inject = require('gulp-inject');
const uglify = require('gulp-uglify');

const browserSync = require('browser-sync');

//path
const linkWebsite = 'http://localhost/fullhouse';

let supported = [
    'last 2 versions',
    'safari >= 8',
    'ie >= 10',
    'ff >= 20',
    'ios 6',
    'android 4'
];

gulp.task('css', function () {
    return gulp.src(['sass/style.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        //.pipe(cssna({
        //    autoprefixer: {browsers: supported, add: true}
        //}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./css'));
});

gulp.task('css-estate', () => {
    return gulp.src(['sass/opalestate.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        //.pipe(cssnano({
        //    autoprefixer: {browsers: supported, add: true}
        //}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./css'));
});

gulp.task('css-idx', () => {
    return gulp.src(['sass/idx.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        //.pipe(cssnano({
        //    autoprefixer: {browsers: supported, add: true}
        //}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./css'));
});

gulp.task('css-skins', () => {
    return gulp.src(['sass/skins/**/*.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        //.pipe(cssnano({
        //    autoprefixer: {browsers: supported, add: true}
        //}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./css/skins'));
});


gulp.task('inject-opalestate-scss', () => {
    return gulp.src('sass/opalestate.scss')
        .pipe(inject(
            gulp.src([
                'sass/opalestate/*.scss'
            ], {read: false}), {
                transform: function (filepath) {
                    let filename = path.basename(filepath, '.scss').replace(/(^_)*/, '');
                    return `@import "opalestate/${filename}";`;
                }
            }
        ))
        .pipe(gulp.dest('sass/'));
});


gulp.task('watch', [
        'css',
        'css-estate',
        'css-idx',
        'css-skins',
    ]);


// ========================================================================
// ========================================================================
//                            Customize
// ========================================================================
// ========================================================================


gulp.task('start', ['css', 'css-estate', 'css-idx', 'css-skins', 'browser-sync', 'watch'], function () {
    gulp.watch('sass/**/*.scss', ['css']);
    gulp.watch('sass/**/*.scss', ['css-estate']);
    gulp.watch('sass/**/*.scss', ['css-idx']);
    gulp.watch('sass/**/*.scss', ['css-skins']);
    // Other watchers
});

// ========================================================================
// ========================================================================
//                                Live Reload
// ========================================================================
// ========================================================================
gulp.task('browser-sync', () => {
    let files = [
        './**/*.css',
        './**/*.php',
        './**/*.js',
    ];
    browserSync.init(files, {
        proxy    : linkWebsite,
        watchTask: true,
        port     : 8888,
        force    : true,
        open     : "local",
        ui       : false
        // browser: "google chrome",
    });
});
//
//gulp.task('default', ['watch']);
