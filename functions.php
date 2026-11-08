<?php

// * GRIT_SET Child | Load custom styles after the parent theme styles.
if (!defined('ABSPATH')) {
    exit;
}

function grit_child_enqueue_styles() {
    wp_enqueue_style(
        'grit-child-style',
        get_stylesheet_uri(),
        array('style', 'main', 'custom'),
        filemtime(get_stylesheet_directory() . '/style.css')
    );
}
add_action('wp_enqueue_scripts', 'grit_child_enqueue_styles', 120);
