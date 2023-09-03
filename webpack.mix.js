const mix = require('laravel-mix');
require('dotenv').config();

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

let distPath = mix.inProduction() ? 'resources/dist' : 'resources/pre-dist';

function themeCss(path) {
  return `${distPath}/css/${path}.css`
}

function themeJs(path) {
  return `${distPath}/js/${path}.js`
}

mix.copyDirectory('resources/assets/svg', distPath + '/svg')
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', distPath + '/fonts/fontawesome');

// Theme
mix.sass('resources/assets/sass/theme.scss', themeCss('theme'))
    .options({
        processCssUrls: false
    })
    .sourceMaps();
mix.js('resources/assets/js/theme.js', themeJs('theme')).sourceMaps();

