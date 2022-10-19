<?php

define('THEMEROOT', get_stylesheet_directory_uri());
define('ASSETPATHS', get_assets());

function get_assets()
{
    $assets_map = THEMEROOT . '/assets/assets-manifest.json';

    if (file_exists($assets_map)) {
        return json_decode(file_get_contents($assets_map), true);
    }

    return [];
}

function enqueue_style()
{
    if (array_key_exists('app.css', ASSETPATHS)) {
        wp_enqueue_style('core', THEMEROOT . '/assets/' . ASSETPATHS['app.css'], false);
    }
}

function enqueue_scripts()
{
    wp_enqueue_script('jquery');

    if (array_key_exists('app.js', ASSETPATHS)) {
        wp_enqueue_script(
            'custom-script',
            THEMEROOT . '/assets/' . ASSETPATHS['app.js'],
            ['jquery'],
            false,
            true
        );
    }
}

function custom_init()
{
    // Custom menus.
    register_nav_menu('main-menu', 'Primary Menu');
    register_nav_menu('footer-menu', 'Footer Menu');
}

function custom_login()
{
    echo '<link rel="stylesheet" href="' . THEMEROOT . '/css/login.css" />';
}

function single_template_slug($the_template)
{
    foreach ((array) get_the_category() as $cat) {
        if (file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php")) {
            return TEMPLATEPATH . "/single-{$cat->slug}.php";
        }
    }
    return $the_template;
}

function custom_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Default Sidebar',
            'id' => 'default-sidebar',
            'description' => 'Default Sidebar',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<p>',
            'after_title' => '</p>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog',
            'description' => 'Blog Sidebar',
            'before_widget' => '<div class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<p class="widget-title">',
            'after_title' => '</p>',
        )
    );
}
