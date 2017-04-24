/**
 * Created by steven on 4/22/17.
 */
(function ($) {
    $(document).ready(function () {
        let $panelBody = $('.panel-body');
        $('.nav.nav-pills li a').on('click', function (e) {
            e.preventDefault();
            let $this = $(this);
            let target = $this.data('value');
            $panelBody.find('.row.'+target)
                .removeClass('hidden')
                .addClass('show')
                .siblings('.row')
                .removeClass('show')
                .addClass('hidden');
            $this.closest('li').addClass('active').siblings('li').removeClass('active');
        });
    });
})(jQuery);