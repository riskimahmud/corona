<?php

function redirect_ssl() {
    $ci =& get_instance();
    if (FORCE_SSL) {
        // redirecting to ssl.
        $ci->config->config['base_url'] = str_replace('http://', 'https://', $ci->config->config['base_url']);
        if ($_SERVER['SERVER_PORT'] != 443) redirect($ci->uri->uri_string());
    } else {
        // redirecting with no ssl.
        $ci->config->config['base_url'] = str_replace('https://', 'http://', $ci->config->config['base_url']);
        if ($_SERVER['SERVER_PORT'] == 443) redirect($ci->uri->uri_string());
    }
}