'use strict';

var gulp = require('gulp'),
    watch = require('gulp-watch'),
    prefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps'),
    rigger = require('gulp-rigger'),
    cssmin = require('gulp-minify-css'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    rimraf = require('rimraf'),
    browserSync = require("browser-sync"),
    less = require("gulp-less"),
    reload = browserSync.reload,
    combined = require('stream-combiner2');

var path = {
    build: { //куда складывать готовые после сборки файлы
        html: 'wp-content/themes/vt/public/',
        js: 'wp-content/themes/vt/public/js/',
        spec_js: 'wp-content/themes/vt/public/js/partials/',
        css: 'wp-content/themes/vt/public/css/',
        style_libs: 'wp-content/themes/vt/public/css/',
        img: 'wp-content/themes/vt/public/img/',
        fonts: 'wp-content/themes/vt/public/fonts/'
    },
    src: { //Пути откуда брать исходники
        html: 'wp-content/themes/vt/src/*.html',
        js: 'wp-content/themes/vt/src/js/main.js',
        spec_js: 'wp-content/themes/vt/src/js/partials/spec_*.js',
        style: 'wp-content/themes/vt/src/style/main.less',
        style_libs: 'wp-content/themes/vt/src/style/libs.less',
        img: 'wp-content/themes/vt/src/img/**/*',
        fonts: 'wp-content/themes/vt/src/fonts/**/*.*'
    },
    watch: { //за изменением каких файлов мы хотим наблюдать
        html: 'wp-content/themes/vt/src/**/*.html',
        js: 'wp-content/themes/vt/src/js/**/*.js',
        style: 'wp-content/themes/vt/src/style/partials/*.less',
        style_libs: 'wp-content/themes/vt/src/style/libs.less',
        style_main: 'wp-content/themes/vt/src/style/main.less',
        img: 'wp-content/themes/vt/src/img/**/*.*',
        fonts: 'wp-content/themes/vt/src/fonts/**/*.*'
    },
    clean: 'wp-content/themes/vt/public'
};

var config = {
    server: {
        baseDir: "wp-content/themes/vt/public"
    },
    tunnel: true,
    host: 'localhost',
    port: 3000,
    logPrefix: "Local Server"
};

/*Таск сборки html*/
gulp.task('html:build', function () {
    gulp.src(path.src.html) //Выберем файлы по нужному пути
        .pipe(rigger()) //Прогоним через rigger
        .pipe(gulp.dest(path.build.html)) //Выплюнем их в папку public
        .pipe(reload({stream: true})); //И перезагрузим наш сервер для обновлений
});
/*rigger, позволяет использовать такую конструкцию для импорта файлов:
//= template/footer.html
*/

/*Таск сборки js*/
gulp.task('js:build', function () {
    gulp.src(path.src.js) //Найдем наш main файл
        .pipe(rigger()) //Прогоним через rigger
        .pipe(sourcemaps.init()) //Инициализируем sourcemap
        //.pipe(uglify()) //Сожмем наш js
        .pipe(sourcemaps.write()) //Пропишем карты
        .pipe(gulp.dest(path.build.js)) //Выплюнем готовый файл в public
        .pipe(reload({stream: true})); //И перезагрузим сервер
});
gulp.task('spec_js:build', function () {
    gulp.src(path.src.spec_js) //Найдем файлы
        .pipe(rigger()) //Прогоним через rigger
        .pipe(sourcemaps.init()) //Инициализируем sourcemap
        //.pipe(uglify()) //Сожмем наш js
        .pipe(sourcemaps.write()) //Пропишем карты
        .pipe(gulp.dest(path.build.spec_js)) //Выплюнем готовый файл в public
        .pipe(reload({stream: true})); //И перезагрузим сервер
});

/*Таск сборки less*/
gulp.task('style_main:build', function () {
    gulp.src(path.src.style) //Выберем наш main.less
        .pipe(sourcemaps.init()) //То же самое что и с js
        .pipe(less()) //Скомпилируем
        .pipe(prefixer()) //Добавим вендорные префиксы
        .pipe(cssmin()) //Сожмем
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.css)) //И в public
        .pipe(reload({stream: true}));
});
gulp.task('style_libs:build', function () {
    gulp.src(path.src.style_libs) //Выберем наш main.less
        .pipe(sourcemaps.init()) //То же самое что и с js
        .pipe(less()) //Скомпилируем
        .pipe(prefixer()) //Добавим вендорные префиксы
        .pipe(cssmin()) //Сожмем
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.css)) //И в public
        .pipe(reload({stream: true}));
});

/*Таск сборки картинок*/
gulp.task('image:build', function () {
    gulp.src(path.src.img) //Выберем наши картинки
        .pipe(imagemin({ //Сожмем их
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()],
            interlaced: true
        }))
        .pipe(gulp.dest(path.build.img)) //И бросим в public
        .pipe(reload({stream: true}));
});

/*Таск для шрифтов*/
gulp.task('fonts:build', function() {
    gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts))
});

/*Таск сборки всего*/
gulp.task('build', [
    'html:build',
    'js:build',
    'spec_js:build',
    'style_main:build',
    'style_libs:build',
    'fonts:build',
    'image:build'
]);

/*Watcher таск*/
gulp.task('watch', function(){
    watch([path.watch.html], function(event, cb) {
        gulp.start('html:build');
    });
    watch([path.watch.style], function(event, cb) {
        gulp.start('style_main:build');
    });
    watch([path.watch.style_libs], function(event, cb) {
        gulp.start('style_libs:build');
    });
    watch([path.watch.js], function(event, cb) {
        gulp.start('js:build');
        gulp.start('spec_js:build');
    });
    watch([path.watch.img], function(event, cb) {
        gulp.start('image:build');
    });
    watch([path.watch.fonts], function(event, cb) {
        gulp.start('fonts:build');
    });
});

/*Таск запуска вебсервера*/
gulp.task('webserver', function () {
    browserSync(config);
});

/*Cleaner таск (очищаем папку продакшна*/
gulp.task('clean', function (cb) {
    rimraf(path.clean, cb);
});

gulp.task('default', ['build', 'webserver', 'watch']);
//gulp.task('default', ['build', 'watch']);