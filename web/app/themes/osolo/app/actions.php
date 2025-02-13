<?php

/**
 * Display product categories before product loop in shop-page
 * in add_action use number value to decide priority and where to place content on page
 */
// function product_subcategories($args = array())
// {
//     $parentid = get_queried_object_id();

//     $args = array(
//         'parent' => $parentid
//     );

//     $terms = get_terms('product_cat', $args);

//     if ($terms) {
//         echo '<ul class="category-list">';

//         foreach ($terms as $term) {
//             echo '<a class="category-list__item-link" href="' .  esc_url(get_term_link($term)) . '" class="' . $term->slug . '">';
//             echo '<li class="category-list__item">';
//             // woocommerce_subcategory_thumbnail($term);
//             echo '<h2 class="category-list__item-title">';
//             echo $term->name;
//             echo '</h2>';
//             echo '</li>';
//             echo '</a>';
//         }

//         echo '</ul>';
//     }
// }

// add_action('woocommerce_before_shop_loop', 'product_subcategories', 10);

function wpb_load_fa()
{


    wp_enqueue_style('wpb-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
}

add_action(' wp_enqueue_scripts', 'wpb_load_fa');

// remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

// function woocommerce_template_product_description()
// {
//     woocommerce_get_template('single-product/tabs/description.php');
// }
// add_action('woocommerce_single_product_summary', 'woocommerce_template_product_description', 10);
