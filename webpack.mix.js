const { mix } = require('laravel-mix');

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

 mix.js('resources/assets/js/app.js', 'public/js')
    // .js('resources/assets/js/ajaxFileUpload.js', 'public/js')
    // .js('resources/assets/js/index/index.js', 'public/js/index') 
    .js('resources/assets/plugin/tb_slide/js/tb_slide.js', 'public/js/tb_slide')

    //front start
    .js('resources/assets/js/front/article-list.js', 'public/js')
    .js('resources/assets/js/front/guestbook.js', 'public/js')
    //end front


    .js('resources/assets/js/site.js', 'public/js')
    .js('resources/assets/js/admin.js', 'public/js')


    .sass('resources/assets/plugin/tb_slide/css/tb_slide.scss', 'public/css/tb_slide')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/site.scss', 'public/css')
    .sass('resources/assets/sass/admin.scss', 'public/css')
     .version();

if(mix.config.inProduction) {
    mix.version()
}


//mix.disableNotifications();
