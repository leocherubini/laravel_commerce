var elixir = require('laravel-elixir'),
    liveReload = require('gulp-livereload'),
    clean = require('rimraf'),
    gulp = require('gulp');

/**
 * Configuração da aplicação
 */
 var config = {
    assets_path: './resources/assets',
    build_path:  './public/build'
};

function swallowError (error) {

  // If you want details of the error in the console
  console.log(error.toString());

  this.emit('end');
}

config.bower_path = config.assets_path + '/../bower_components';

/**
 * Configuração do javascript
 */
 config.build_path_js = config.build_path + '/js';
 config.build_vendor_path_js = config.build_path_js +'/vendor';
 config.vendor_path_js = [
     config.bower_path + '/jquery/dist/jquery.min.js',
     config.bower_path + '/bootstrap/dist/js/bootstrap.min.js',
     config.bower_path + '/angular/angular.min.js',
     config.bower_path + '/angular-animate/angular-animate.min.js',
     config.bower_path + '/angular-messages/angular-messages.min.js',
     config.bower_path + '/angular-bootstrap/ui-bootstrap.min.js',
     config.bower_path + '/angular-strap/dist/modules/navbar.min.js',
     config.assets_path + '/js/contact.js'
 ];

/**
 * Configuração do css
 */
 config.build_path_css = config.build_path + '/css';
 config.build_vendor_path_css = config.build_path_css + '/vendor';
 config.vendor_path_css = [
    config.bower_path + '/normalize-css/normalize.css',
    config.bower_path + '/bootstrap/dist/css/bootstrap.min.css',
    config.bower_path + '/bootstrap/dist/css/bootstrap-theme.min.css',
 ];

/**
 * Task responsável pela copia do css em
 * "resources/assets" para "public/build/css" e
 * dos vendors para "public/build/css/vendor"
 */
 gulp.task('copy-styles', function()
 {
    gulp.src([
        config.assets_path + '/css/**/*.css'
    ])
        .pipe(gulp.dest(config.build_path_css))
        .pipe(liveReload());

    gulp.src(config.vendor_path_css)
        .pipe(gulp.dest(config.build_vendor_path_css))
        .pipe(liveReload());
});

/**
 * Task responsável pela copia do js em
 * "resources/assets" para "public/build/js" e
 * dos vendors para "public/build/js/vendor"
 */
 gulp.task('copy-scripts', function()
 {
    gulp.src([
        config.assets_path + '/js/**/*.js'
    ])
        .pipe(gulp.dest(config.build_path_js))
        .on('error', swallowError)
        .pipe(liveReload());

    gulp.src(config.vendor_path_js)
        .pipe(gulp.dest(config.build_vendor_path_js))
        .on('error', swallowError)
        .pipe(liveReload());
});

/**
 * Task responsável pela limpesa dos arquivos em
 * "public/build"
 */
 gulp.task('clear-build-folder', function()
 {
    clean.sync(config.build_path);
});

/**
 * Task default do gulp.
 * Para ser executado em produção
 * Concatena e minifica todos os css's e javascripts
 * da aplicação
 */
 gulp.task('default', ['clear-build-folder'], function()
 {

    elixir(function(mix)
    {
        mix.styles(config.vendor_path_css.concat([
            config.assets_path + '/css/**/*.css'
        ]), 'public/css/all.css', config.assets_path);

        mix.scripts(config.vendor_path_js.concat([
            config.assets_path + '/js/**/*.js'
        ]), 'public/js/all.js', config.assets_path);

        mix.version(['js/all.js', 'css/all.css']);
    });
}).on('error', swallowError);

/**
 * Task de desenvolvimento.
 * Para ser executado em ambiente de desenvolvimento
 * Executa as tarefas de copia de css e javascript
 * para o desenvolvimento
 */
 gulp.task('watch', ['clear-build-folder'], function()
 {
    liveReload.listen();
    gulp.start('copy-styles', 'copy-scripts');
    gulp.watch(config.assets_path + '/**',
    [
        'copy-styles',
        'copy-scripts'
    ]);
});


