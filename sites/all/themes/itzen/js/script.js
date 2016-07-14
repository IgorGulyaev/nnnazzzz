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