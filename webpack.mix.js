let mix = require('laravel-mix');

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

mix.scripts(
    [
        'resources/assets/js/compressed.js',
        'resources/assets/js/main.js'

    ], 'public/js/theme.js')
    .styles([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/animations.css',
        'resources/assets/css/fonts.css',
        'resources/assets/css/main.css',
        'resources/assets/css/shop.css'
    ], 'public/css/theme.css')

    .scripts([
        'resources/assets/js/admin/plugins/jquery-1.11.0.min.js',
        'resources/assets/js/admin/plugins/jquery-migrate-1.2.1.min.js',
        'resources/assets/js/admin/plugins/jquery-ui-1.10.3.custom.js',
        'resources/assets/js/admin/plugins/bootstrap.min.js',
        'resources/assets/js/admin/plugins/bootstrap-hover-dropdown.js',
        'resources/assets/js/admin/plugins/jquery.slimscroll.min.js',
        'resources/assets/js/admin/plugins/jquery.blockui.min.js',
        'resources/assets/js/admin/plugins/jquery.uniform.min.js',
        'resources/assets/js/admin/plugins/jquery.validate.min.js',
        'resources/assets/js/admin/plugins/select2.min.js',
        'resources/assets/js/admin/plugins/jquery.dataTables.min.js',
        'resources/assets/js/admin/plugins/dataTables.bootstrap.js',
        'resources/assets/js/admin/plugins/jquery.tagsinput.js',
        'resources/assets/js/admin/plugins/toastr.js',
        'resources/assets/js/admin/summernote.js',
        'resources/assets/js/admin/app.js',
        'resources/assets/js/admin/login.js',
        'resources/assets/js/admin/AppEvent.js',
        'resources/assets/js/admin/AppNotify.js',
        'resources/assets/js/admin/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js',
        'resources/assets/js/admin/plugins/jquery-multi-select/jquery.multi-select.js',
        'resources/assets/js/admin/plugins/bootstrap-switch/bootstrap-switch.js',
        'resources/assets/js/admin/plugins/jquery-inputmask/form-components.js',
        'resources/assets/js/admin/form-components.js',
        'resources/assets/js/admin/plugins/dropzone.js',
    ], 'public/js/admin.js')
    .styles([
        'resources/assets/css/admin/plugins/font-awesome.min.css',
        'resources/assets/css/admin/plugins/simple-line-icons.min.css',
        'resources/assets/css/admin/plugins/bootstrap.min.css',
        'resources/assets/css/admin/plugins/uniform.default.css',
        'resources/assets/css/admin/plugins/jquery.tagsinput.css',
        'resources/assets/css/admin/jquery.dataTables.min.css',
        'resources/assets/css/admin/plugins/select2.css',
        'resources/assets/css/admin/plugins/toastr.css',
        'resources/assets/css/admin/summernote.css',
        'resources/assets/css/admin/style-conquer.css',
        'resources/assets/css/admin/custom.css',
        'resources/assets/css/admin/style.css',
        'resources/assets/css/admin/style-responsive.css',
        'resources/assets/css/admin/plugins.css',
        'resources/assets/css/admin/login.css',
        'resources/assets/css/admin/themes/light.css',
        'resources/assets/css/admin/plugins/jquery-multi-select/multi-select.css',
        'resources/assets/css/admin/plugins/bootstrap-switch/bootstrap-switch.css',
        'resources/assets/css/admin/plugins/dropzone.css',
    ], 'public/css/admin.css');


mix.react('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
