<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'consultl_wp399');

/** MySQL database username */
define('DB_USER', 'consultl_wp399');

/** MySQL database password */
define('DB_PASSWORD', '73(pPbS!19');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'kjvuc1zj7ulggntmcetttkxj8wo7umtzxik2th9v82mktkzvzd6ckjjhdorn6vmj');
define('SECURE_AUTH_KEY',  'hcknvnuschlrchgsdlydk3ijxj6klh3gvi4bwyghazwaqj9ixaztsanxccgqw0be');
define('LOGGED_IN_KEY',    '9k72qjxfagctauymti16g4lsutsoouiefutuoiurnpn6rljmzr1wzwgcrnc2snpf');
define('NONCE_KEY',        'tqyf0wyw0kkmumxotrmfdrndzy0zjzsrsmmn8125ytpk1vskecr4bhqe06didubz');
define('AUTH_SALT',        'szjjhp43towhfiop3i3dugwezogmvb5s2e5tqoq22k2c0pprkvi3hfkwb3zgcotq');
define('SECURE_AUTH_SALT', 't4u3ijxx4laq2ji8bmskssxopththxlhrr7dpz5vwse1quupblxwmcfkbz9emzeh');
define('LOGGED_IN_SALT',   'r4unotvrq40l2mfbs1qpogutx31evltakwgsuhaphejvvdhlagz0mcr1auqgtjsj');
define('NONCE_SALT',       'qru1nboio1yd4w2xtswicxagmmfg1babekggzhhmybabov7woql764wtjes4vrmr');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
