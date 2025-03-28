<?php
/**
* Custom Post Types & Custom Taxonomies
*/
require get_template_directory() . '/inc/post-types-taxonomies.php';

add_filter('acf/settings/rest_api_format', function () {
    return 'standard';
});