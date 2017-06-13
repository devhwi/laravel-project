var elixir = require('laravel-elixir');

elixir(function (mix) {
  mix
    .sass([
      // '../../../vendor/twbs/bootstrap/scss/bootstrap.scss',
      '../../../vendor/fortawesome/font-awesome/css/font-awesome.css',
      'app.scss',
    ])
    .scripts([
      '../vendor/jquery/dist/jquery.js',
      '../vendor/bootstrap-sass/assets/javascripts/bootstrap.js',
      'app.js'
    ], 'public/js/app.js')
    .version([
      'css/app.css',
      'js/app.js'
    ])
    .copy("../vendor/fortawesome/font-awesome/fonts", "public/build/fonts");
});
