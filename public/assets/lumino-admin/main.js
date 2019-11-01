(function ($) {
    "use strict";

    jQuery(document).ready(function ($) {

        



        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());


        jQuery(function () {
            jQuery('#startDate').datetimepicker({
                format: 'Y-m-d H:i',
                //minDate: today,
                onShow: function (ct) {
                    this.setOptions({
                        maxDate: jQuery('#endDate').val() ? jQuery('#endDate').val() : false
                    })
                },
                timepicker: false
            });
            jQuery('#endDate').datetimepicker({
                format: 'Y-m-d H:i',
                onShow: function (ct) {
                    this.setOptions({
                        minDate: jQuery('#startDate').val() ? jQuery('#startDate').val() : false
                    })
                },
                timepicker: false
            });
        });


        jQuery(function () {
            jQuery('#startDateTime').datetimepicker({
                format: 'Y-m-d H:i',
                minDate: today,
                onShow: function (ct) {
                    this.setOptions({
                        maxDate: jQuery('#endDateTime').val() ? jQuery('#endDateTime').val() : false
                    })
                },
                timepicker: true
            });
            jQuery('#endDateTime').datetimepicker({
                format: 'Y-m-d H:i',
                onShow: function (ct) {
                    this.setOptions({
                        minDate: jQuery('#startDateTime').val() ? jQuery('#startDateTime').val() : false
                    })
                },
                timepicker: true
            });
        });




        $('#startDate').keypress(function (e) {
            e.preventDefault();
        });

        $('#endDate').keypress(function (e) {
            e.preventDefault();
        });

        $('#startDateTime').keypress(function (e) {
            e.preventDefault();
        });

        $('#endDateTime').keypress(function (e) {
            e.preventDefault();
        });

}); //Ready Function End

    // jQuery(window).load(function () {
    //     jQuery('.preloader').fadeOut();
    //     jQuery('.preloader-spinner').delay(350).fadeOut('slow');
    //     jQuery('body').removeClass('loader-active');
    //     jQuery(".popular-car-gird").isotope();
    // }); //window load End


}(jQuery));



