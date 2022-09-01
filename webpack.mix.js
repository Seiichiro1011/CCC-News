const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.js('resources/js/app.js', 'public/js').vue()
 .sass('resources/sass/app.scss', 'public/css')
 .sass('resources/sass/admin.scss', 'public/css')
 .sass('resources/sass/profile.scss', 'public/css')
 .sass('resources/sass/login.scss', 'public/css')
 .sass('resources/sass/register.scss', 'public/css')
 .sass('resources/sass/category.scss', 'public/css')
 .sass('resources/sass/navbar.scss', 'public/css')
 .sass('resources/sass/footer.scss', 'public/css')
 .sass('resources/sass/country.scss', 'public/css');