var worksSlider;
var projectsSlider;

(function ($) {

    Drupal.behaviors.initColorbox = {
        attach: function (context, settings) {
            /*if (!$.isFunction($.colorbox) || typeof settings.colorbox === 'undefined') {
                return;
            } else {

            }*/
            $(document).bind('cbox_open', function () {
                $('html').addClass('popup-open');
            });
            $(document).bind('cbox_closed', function () {
                $('html').removeClass('popup-open');
            });
        }
    };

    Drupal.behaviors.formElements = {
        attach: function (context, settings) {
            var serviceName;

            $('.form-item-submitted-contact-method-select-method input').change(function () {
                $(this).attr('checked', 'checked').parent('label').attr('data-checked', 'checked');
                $(this).parents('.form-item').siblings('.form-item').find('input').attr('checked', '').parent('label').attr('data-checked', '');
            });
            $('input[name*="submitted[contact_method]"]').focus(function () {
                $('.webform-component--contact-method--select-method').fadeIn();
            });
            $('input[name*="submitted[contact_method]"]').blur(function () {
                if ($(this).val() == '' && !$(this).parents('fieldset').is(':hover')) {
                    $('.webform-component--contact-method--select-method').fadeOut();
                }
            });

            $('.view-pricing.view-display-id-page_1 .fieldset-title').click(function () {
                $(this).parent('.views-row').siblings().removeClass('active').find('.tab-content-block').slideUp();
                if ($(this).hasClass('active') == true) {
                    $(this).parent().removeClass('active');
                    $(this).next().slideUp();
                } else {
                    $(this).parent().addClass('active');
                    $(this).next().slideDown();
                }
            });

            $('.view-pricing.view-display-id-page_1 .views-field-nothing a').click(function () {
                serviceName = $(this).parents('.views-row').find('.views-field-title .field-content').text();
                $(document).ajaxComplete(function(aj) {
                    if ($('.node-webform')[0]) {
                        $('input[name="submitted[service_name]"]').attr('value', serviceName);
                        if ($('.service-choose')[0]) {
                            if ($('.service-choose .service-name').text() == serviceName) {
                            } else {
                                $('.service-choose .service-name').text(serviceName);
                            }
                        } else {
                            $('.webform-client-form > div').prepend('<div class="service-choose">You are Interested in <span class="service-name">'+ serviceName +'</span> Service<span class="service-remove"><i class="icon-zen_navigation_close"></i></span></div>');
                        }
                    }
                });
            });

            $('body').on('click', '.service-choose span', function () {
                serviceName = '';
                $('input[name="submitted[service_name]"]').attr('value', '');
                $('.service-choose').fadeOut();
            });
            $('body').on('click', '.webform-confirmation .btn.link', function () {
                $('#cboxClose').trigger('click');
            });
            $(document).ajaxComplete(function() {
                if ($('.webform-confirmation')[0]) {
                    $('.webform-confirmation').parents('.node').find('header').remove();
                    $('.webform-confirmation').parents('.node').find('.links').remove();
                }
            });
        }
    };

})(jQuery);

jQuery(document).ready(function ($) {

    checkSize();

    new WOW().init();

    $('.link a').click(function(e) {
        e.preventDefault();
    });

    var $window = $(window);		//Window object

    var scrollTime = 1.6;			//Scroll time
    var scrollDistance = 400;		//Distance. Use smaller value for shorter scroll and greater value for longer scroll

    $window.on("mousewheel DOMMouseScroll", function (event) {

        if ($('html').hasClass('popup-open') == false) {
            event.preventDefault();

            var delta = event.originalEvent.wheelDelta / 120 || -event.originalEvent.detail / 3;
            var scrollTop = $window.scrollTop();
            var finalScroll = scrollTop - parseInt(delta * scrollDistance);

            TweenMax.to($window, scrollTime, {
                scrollTo: {y: finalScroll, autoKill: true},
                ease: Expo.easeOut,
                autoKill: true,
                overwrite: 5
            });
        }

    });

    var $bgobj = $('.region-header-bg');
    $window.scroll(function () {
        if ($('html').hasClass('touch') == false) {
            var yPos = -($window.scrollTop() / 3);
            var coords = 'center ' + yPos + 'px';
            $bgobj.css({backgroundPosition: coords});
        }
    });

    $('.view-how-we-work-tabs .nav > li').each(function () {
        $(this).find('a').attr('data-slide-index', $(this).index()).wrapInner('<span class="label-text"></span>');
        var labelNumber = $(this).index() + 1;
        var labelItem = '<span class="label-number">' + labelNumber + '</span>';
        $(this).find('a').append(labelItem);
    });

    $('.view-team.view-display-id-block .view-content').addClass('master-slider').attr('id', 'team_slider');
    var portSlider = new MasterSlider();
    var portSlideWidth = $(window).width();
    portSlider.setup('team_slider' , {
        width: portSlideWidth,
        height:350,
        space:200,
        fullwidth:true,
        loop:true,
        view:'flow'
    });
    portSlider.control('arrows');

    $(".view-how-we-work-tabs .nav").attr('id', 'workNav');
    worksSlider = $(".view-how-we-work-tabs .tab-content").bxSlider({
        pagerCustom: '#workNav',
        adaptiveHeight: true,
        prevText: '',
        nextText: '',
        onSlideBefore: function () {
            $('.view-how-we-work-tabs .nav > li').removeClass('active');
        }
    });

    var serviceSlider = new MasterSlider();
    $('.view-services.view-display-id-block_1 .view-content').addClass('master-slider').attr('id', 'service_slider');
    $('#service_slider .views-row').addClass('ms-slide');
    serviceSlider.setup('service_slider' , {
        height:380,
        space:200,
        fullwidth:true,
        loop:true,
        view:'flow'
    });
    serviceSlider.control('arrows');

    $(window).resize(checkSize);

});

function checkSize(){
    var wW = jQuery(window).width();
    if (wW <= 480 || jQuery('html').hasClass('mobile')){
        projectsSlider = jQuery(".view-projects.view-display-id-block .view-content").bxSlider({
            pager: false,
            prevText: '',
            nextText: '',
            minSlides: 1,
            maxSlides: 2,
            moveSlides: 1
        });
    } else {
        if (jQuery('.bx-wrapper')[0]) {
            projectsSlider.destroySlider();
        }
    }
}