<?php
/**
 * Plugin Name: RubinMC Manager
 * Description: Магазин доната с RCON, логами и Discord интеграцией.
 * Version: 1.0.1
 * Author: YourName
 */

if (!defined('ABSPATH')) exit;

define('RMC_PATH', plugin_dir_path(__FILE__));
define('RMC_URL', plugin_dir_url(__FILE__));
define('RMC_GITHUB_REPO', 'https://github.com/HumanizeLegendary/rubinmc-manager.git');

require_once RMC_PATH . 'config.php';
require_once RMC_PATH . 'includes/class-db-manager.php';
require_once RMC_PATH . 'includes/class-shop-shortcode.php';
require_once RMC_PATH . 'includes/class-shop-ajax.php';
require_once RMC_PATH . 'includes/class-rcon-queue.php';
require_once RMC_PATH . 'includes/class-purchase-logger.php';
require_once RMC_PATH . 'includes/admin-pages.php';
require_once RMC_PATH . 'includes/shop-card-template.php';

// Инициализация
RubinMC_DB_Manager::init();
RubinMC_Shop_Shortcode::init();
RubinMC_Shop_Ajax::init();
