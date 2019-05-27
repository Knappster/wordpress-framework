<?php

$root_dir = dirname(__DIR__);
$webroot_dir = $root_dir.'/public';
require_once $root_dir.'/vendor/autoload.php';

// Load environment variables.
$dotenv = Dotenv\Dotenv::create($root_dir);
$dotenv->load();

// Custom content URLs.
if (!defined('WP_HOME') && isset($_ENV['WP_HOME'])) {
    define('WP_HOME', $_ENV['WP_HOME']);
}
if (!defined('WP_SITEURL') && defined('WP_HOME')) {
    define('WP_SITEURL', WP_HOME.'/wp-core');
}
if (!defined('WP_CONTENT_DIR')) {
    define('WP_CONTENT_DIR', dirname(__FILE__).'/wp-content');
}
if (!defined('WP_CONTENT_URL') && defined('WP_HOME')) {
    define('WP_CONTENT_URL', WP_HOME.'/wp-content');
}

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV['DB_NAME'] );

/** MySQL database username */
define( 'DB_USER', $_ENV['DB_USER'] );

/** MySQL database password */
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] );

/** MySQL hostname */
define( 'DB_HOST', $_ENV['DB_HOST'] );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8AR$}O+0Mbi/E(>[;/dyx=>#?A-QHcS B|mn;^=Sj)i:Q1+p(G}1.Ik!)DXa+gAn');
define('SECURE_AUTH_KEY',  '/^mOC XM9uzSJ|U-hd:_m~p-EPaV2:~ aH,ygH&0W1uN[$7JqQm)c(>tiho*^&Z5');
define('LOGGED_IN_KEY',    'o>wdxsFU~8-/zB-a}|S)MB3k062w3/K3+ Q]afZeoIrDls|b+ER3VSYn #w(/m,!');
define('NONCE_KEY',        'JO_9JXKJ=<rgRJgJmd-xdXMLT+H,=|#X)x026-42a#8#6%Or_,>5x)Hg+;GGgkU&');
define('AUTH_SALT',        'gz%mP@uFw-Y=Pw8+Oi3y>uke5Z?-6R-Yqem.MMGEg{PJ&[p:EyMv{V&^o1}8Av6#');
define('SECURE_AUTH_SALT', 'C`^)g5t.YW0FCm+UI%HZ}X<I{xj?$KYZZIkd+voSrO[W<-b>AVi*hAS2qsvi:4N0');
define('LOGGED_IN_SALT',   'YVD&%yF@,.Fz2f{&xSrc6SOC jnn#rT-+w[Sf+I7_0R+ut(Cvd!+VY<j9h-^m||}');
define('NONCE_SALT',       'DV-v/@MAxiKMmeMy=xdN}.|-F~4Fg;|bHA[25*Uc?4A(KqR=unV1K/Ay6q0RSHUH');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', $_ENV['WP_DEBUG'] );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/wp-core/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
