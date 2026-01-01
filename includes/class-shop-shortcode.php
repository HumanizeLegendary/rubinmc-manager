<?php
if (!defined('ABSPATH')) exit;

class RubinMC_Shop_Shortcode {
    public static function init() {
        add_shortcode('rmc_shop', [__CLASS__, 'render_shop']);
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_assets']);
    }

    public static function enqueue_assets() {
        wp_enqueue_style('rmc-shop-css', RMC_URL . 'assets/shop.css');
        wp_enqueue_script('rmc-shop-js', RMC_URL . 'assets/shop.js', ['jquery'], null, true);
        wp_localize_script('rmc-shop-js', 'rmc_ajax', ['ajax_url' => admin_url('admin-ajax.php')]);
    }

    public static function render_shop() {
        $products = RubinMC_DB_Manager::get_donate_products();
        $output = '<div class="rmc-shop-container">';
        foreach($products as $p){
            ob_start();
            include RMC_PATH . 'includes/shop-card-template.php';
            $output .= ob_get_clean();
        }
        $output .= '</div>';
        return $output;
    }
}
