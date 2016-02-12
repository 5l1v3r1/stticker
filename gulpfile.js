var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss', 'public/assets/css')
        .scripts([
            './bower_components/html5shiv/dist/html5shiv.js',
            './bower_components/respond/dest/respond.src.js'
        ], 'public/assets/js/pre.js')
        .scripts([
            './bower_components/jquery/dist/jquery.js',
            './bower_components/tether/dist/js/tether.js',
            './bower_components/bootstrap/dist/js/bootstrap.js',
            './bower_components/sweetalert/dist/sweetalert-dev.js',
            './bower_components/owl.carousel/dist/owl.carousel.js'
        ], 'public/assets/js/vendor.js')
        .scripts([
            'app.js'
        ], 'public/assets/js/app.js')
        .copy('./bower_components/font-awesome/fonts/*', 'public/assets/fonts');
});