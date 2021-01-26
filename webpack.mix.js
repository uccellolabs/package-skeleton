const mix = require('laravel-mix')

const autoload = {
   jquery: [ '$', 'jQuery', 'jquery']
}
mix.autoload(autoload)

mix.setPublicPath('public')

mix.js('./resources/js/script.js', 'public/js')
   .sass('./resources/sass/styles.scss', 'public/css')
   .version()

mix.after(webpackStats => {
    // Copy all compiled files into main project (auto publishing)
    mix.copyDirectory('public', '../../../public/vendor/uccello/package-skeleton');
});
