<?php
if (!defined('ABSPATH')) exit;

class RubinMC_Purchase_Logger {

    public static function log($data) {
        global $wpdb;

        $wpdb->insert(
            "{$wpdb->prefix}rmc_purchases",
            [
                'purchase_id' => $data['purchase_id'],
                'player_name' => $data['player_name'],
                'product_id'  => $data['product_id'],
                'amount'      => $data['amount'],
                'status'      => $data['status'],
                'created_at'  => $data['created_at']
            ]
        );
    }
}
