// gulp
import gulp, { parallel, series } from 'gulp';

// js tasks
import { jsDev, jsCLean, jsLint } from './assets/gulp/javascript';

// css tasks
import { cssDev, cssProd, sassLint } from './assets/gulp/css';

const watch = () => {
    gulp.watch('assets/sass/**/*.scss', parallel(cssDev, sassLint));

    gulp.watch('assets/js/**/*.js', parallel(jsDev, jsLint));
    // myBrowsersync();
};

// for development build write in console: npm run dev
export const dev = parallel(jsDev, cssDev, sassLint);

// for production build write in console: npm run prod
export const prod = parallel(cssProd, jsCLean);

exports.default = series(dev, watch);