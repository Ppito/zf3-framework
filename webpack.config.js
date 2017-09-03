// webpack.config.js

let Encore  = require('@symfony/webpack-encore');
let Webpack = require('webpack');

Encore
// directory where all compiled assets will be stored
    .setOutputPath('./public/build/')

    // what's the public path to this directory (relative to your project's document root dir)
    .setPublicPath('/build')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    .addPlugin(new Webpack.ProvidePlugin({
        Popper: ['popper.js', 'default']
    }))

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()

    // will output as web/build/app.js
    .createSharedEntry('js/common', ['jquery', 'bootstrap'])
    .addEntry('js/app', './assets/js/app.build.js')

    // will output as web/build/global.css
    .addStyleEntry('css/style', './assets/scss/style.scss')

    // allow sass/scss files to be processed
    .enableSassLoader(function (sassOptions) {}, {
        resolve_url_loader: false
    })

    .enableSourceMaps(!Encore.isProduction())

    // create hashed filenames (e.g. app.abc123.css)
    .enableVersioning()

    // first, install any presets you want to use (e.g. yarn add babel-preset-es2017)
    // then, modify the default Babel configuration
    .configureBabel(function(babelConfig) {
        // add additional presets
        babelConfig.presets.push('es2017');

        // no plugins are added by default, but you can add some
        // babelConfig.plugins.push('styled-jsx/babel');
    })

    // Load scss from module directory
    .addRule({
        test: /\.scss$/,
        use: [{
            loader: 'sass-loader',
            options: {
                includePaths: [
                    "./module",
                    "./module/Application/module"
                ]
            }
        }]
    })

;

// // export the final configuration
// module.exports = Encore.getWebpackConfig();

// fetch the config, then modify it!
let config = Encore.getWebpackConfig();


// export the final config
module.exports = config;
