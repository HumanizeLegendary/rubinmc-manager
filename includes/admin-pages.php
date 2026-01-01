<?php
if (!defined('ABSPATH')) exit;

add_action('admin_menu', function () {
    add_menu_page(
        'RubinMC',
        'RubinMC',
        'manage_options',
        'rubinmc',
        'rubinmc_admin_page',
        'dashicons-games',
        56
    );
});

function rubinmc_admin_page() {
    echo '<div class="wrap"><h1>RubinMC Manager</h1>';
    echo '<p>Управление серверами, донатами и логами</p>';
    echo '</div>';
}
