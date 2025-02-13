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

// add_filter('woocommerce_product_tabs', 'woo_remove_tabs', 98);
// function woo_remove_tabs($tabs)
// {
//     if (is_product()) {
//         unset($tabs['description']); // Remove the description tab
//         unset($tabs['reviews']); // Remove the reviews tab
//         unset($tabs['additional_information']); // Remove the additional information tab
//     }
//     return $tabs;
// }
