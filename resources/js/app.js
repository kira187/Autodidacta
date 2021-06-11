require('./bootstrap');

require('alpinejs');

import slick from 'slick-carousel';

/**
 * === INITIALIZE =====================
 * ====================================
 */
//region Initialize when page loads
(function ($) {

    "use strict";
    var $window = $(window);

    //region #Ready
    // === when document ready === //
    $(document).ready(function () {

        //region Categories
        if ($("#categories-slick").length == 1) {

            $('#categories-slick').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                dots: true,
                arrows: true,
                responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 2,
                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 1,
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                      }
                    }
                  ]
            });
        };
        //endregion

        //region Courses
        if ($("#course-slick").length == 1) {

            $('#course-slick').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                dots: true,
                arrows: true,
                responsive: [
                    {
                        breakpoint: 1280,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 2,
                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 1,
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                      }
                    }
                  ]
            });
        };
        //endregion






    });
    //endregion #ready

})(jQuery);
//endregion Initialize
