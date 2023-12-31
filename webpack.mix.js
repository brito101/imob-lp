const mix = require("laravel-mix");
require("laravel-mix-purgecss");

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

mix.js("resources/js/app.js", "public/js")
    .copy("resources/img", "public/img")
    .sass("resources/sass/app.scss", "public/css")
    /** Admin */
    .scripts(["resources/js/company.js"], "public/js/company.js")
    .scripts(["resources/js/address.js"], "public/js/address.js")
    .scripts(["resources/js/phone.js"], "public/js/phone.js")
    
    /** Site */
    .sass("resources/sass/site/style.scss", "public/css/site/style.css")
    .scripts(["resources/js/site/modernizr.js"], "public/js/site/modernizr.js")
    .scripts(["resources/js/site/plugin.js"], "public/js/site/plugin.js")
    .scripts(["resources/js/site/script.js"], "public/js/site/script.js")
    .scripts("node_modules/jquery/dist/jquery.min.js", "public/js/site/jquery.min.js")
    .options({
        processCssUrls: false,
    })
    .sourceMaps()
    .purgeCss();
