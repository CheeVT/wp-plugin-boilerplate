import gulp from 'gulp';
import browserify from 'browserify';
import babelify from 'babelify';
import source from 'vinyl-source-stream';
import buffer from 'vinyl-buffer';
// import sourcemaps from "gulp-sourcemaps";
import uglify from 'gulp-uglify';
import clean from 'gulp-clean';
import eslint from 'gulp-eslint';

export const jsDev = () => {
    return (
        browserify({
            entries: ['assets/js/plugin.js'],
            transform: [
                babelify.configure({
                    presets: [['@babel/preset-env']],
                    plugins: ['babel-plugin-loop-optimizer'],
                }),
            ],
        })
            .bundle()
            /* this file wont be minified, its named that way because of the import into html file */
            .pipe(source('plugin.js'))
            .pipe(buffer())
            /* source maps are disabled because they are not used that often, to make them work just uncoment them and the import from above */
            //.pipe(sourcemaps.init())
            //.pipe(sourcemaps.write("."))
            .pipe(gulp.dest('dist'))
    );
};

export const jsCLean = () => {
    return gulp
        .src(['dist/plugin.min.js.map'], { read: false, allowEmpty: true })
        .pipe(clean());
};

export const jsLint = () => {
    return gulp
        .src(['assets/js/inc/*.js', 'assets/js/plugin.js'])
        .pipe(eslint())
        .pipe(eslint.format());
};