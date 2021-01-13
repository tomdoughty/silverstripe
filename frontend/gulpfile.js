const gulp = require('gulp');
const sass = require('gulp-sass');
const cleanCss = require('gulp-clean-css');
const webpack = require('webpack-stream');
const path = require('path');

// Compile SCSS
function compileCSS() {
  return gulp.src([
    './scss/main.scss',
  ])
  .pipe(sass())
  .on('error', sass.logError)
  .pipe(cleanCss())
  .pipe(gulp.dest('../public/css/'));
}

// Compile JS
function compileJS() {
  return gulp.src([
    './javascript/main.js',
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
    resolve: {
      alias: {
        'node_modules': path.join(__dirname, 'node_modules'),
      }
    },
    target: 'web',
  }))
  .pipe(gulp.dest('../public/javascript/'));
}

gulp.task('default', () => {
  // Compile CSS
  compileCSS();
  // Compile JS
  compileJS();

  // Watch src CSS and recompile dist
  gulp.watch('./scss/**/*.scss', gulp.series([compileCSS]));

  // Watch src JS and recompile dist
  gulp.watch('./javascript/**/*.js', gulp.series([compileJS]));
});

gulp.task('build', (done) => {
  // Compile CSS
  compileCSS();
  // Compile JS
  compileJS();
  // Exit
  done();
});
