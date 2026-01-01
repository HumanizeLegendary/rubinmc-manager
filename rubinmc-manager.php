<?php
/*
Plugin Name: RubinMC Manager
Description: Донат-магазин Minecraft + RCON + Discord
Version: 1.0.0
Author: RubinMC
*/

if (!defined('ABSPATH')) exit;

define('RMC_PATH', plugin_dir_path(__FILE__));
define('RMC_URL', plugin_dir_url(__FILE__));

require_once RMC_PATH.'config.php';
require_once RMC_PATH.'updater.php';
require_once RMC_PATH.'rollback.php';

require_once RMC_PATH.'includes/class-db-manager.php';
require_once RMC_PATH.'includes/class-shop-shortcode.php';
require_once RMC_PATH.'includes/class-shop-ajax.php';
require_once RMC_PATH.'includes/class-rcon-queue.php';
require_once RMC_PATH.'includes/class-purchase-logger.php';
require_once RMC_PATH.'includes/admin-pages.php';

add_action('init', function(){
    new RubinMC_Shop_Shortcode();
    new RubinMC_Shop_Ajax();
});

/* Assets */
add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('rmc-shop', RMC_URL.'assets/shop.css', [], RMC_PLUGIN_VERSION);
    wp_enqueue_script('rmc-shop', RMC_URL.'assets/shop.js', ['jquery'], RMC_PLUGIN_VERSION, true);

    wp_localize_script('rmc-shop','RMC',[
        'ajax'=>admin_url('admin-ajax.php'),
        'player'=>wp_get_current_user()->display_name ?? ''
    ]);
});
