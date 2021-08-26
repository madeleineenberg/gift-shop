<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'osolo') . '</a>';
});

/**
 * Hide "Custom fields" from admin menu when in staging or production
 */
if (env('WP_ENV') !== 'development') {
    add_action('admin_menu', function () {
        remove_menu_page('edit.php?post_type=acf-field-group');
    }, 999);
}

/**
 * Hide updates for filebird plugin
 */
add_filter('site_transient_update_plugins', function ($value) {
    unset($value->response['filebird/filebird.php']);
    return $value;
});
