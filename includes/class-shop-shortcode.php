<?php
if (!defined('ABSPATH')) exit;

class RubinMC_Shop_Shortcode {

    public function __construct() {
        add_shortcode('rmc_shop', [$this, 'render']);
    }

    public function render() {
        $products = RubinMC_DB_Manager::get_products();
        if (!$products) {
            return '<div class="rmc-empty">Товары отсутствуют</div>';
        }

        ob_start();
        echo '<div id="rmc-shop" class="rmc-shop">';
        foreach ($products as $product) {
            include RMC_PATH . 'includes/shop-card-template.php';
        }
        echo '</div>';
        return ob_get_clean();
    }
}
