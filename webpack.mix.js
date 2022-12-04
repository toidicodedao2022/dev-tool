let mix = require('laravel-mix');
mix.copy('resources/img','public/img')
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/tool.js','public/js')
    .js('resources/js/admin-tool.js','public/js')
    .js('resources/js/pixel-to-sdp.js','public/js')
    .sass('resources/sass/app.scss', 'public/css').sourceMaps();
