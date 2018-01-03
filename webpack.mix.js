let mix = require('laravel-mix');

var webpack = require('webpack')

loaders: [
{ test: require.resolve('tinymce'), loader: 'expose-loader?tinyMCE!expose-loader?$' }
]


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
 module.exports = {
 	plugins: [
 	new webpack.DefinePlugin({
 		"process.env": {
                NODE_ENV: JSON.stringify(process.env.NODE_ENV || 'production') // default value if not specified
            }
        })
 	]
 };
 mix.autoload({
 	jquery: ['$', 'window.jQuery', 'jQuery'],
 	'popper.js': ['Popper']
 })
 .js('resources/assets/js/app.js', 'public/js')
 .sass('resources/assets/sass/app.scss', 'public/css');

