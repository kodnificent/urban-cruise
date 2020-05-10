const
    mix = require('laravel-mix'),

    postcss_import = require('postcss-import'),

    tailwindcss = require('tailwindcss'),

    postcss_nested = require('postcss-nested'),

    postcss_custom_nested = require('postcss-custom-properties'),

    autoprefixer = require('autoprefixer'),

    purgecss = require('@fullhuman/postcss-purgecss')({
        content: [
            './resources/**/*.blade.php',
            './resoruces/**/*.vue',
        ],

        defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
    });

mix.js('resources/js/app.js', 'public/assets/js')
    .sass('resources/scss/vendor.scss', 'public/assets/css')
    .postCss('resources/css/app.css', 'public/assets/css', [
        postcss_import,
        tailwindcss,
        postcss_nested,
        postcss_custom_nested,
        autoprefixer,
        ...process.env.NODE_ENV === 'production' ? [purgecss] : []
    ])
    .copy('resources/imgs', 'public/assets/imgs')
    .copy('resources/fonts', 'public/assets/fonts')
    .options({
        processCssUrl: false,
        extractVueStyles: true,
    })
    .extract()
