<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Sama dengan $this->input->get 
 * @return string
 */
if ( !function_exists('get_value') ) {
    function get_value($index = '', $default = FALSE, $allowed = array()) {
        $ci =& get_instance();
        $res = $ci->input->get($index);
        if (count($allowed) > 0) {
            if ( ! in_array($res, $allowed)) {
                return $default;
            }
        }
        return !$res ? $default : $res;
    }
}
?>