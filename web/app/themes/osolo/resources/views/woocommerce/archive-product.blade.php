{{-- The Template for displaying product archives, including the main shop page which is a post type archive
This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
HOWEVER, on occasion WooCommerce will need to update template files and you
(the theme developer) will need to copy the new files to your theme to
maintain compatibility. We try to do this as little as possible, but it does
happen. When this occurs the version of the template file will be bumped and
the readme will list any important changes.
@see https://docs.woocommerce.com/document/template-structure/
@package WooCommerce/Templates
@version 3.4.0 --}}

@php

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$product_categories = ['cat-name'];
$args = [
    'post_type' => 'product',
    'post_per_page' => '10',
    'paged' => $paged,
    'order' => 'ASC',
    'post_status' => 'publish',
];

$the_query = new WP_Query($args);

// echo '<pre>' . print_r($the_query, true) . '</pre>';

@endphp




@extends('layouts.app')

@section('content')
    @php

    do_action('get_header', 'shop');
    do_action('woocommerce_before_main_content');
    @endphp

    <header class="woocommerce-products-header">
        @if (apply_filters('woocommerce_show_page_title', true))
            <h1 class="woocommerce-products-header__title page-title">{!! woocommerce_page_title(false) !!}</h1>
        @endif

        @php
            do_action('woocommerce_archive_description');
        @endphp
    </header>



    <div class="product-grid">
        @if ($the_query->posts)
            @foreach ($the_query->posts as $product)
                <div class="product-card">
                    <div class="product-image__wrapper">
                        <a href={{ get_permalink($product->ID) }}>
                            <img src={{ get_the_post_thumbnail_url($product->ID, 'large') }} alt="product-image" />
                            <div class="image__overlay">
                                <div class="image__overlay__text">
                                    <h2>Show more</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="product-card__content">
                        <div>
                            <h4>{{ $product->post_title }}</h4>
                            <p>{{ get_post_meta($product->ID, '_price', true) }} kr</p>
                        </div>
                        <div class="product-card__button-wrapper">
                            @php
                                $add_to_cart = do_shortcode('[add_to_cart_url id="' . $product->ID . '"]');
                            @endphp
                            <a href="{{ $add_to_cart }}" class="cart-btn">Buy now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>




    {{-- @php
    add_action('woocommerce_before_shop_loop', 'ijab_insert_before_shop_products', 10);

    function ijab_insert_before_shop_products()
    {
        if (is_shop()) {
            echo do_shortcode('[product_categories]');
        }
    }
    @endphp --}}

    {{-- @if (woocommerce_product_loop())
        @php
            do_action('woocommerce_before_shop_loop');
            woocommerce_product_loop_start();
            
        @endphp --}}



    {{-- remove endif --}}

    {{-- @if (wc_get_loop_prop('total'))
            @while (have_posts())
                @php
                    the_post();
                    do_action('woocommerce_shop_loop');
                    // wc_get_template_part('content', 'product');
                @endphp
            @endwhile
        @endif --}}

    {{-- @php
            woocommerce_product_loop_end();
            do_action('woocommerce_after_shop_loop');
        @endphp
    @else
        @php
            do_action('woocommerce_no_products_found');
        @endphp
    @endif --}}

    @include('partials.pagination')
    @php
    do_action('woocommerce_after_main_content');
    do_action('get_sidebar', 'shop');
    do_action('get_footer', 'shop');
    @endphp
@endsection
