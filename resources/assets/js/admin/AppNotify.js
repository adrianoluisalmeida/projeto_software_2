(function (namespace, $) {
    "use strict";

    var AppNotify = function () {
        var o = this;
        $(document).ready(function () {
            o.initialize();
        });
    };

    var p = AppNotify.prototype;

    p.initialize = function () {
    };

    p._error = function (msg) {
        toastr.clear();

        toastr.options.closeButton = true;
        toastr.options.progressBar = false;
        toastr.options.debug = false;
        toastr.options.positionClass = 'toast-bottom-full-width';
        toastr.options.showDuration = 333;
        toastr.options.hideDuration = 333;
        toastr.options.timeOut = 0;
        toastr.options.extendedTimeOut = 1000;
        toastr.options.showEasing = 'swing';
        toastr.options.hideEasing = 'swing';
        toastr.options.showMethod = 'slideDown';
        toastr.options.hideMethod = 'slideUp';

        toastr.error(msg, '<strong>Whoops!</strong> Houve algum problema!');
    };

    p._warning = function (msg) {
        toastr.clear();

        toastr.options.closeButton = true;
        toastr.options.progressBar = false;
        toastr.options.debug = false;
        toastr.options.positionClass = 'toast-bottom-full-width';
        toastr.options.showDuration = 333;
        toastr.options.hideDuration = 333;
        toastr.options.timeOut = 0;
        toastr.options.extendedTimeOut = 1000;
        toastr.options.showEasing = 'swing';
        toastr.options.hideEasing = 'swing';
        toastr.options.showMethod = 'slideDown';
        toastr.options.hideMethod = 'slideUp';

        toastr.warning(msg);

    };

    p._success = function (msg) {
        toastr.clear();

        toastr.options.closeButton = false;
        toastr.options.progressBar = false;
        toastr.options.debug = false;
        toastr.options.positionClass = 'toast-bottom-full-width';
        toastr.options.showDuration = 333;
        toastr.options.hideDuration = 333;
        toastr.options.timeOut = 0;
        toastr.options.extendedTimeOut = 1000;
        toastr.options.showEasing = 'swing';
        toastr.options.hideEasing = 'swing';
        toastr.options.showMethod = 'slideDown';
        toastr.options.hideMethod = 'slideUp';

        toastr.success(msg);
    }

    window.backend.AppNotify = new AppNotify;
}(this.backend, jQuery));