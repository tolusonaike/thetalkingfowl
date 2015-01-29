var gulp = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-compass'),
    uglify = require('gulp-uglify'),
    watch = require('gulp-watch'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload');

// sass task
gulp.task('sass', function() {
    gulp.src('./src/scss/*.scss')
        .pipe(sass({
            config_file: './config.rb',
            css: './',
            sass: './src/scss'
        }))
        .pipe(gulp.dest('./'));
});

// uglify task
gulp.task('js', function() {
    // main app js file
    gulp.src('./src/js/app.js')
        .pipe(uglify())
        .pipe(concat("app.min.js"))
        .pipe(gulp.dest('./js/'));

    // create vendor.min.js file from all vendor plugin code
    gulp.src(
            [
                // Vendor
                "bower_components/foundation/js/vendor/fastclick.js",
                "bower_components/foundation/js/vendor/placeholder.js"
            ]
        )
        .pipe(uglify())
        .pipe(concat("vendor.min.js"))
        .pipe(gulp.dest('./js/'));

    // create foundation.min.js file from all vendor plugin code
    gulp.src(
            [
                // Foundation Core
                "bower_components/foundation/js/foundation/foundation.js",
                "bower_components/foundation/js/foundation/foundation.abide.js",
                "bower_components/foundation/js/foundation/foundation.accordion.js",
                "bower_components/foundation/js/foundation/foundation.alert.js",
                "bower_components/foundation/js/foundation/foundation.clearing.js",
                "bower_components/foundation/js/foundation/foundation.dropdown.js",
                "bower_components/foundation/js/foundation/foundation.equalizer.js",
                "bower_components/foundation/js/foundation/foundation.interchange.js",
                "bower_components/foundation/js/foundation/foundation.joyride.js",
                "bower_components/foundation/js/foundation/foundation.magellan.js",
                "bower_components/foundation/js/foundation/foundation.offcanvas.js",
                "bower_components/foundation/js/foundation/foundation.orbit.js",
                "bower_components/foundation/js/foundation/foundation.reveal.js",
                "bower_components/foundation/js/foundation/foundation.tab.js",
                "bower_components/foundation/js/foundation/foundation.tooltip.js",
                "bower_components/foundation/js/foundation/foundation.topbar.js"
                // Custom Vendor
            ]
        )
        .pipe(uglify())
        .pipe(concat("foundation.min.js"))
        .pipe(gulp.dest('./js/'));
});



gulp.task('watch', function() {

        var server = livereload();
        gulp.watch('./src/scss/**/*.scss',['sass']);


        gulp.watch('./src/js/**/*.js', ['js']);

        gulp.watch('./**/*.php').on('change', function(file) {
            server.changed(file.path);
        });

        gulp.watch('./js/**/*.js').on('change', function(file) {
            server.changed(file.path);
        });

        gulp.watch('./**/*.css').on('change', function(file) {
            server.changed(file.path);
        });


});

gulp.task('default', [
            'sass'
            , 'js'
            , 'watch'
            ]);