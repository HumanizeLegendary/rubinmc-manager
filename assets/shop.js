jQuery(document).ready(function($){
    $('.rmc-buy-button').click(function(){
        var card = $(this).closest('.rmc-card');
        var modal = $('.rmc-modal-overlay');
        modal.find('.rmc-modal-title').text(card.find('.rmc-card-title').text());
        modal.find('.rmc-modal-description').text(card.find('.rmc-card-description').text());
        modal.fadeIn();
    });

    $('.rmc-close-modal').click(function(){
        var modal = $(this).closest('.rmc-modal-overlay');
        modal.fadeOut();
        modal.find('.rmc-player-nick').val('');
        modal.find('.rmc-agree-checkbox').prop('checked', false);
    });

    $('.rmc-confirm-buy-button').click(function(){
        var modal = $(this).closest('.rmc-modal-overlay');
        var player = modal.find('.rmc-player-nick').val();
        var agree = modal.find('.rmc-agree-checkbox').is(':checked');
        var title = modal.find('.rmc-modal-title').text();

        if(!player){ alert('Введите ник!'); return; }
        if(!agree){ alert('Примите правила!'); return; }

        $.post(rmc_ajax.ajax_url, {
            action: 'rmc_purchase',
            donate_title: title,
            player: player
        }, function(resp){
            alert(resp.message);
            if(resp.success){
                modal.fadeOut();
                modal.find('.rmc-player-nick').val('');
                modal.find('.rmc-agree-checkbox').prop('checked', false);
            }
        });
    });
});
