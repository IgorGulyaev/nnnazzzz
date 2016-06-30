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