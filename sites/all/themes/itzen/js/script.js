(function ($) {

    Drupal.behaviors.initColorbox = {
        attach: function (context, settings) {
            if (!$.isFunction($.colorbox) || typeof settings.colorbox === 'undefined') {
                return;
            } else {
                $('body').addClass('popup-open');
            }
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

    new WOW().init();

    $('.view-how-we-work-tabs .nav > li').each(function () {
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
    portSlider.control('team_arrows');

});