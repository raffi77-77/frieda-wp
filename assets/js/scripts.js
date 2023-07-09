jQuery(window).scroll(function () {
    var scroll = jQuery(window).scrollTop();
    if (scroll >= 300) {
        jQuery(".header-wrap").addClass("darkHeader");
    } else {
        jQuery(".header-wrap").removeClass("darkHeader");
    }
});

jQuery(document).ready(function () {
    jQuery(".header-m-open").click(function () {
        jQuery(".header-menu").css("width", "80%");
        jQuery('body').addClass('menu-open');
    });
    jQuery(".header-m-closebtn").click(function () {
        jQuery(".header-menu").css("width", "0%");
        jQuery('body').removeClass('menu-open');
    });
});


jQuery(document).ready(function () {
    jQuery('.acc-container .acc:nth-child(1) .acc-head').addClass('active');
    jQuery('.acc-container .acc:nth-child(1) .acc-content').slideDown();
    jQuery('.acc-head').on('click', function () {
        if (jQuery(this).hasClass('active')) {
            jQuery(this).siblings('.acc-content').slideUp();
            jQuery(this).removeClass('active');
        } else {
            jQuery('.acc-content').slideUp();
            jQuery('.acc-head').removeClass('active');
            jQuery(this).siblings('.acc-content').slideToggle();
            jQuery(this).toggleClass('active');
        }
    });
});

jQuery(document).ready(function () {
    jQuery(".login").click(function () {
        jQuery(".logout").toggleClass("logoutwrap");
    });
});

jQuery(document).ready(function () {
    jQuery(".symptoms-dropdown").click(function () {
        jQuery(".symptoms-dropdown").toggleClass("main");
    });
});


jQuery(document).ready(function () {
    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                jQuery('.profile-pic').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    jQuery(".file-upload").on('change', function () {
        readURL(this);
    });

    jQuery(".upload-button").on('click', function () {
        jQuery(".file-upload").click();
    });
});


var symptomChart = document.getElementById('symptomChart');
if (symptomChart && window.jsonData) {
    symptomChart = symptomChart.getContext('2d');

    var chart = new Chart(symptomChart, {
        type: 'line',
        data: window.jsonData,
        // Configuration options
        options: {
            responsive: true,
            layout: {
                padding: 0
            },
            legend: {
                display: false
            },
            title: {
                display: false
            },
            plugins: {
                legend: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        min: 0,
                        max: 10,
                        padding: 10
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: false
                    }
                }]
            }
        }
    });
}

jQuery(document).ready(function () {
    jQuery(".user-content").click(function () {
        jQuery("a").toggleClass("main");
    });
});

jQuery('#about-page-sildes').owlCarousel({
    autoplay: false,
    loop: true,
    infinite: true,
    nav: false,
    rtl: true,
    dots: true,
    margin: 20,
    items: 3,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
        },
        480: {
            items: 1,
        },
        568: {
            items: 1,
        },
        640: {
            items: 1,
        },
        667: {
            items: 1,
        },
        768: {
            items: 2,
        },
        1000: {
            items: 3,
        },
        1024: {
            items: 3,
        }
    }
});