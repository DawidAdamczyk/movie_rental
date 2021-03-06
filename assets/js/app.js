/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');
const $ = require('jquery');

 global.$ = global.jQuery = $;
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');
require('webpack-jquery-ui');
require('webpack-jquery-ui/css');
require('webpack-jquery-ui/widgets');
require('webpack-jquery-ui/datepicker');
//  require('jquery-ui/ui/widgets/datepicker');
// require("jquery-ui/datepicker")
// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(function() {
    // $('[data-toggle="popover"]').popover();
    console.log('dupa');
});

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
