'use strict';

var gulp = require('gulp'),
    watch = require('gulp-watch'),
    prefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    sass = require('gulp-sass'),
    rigger = require('gulp-rigger'),
    cssmin = require('gulp-minify-css'),
    rimraf = require('rimraf'),
    browserSync = require("browser-sync"),
    babel = require("gulp-babel");

var path = {
    build: {
        js: 'wp-content/themes/vt/public/js/',
        style_libs: 'wp-content/themes/vt/public/css/',
        style: 'wp-content/themes/vt/'
    },
    src: {
        js: 'wp-content/themes/vt/src/js/main.js',
        js_libs: 'wp-content/themes/vt/src/js/libs.js',

        style: 'wp-content/themes/vt/src/style/style.scss',
        style_libs: 'wp-content/themes/vt/src/style/libs.scss'
    },
    watch: {
        js: 'wp-content/themes/vt/src/js/partials/*.js',
        js_libs: 'wp-content/themes/vt/src/js/libs.js',
        style: 'wp-content/themes/vt/src/style/partials/*.scss',
        style_libs: 'wp-content/themes/vt/src/style/libs.scss',
        style_css: 'wp-content/themes/vt/src/style/**/*.css'
    }
};


gulp.task('js:build', function () {
    gulp.src(path.src.js)
        .pipe(rigger())
        .pipe(babel({
            presets: ['env']
        }))
        .pipe(uglify())
        .pipe(gulp.dest(path.build.js))
});


gulp.task('js_libs:build', function () {
    gulp.src(path.src.js_libs)
        .pipe(rigger())
        .pipe(gulp.dest(path.build.js))
});


gulp.task('style:build', function () {
    gulp.src(path.src.style)
        .pipe(sass().on('error', sass.logError))
        .pipe(prefixer())
        .pipe(cssmin())
        .pipe(gulp.dest(path.build.style))
});

gulp.task('style_libs:build', function () {
    gulp.src(path.src.style_libs)
        .pipe(sass())
        .pipe(prefixer())
        .pipe(cssmin())
        .pipe(gulp.dest(path.build.style_libs))
});



gulp.task('build', [
    'js:build',
    'js_libs:build',
    'style:build',
    'style_libs:build',
]);

gulp.task('watch', function(){
    watch([path.watch.style], function(event, cb) {
        gulp.start('style:build');
    });
    watch([path.watch.style_libs], function(event, cb) {
        gulp.start('style_libs:build');
    });
    watch([path.watch.js], function(event, cb) {
        gulp.start('js:build');
    });
    watch([path.watch.js_libs], function(event, cb) {
        gulp.start('js_libs:build');
    });
});

gulp.task('default', ['build' , 'watch']);