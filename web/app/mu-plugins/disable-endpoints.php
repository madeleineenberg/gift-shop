<?php
/*
Plugin Name: Disable Endpoints
Description: This plugin will disable endpoints for accessing users and creating comments.
Version: 0.1
Author: Max Trewhitt - Osolo
Author URI: http://osolo.se/
License: This plugin is licensed under GPL.
*/

add_filter('rest_endpoints', function ($endpoints) {
    /**
     * Disable getting users info
     */
    if (isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
    }

    if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }

    /**
     * Disable creating comments
     */
    if (isset($endpoints['/wp/v2/comments'])) {
        unset($endpoints['/wp/v2/comments']);
    }

    if (isset($endpoints['/wp/v2/comments/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/comments/(?P<id>[\d]+)']);
    }

    return $endpoints;
});
