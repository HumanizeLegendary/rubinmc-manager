<?php
if (!defined('ABSPATH')) exit;

class RubinMC_RCON_Queue {

    public static function add($server_id, $command) {
        global $wpdb;

        $wpdb->insert(
            "{$wpdb->prefix}rmc_rcon_queue",
            [
                'server_id' => $server_id,
                'command'   => $command,
                'status'    => 'pending',
                'created_at'=> current_time('mysql')
            ]
        );
    }
}
