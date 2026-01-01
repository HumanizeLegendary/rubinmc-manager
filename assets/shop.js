jQuery(function ($) {

    $('.buy-init').on('click', function () {
        $(this).siblings('.overlay').fadeIn(200);
    });

    $('.agree').on('change', function () {
        $(this)
            .closest('.confirm')
            .find('.pay')
            .prop('disabled', !this.checked);
    });

    $('.pay').on('click', function () {
        const card = $(this).closest('.product-card');

        $.post(RMC.ajax, {
            action: 'rmc_buy',
            product_id: card.data('id'),
            player: RMC.player
        }, function () {
            alert('Покупка обработана');
            $('.overlay').fadeOut(200);
        });
    });

});
