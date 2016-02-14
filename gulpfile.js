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
            './bower_components/owl.carousel/dist/owl.carousel.js',
            './bower_components/bootstrap-filestyle/src/bootstrap-filestyle.js',
            './bower_components/select2/dist/js/select2.full.js',
            './bower_components/typed.js/dist/typed.min.js'
        ], 'public/assets/js/vendor.js')
        .scripts([
            'app.js'
        ], 'public/assets/js/app.js')
        .scripts([
            'payment.js'
        ], 'public/assets/js/payment.js')
        .copy('./bower_components/font-awesome/fonts/', 'public/assets/fonts')
        .copy('./resources/assets/images/', 'public/assets/images');
});