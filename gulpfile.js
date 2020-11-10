const gulp = require('gulp');
const sass = require('gulp-sass');
const cleanCss = require('gulp-clean-css');
const webpack = require('webpack-stream');

const themeDir = './themes/tomdoughty';

// Compile SCSS
function compileCSS() {
  return gulp.src([
    `${themeDir}/css/scss/main.scss`,
  ])
  .pipe(sass())
  .on('error', sass.logError)
  .pipe(cleanCss())
  .pipe(gulp.dest(`${themeDir}/css/`));
}

// Compile JS
function compileJS() {
  return gulp.src([
    `${themeDir}/javascript/modules/main.js`,
  ])
  .pipe(webpack({
    mode: 'production',
    module: {
      rules: [
        {
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env'],
            },
          },
        },
      ],
    },
    output: {
      filename: 'main.js',
    },
    target: 'web',
  }))
  .pipe(gulp.dest(`${themeDir}/javascript/`));
}

gulp.task('default', () => {
  // Compile CSS
  compileCSS();
  // Compile JS
  compileJS();

  // Watch src CSS and recompile dist
  gulp.watch(`${themeDir}/css/scss/**/*.scss`, gulp.series([compileCSS]));

  // Watch src JS and recompile dist
  gulp.watch(`${themeDir}/javascript/modules/**/*.js`, gulp.series([compileJS]));
});
