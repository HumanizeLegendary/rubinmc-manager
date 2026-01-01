<?php
if (!defined('ABSPATH')) exit;

class RubinMC_DB_Manager {
    public static $wpdb;

    public static function init() {
        global $wpdb;
        self::$wpdb = $wpdb;
    }

    public static function get_donate_products() {
        return self::$wpdb->get_results("SELECT * FROM rmc_donate_products WHERE active=1 ORDER BY donate_id ASC");
    }
}
