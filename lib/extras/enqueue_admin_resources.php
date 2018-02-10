<?php

namespace Roots\Sage\Extras;

/**
 * Enqueue stylesheets, fonts and scripts for the WP Admin site
 *
 * @return null
 */
add_action('admin_init', __NAMESPACE__ . '\\enqueue_admin_resources');
function enqueue_admin_resources() {
    wp_enqueue_style('bootstrap', 'https://files.dondepauto.co/css/vendor/bootstrap-3.3.7.min.css', '', '3.3.7', 'all');

    wp_enqueue_style('fontawesome', 'https://files.dondepauto.co/css/vendor/font-awesome-4.7.0.min.css', '', '4.7.0', 'all');
    wp_enqueue_style('voyager', 'https://files.dondepauto.co/css/vendor/voyager-font-1.0.min.css', '', '1.0', 'all');

    wp_enqueue_script('bootstrap', 'https://files.dondepauto.co/js/vendor/bootstrap-3.3.7.min.js', '', '3.3.7', true);
}

add_action('admin_head', __NAMESPACE__ . '\\replace_admin_fonticons');
function replace_admin_fonticons() { ?>
    <style type="text/css">
        #adminmenu .menu-icon-trabajo div.wp-menu-image:before {
            font-family: FontAwesome !important;
            content: '\f0b1';
        }
    </style>
<?php } ?>
