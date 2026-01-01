<?php
register_shutdown_function(function(){
    $error = error_get_last();
    if ($error && $error['type'] === E_ERROR){
        update_option('rmc_last_crash', $error);
        deactivate_plugins(plugin_basename(__FILE__));
    }
});
