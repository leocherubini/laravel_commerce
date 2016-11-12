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

config.bower_path = config.assets_path + '/../bower_components';

/**
 * Configuração do javascript
 */
config.build_path_js = config.build_path + '/js';
config.build_vendor_path_js = config.build_path_js +'/vendor';
config.vendor_path_js = [
    // Vendor Javascripts
    config.bower_path + '/jquery/dist/jquery.min.js',
    config.bower_path + '/bootstrap/dist/js/bootstrap.min.js',
    config.bower_path + '/angular/angular.min.js',
    config.bower_path + '/angular-animate/angular-animate.min.js',
    config.bower_path + '/angular-messages/angular-messages.min.js',
    config.bower_path + '/angular-bootstrap/ui-bootstrap.min.js',
    config.bower_path + '/angular-strap/dist/modules/navbar.min.js',
    config.bower_path + '/jasny-bootstrap/dist/js/jasny-bootstrap.min.js',
    config.bower_path + '/holderjs/holder.js',

    // Custom Javascripts
    config.assets_path + '/js/jquery.scrollUp.min.js',
    config.assets_path + '/js/price-range.js',
    config.assets_path + '/js/jquery.prettyPhoto.js',
    config.assets_path + '/js/main.js',
];

/**
 * Configuração do css
 */
config.build_path_css = config.build_path + '/css';
config.build_vendor_path_css = config.build_path_css + '/vendor';
config.vendor_path_css = [
    // Vendor CSS
    config.bower_path + '/normalize-css/normalize.css',
    config.bower_path + '/bootstrap/dist/css/bootstrap.min.css',
    config.bower_path + '/bootstrap/dist/css/bootstrap-theme.min.css',
    config.bower_path + '/jasny-bootstrap/dist/css/jasny-bootstrap.min.css',

    // Custom CSS
    config.assets_path + '/css/font-awesome.min.css',
    config.assets_path + '/css/prettyPhoto.css',
    config.assets_path + '/css/animate.css',
    config.assets_path + '/css/main.css',
    config.assets_path + '/css/responsive.css',
    config.assets_path + '/css/product_tags.css',
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
        .pipe(liveReload());

    gulp.src(config.vendor_path_js)
        .pipe(gulp.dest(config.build_vendor_path_js))
        .pipe(liveReload());
});

 /**
 * Task responsável pela copia dos fonts em
 * "bower_componenst/bootstrap/dist/fonts" para 
 * "public/build/fonts"
 */
gulp.task('copy-fonts', function()
{
    gulp.src([
        config.assets_path + '/fonts/*'
    ])
        .pipe(gulp.dest('public/build/fonts'))
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

        mix.copy(
            config.assets_path + '/fonts',
            'public/build/fonts'
        );
    });
});

/**
 * Task de desenvolvimento.
 * Para ser executado em ambiente de desenvolvimento
 * Executa as tarefas de copia de css e javascript
 * para o desenvolvimento
 */
 gulp.task('watch', ['clear-build-folder'], function()
 {
    liveReload.listen();
    gulp.start('copy-styles', 'copy-scripts', 'copy-fonts');
    gulp.watch(config.assets_path + '/**',
    [
        'copy-styles',
        'copy-scripts',
        'copy-fonts'
    ]);
});


