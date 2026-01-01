<?php
if (!defined('ABSPATH')) exit;

class RubinMC_Shop_Ajax {

    public function __construct() {
        add_action('wp_ajax_rmc_buy', [$this, 'buy']);
        add_action('wp_ajax_nopriv_rmc_buy', [$this, 'buy']);
    }

    public function buy() {
        $product_id = intval($_POST['product_id']);
        $player = sanitize_text_field($_POST['player']);

        if (!$player) {
            wp_send_json_error('Ник не указан');
        }

        $product = RubinMC_DB_Manager::get_product($product_id);
        if (!$product) {
            wp_send_json_error('Товар не найден');
        }

        RubinMC_Purchase_Logger::log([
            'purchase_id' => uniqid('rmc_'),
            'player_name' => $player,
            'product_id'  => $product_id,
            'amount'      => $product->price,
            'status'      => 'paid',
            'created_at'  => current_time('mysql')
        ]);

        if ($product->delivery_type === 'instant') {
            RubinMC_RCON_Queue::add(
                $product->server_id,
                str_replace('{player}', $player, $product->game_command)
            );
        }

        wp_send_json_success(['price' => $product->price]);
    }
}
