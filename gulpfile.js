'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var pump = require('pump');
const imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync').create();

//Paths
var PATHS = {
    css: {
        src: ['src/web/sass/main.scss'] ,
        dest: [''],
        watch: ['src/web/sass/**/*.scss']
    },
    js: {
        src: ['src/web/js/**/*.js'],
        dest: [''],
        watch: ['src/web/js/**/*.js']
    },
    img: {
        src: ['src/web/img'],
        dest: [''],
        watch: ['src/web/img/*']
    }
};

gulp.task('sass', function () {
    return gulp.src(PATHS.css.src)
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest(PATHS.css.dest));
});

gulp.task('autoprefixer', function () {
    gulp.src(PATHS.css.dest)
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: falses
        }))
        .pipe(gulp.dest('dist'));
});

gulp.task('concat', function() {
    return gulp.src(PATHS.js.src)
        .pipe(concat('all.js'))
        .pipe(gulp.dest(PATHS.js.dest));
});

gulp.task('compress', function (cb) {
    pump([
            gulp.src(PATHS.js.src),
            uglify(),
            gulp.dest(PATHS.js.dest)
        ],
        cb
    );
});

gulp.task('imagemin', function () {
    gulp.src(PATHS.img.src)
        .pipe(imagemin())
        .pipe(gulp.dest(PATHS.img.dest))
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "govelo.dev"
    });
});

gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "./app"
    });

    gulp.watch("app/scss/*.scss", ['sass']);
    gulp.watch("app/*.html").on('change', browserSync.reload);
});

gulp.task('watch', function () {
    gulp.watch(PATHS.css.watch, ['sass']);
});