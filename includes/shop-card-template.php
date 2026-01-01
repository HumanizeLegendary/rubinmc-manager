<?php
// $p — объект товара
?>
<div class="rmc-card" data-id="<?= $p->donate_id ?>">
    <img class="rmc-card-image" src="<?= esc_url($p->image_url) ?>" alt="<?= esc_html($p->category_tag) ?>" />
    <div class="rmc-card-header">
        <div class="rmc-card-title"><?= esc_html($p->category_tag) ?></div>
    </div>
    <div class="rmc-card-body">
        <p class="rmc-card-description"><?= esc_html($p->description) ?></p>
        <button class="rmc-buy-button">Купить</button>
    </div>
</div>

<div class="rmc-modal-overlay" style="display:none;">
    <div class="rmc-modal-content">
        <h3>Оплата товара: <span class="rmc-modal-title"></span></h3>
        <p class="rmc-modal-description"></p>
        <input type="text" class="rmc-player-nick" placeholder="Введите ник">
        <label class="rmc-checkbox-container">
            <input type="checkbox" class="rmc-agree-checkbox" />
            <span class="rmc-checkmark"></span>
            Согласен с правилами
        </label>
        <button class="rmc-confirm-buy-button">Оплатить</button>
        <button class="rmc-close-modal">Отмена</button>
    </div>
</div>
