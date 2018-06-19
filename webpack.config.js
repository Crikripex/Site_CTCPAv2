var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    // will create public/build/app.js and public/build/app.css
    .addEntry('css_file1', './assets/css/flatly.css')
    .addEntry('css_file2', './assets/css/override.css')
    .addEntry('documentationJs','./assets/js/script7fonctions.js')
    .addEntry('prestationsJs','./assets/js/scriptPrestations.js')
    .addEntry('logoEmballage','./assets/images/logoo.png')
    .addEntry('logoCtcpa','./assets/images/ctcpa.png')
    .addEntry('temp1','./assets/images/aze.png')
    .addEntry('temp2','./assets/images/qsd.png')
    .addEntry('temp3','./assets/images/wxc.png')
    .addEntry('customFont','./assets/fonts/bahnschrift.ttf')
    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()
    // enable source maps during development
    .enableSourceMaps(!Encore.isProduction())
    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()
    // show OS notifications when builds finish/fail
    .enableBuildNotifications()



// uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    // .addEntry('js/app', './assets/js/app.js')
    // .addStyleEntry('css/app', './assets/css/app.scss')

    // uncomment if you use Sass/SCSS files
    // .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    // .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
