<?php
add_filter('site_transient_update_plugins', function($transient){
    if (empty($transient->checked)) return $transient;

    $response = wp_remote_get(
        "https://api.github.com/repos/".RMC_GITHUB_REPO."/releases/latest",
        ['headers'=>['User-Agent'=>'WordPress']]
    );

    if (is_wp_error($response)) return $transient;

    $data = json_decode(wp_remote_retrieve_body($response));
    if (version_compare(RMC_PLUGIN_VERSION, $data->tag_name, '<')){
        $transient->response['rubinmc-manager/rubinmc-manager.php'] = (object)[
            'slug'=>'rubinmc-manager',
            'new_version'=>$data->tag_name,
            'url'=>$data->html_url,
            'package'=>$data->zipball_url
        ];
    }
    return $transient;
});
