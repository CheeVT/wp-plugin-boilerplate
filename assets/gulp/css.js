import gulp from 'gulp';
import plumber from 'gulp-plumber';
import sourcemaps from "gulp-sourcemaps";
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import postcss from 'gulp-postcss';
import flexBugsFix from 'postcss-flexbugs-fixes';
import sassLinter from 'gulp-sass-lint';
import autoprefixer from 'autoprefixer';
import clean from 'gulp-clean';
import postcssPresetEnv from 'postcss-preset-env';
//import concatCss from 'gulp-concat-css';
//import cleanCss from 'gulp-clean-css';

const sass = gulpSass( dartSass );

// utils
import { msgERROR } from './utils';

export const cssDev = () => {
	return (
		gulp
			.src(['assets/scss/plugin.scss'])
			.pipe(plumber(msgERROR))
			/* source maps are disabled because they are not used that often, to make them work just uncoment them and the import from above */
			.pipe(sourcemaps.init())
			.pipe(sass({ outputStyle: 'expanded', includePaths: ['node_modules'] }))
			.pipe(sourcemaps.write("."))
			.pipe(gulp.dest('./dist/'))
	);
};

export const cssProd = () => {
	const plugins = [
		autoprefixer({
			grid: true,
		}),
		postcssPresetEnv({
			stage: 4, // stage can be set to 0 for experimental properties, properties that will be enabled to older browsers trought polifyls
		}),
		flexBugsFix,
	];
	return gulp
		.src(['assets/scss/plugin.scss'])
		.pipe(sass({ outputStyle: 'compressed', includePaths: ['node_modules'] }))
		.pipe(postcss(plugins))
		.pipe(gulp.dest('./dist/'));
};

export const cssClean = () => {
	return gulp
		.src(['./plugin.css.map'], { read: false, allowEmpty: true })
		.pipe(clean());
};

export const sassLint = () => {
	return gulp
		.src('assets/scss/**/*.scss')
		.pipe(
			sassLinter({
				config: '.sass-lint.yml',
			}),
		)
		.pipe(sassLinter.format())
		.pipe(sassLinter.failOnError());
};