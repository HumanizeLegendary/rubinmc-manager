<?php
if (!defined('ABSPATH')) exit;

class RubinMC_DB_Manager {

    public static function get_products() {
        global $wpdb;
        return $wpdb->get_results("
            SELECT * FROM {$wpdb->prefix}rmc_donate_products
            WHERE active = 1
            ORDER BY price ASC
        ");
    }

    public static function get_product($id) {
        global $wpdb;
        return $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}rmc_donate_products WHERE id = %d",
                $id
            )
        );
    }

    public static function get_server($id) {
        global $wpdb;
        return $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}rmc_servers WHERE server_id = %d",
                $id
            )
        );
    }
}
