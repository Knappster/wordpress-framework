<?php

include 'functions.php';

// Prevent user enumeration
if (!is_admin() && isset($_SERVER['REQUEST_URI']))
{
    if (
        preg_match('/(wp-comments-post)/', $_SERVER['REQUEST_URI']) === 0 &&
        !empty($_REQUEST['author'])
    )
    {
        openlog(
            'wordpress(' . $_SERVER['HTTP_HOST'] . ')',
            LOG_NDELAY | LOG_PID,
            LOG_AUTH
        );
        syslog(
            LOG_INFO,
            "Attempted user enumeration from {$_SERVER['REMOTE_ADDR']}"
        );
        closelog();
        wp_die('Forbidden');
    }
}

// Theme support options.
add_theme_support('html5', ['gallery', 'caption']);
add_theme_support('post-thumbnails');

// Disable front end wp admin menu.
add_filter('show_admin_bar', '__return_false');

// Enable custom login styles.
// add_action('login_head', 'custom_login');

// Frontend styles.
add_action('wp_enqueue_scripts', 'enqueue_style');

// Frontend scripts.
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// Custom init.
add_action('init', 'custom_init');

// Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', 'single_template_slug');

// Custom sidebars.
add_action('widgets_init', 'custom_sidebars');

// Post excerpt settings.
add_filter(
    'excerpt_length',
    function ()
    {
        return 50;
    },
    999
);

add_filter(
    'excerpt_more',
    function ()
    {
        return '&hellip;';
    }
);
