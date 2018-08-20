(function (namespace, $) {
        "use strict";

        var AppEvent = function () {
            // Create reference to this instance
            var o = this;
            // Initialize app when document is ready
            $(document).ready(function () {
                o.initialize();
            });

        };
        
        var p = AppEvent.prototype;

        p.initialize = function () {
            this._initSlug();
        };

        p._initSlug = function() {
            jQuery('.turnsSlug').focusout(function() {
                jQuery.ajax({
                    type: 'get',
                    url: window.location.origin + '/admin/link/slug',
                    data: {
                        link: jQuery(this).val()
                    },
                    cache: false,
                    success: function (string) {
                        jQuery('[name=slug]').val(string);
                    }
                });
            });

            jQuery('input[name=slug]').focusout(function() {
                jQuery.ajax({
                    type: 'get',
                    url: window.location.origin + '/admin/link/slug',
                    data: {
                        link: jQuery(this).val()
                    },
                    cache: false,
                    success: function (string) {
                        jQuery('[name=slug]').val(string);
                    }
                });
            });
        };

        window.backend = window.backend || {};
        window.backend.AppEvent = new AppEvent;
    }(this.backend, jQuery)
); // pass in (namespace, jQuery):