<div class="product-card" data-id="<?= esc_attr($product->id) ?>">
    <h3><?= esc_html($product->category_tag) ?></h3>
    <div class="price"><?= number_format($product->price, 2) ?> ₽</div>

    <button class="buy-init">Купить</button>

    <div class="overlay">
        <div class="confirm">
            <label class="mini-check">
                <input type="checkbox" class="agree">
                <span></span>
                <small>Подтверждаю покупку</small>
            </label>
            <button class="pay" disabled>Оплатить</button>
        </div>
    </div>
</div>
