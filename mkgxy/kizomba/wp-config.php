<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'consultl_wpkiz');

/** MySQL database username */
define('DB_USER', 'consultl_wpkiz');

/** MySQL database password */
define('DB_PASSWORD', '4S[P4bF5!M');

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
define('AUTH_KEY',         'su0qfnh4tgvtlcjjshtc6qifeo5uxuvmtoifxs0miv4h8uoyrl9zc3jgfrs76zqg');
define('SECURE_AUTH_KEY',  'w2nq3va91hkczzgb9ucop2nslnt0zzorg5qy1buckeh9ce0v94walpgspkw6g0bd');
define('LOGGED_IN_KEY',    'wbexgevyamfyzgao7mfv2kpfrxlfi995erzzsmsw7ahrfsspsdzcyq6crvioz3kq');
define('NONCE_KEY',        'tcuvyxvziwhujuvcltt7ul0zmxm2t4fde7x0i0okx83geypkaf9dcitjbjwl3mr0');
define('AUTH_SALT',        'x2xmy1bk9mhfiehkqzdzbklam9plw3x87rzbsj77zzxeuvurxqzrdrenuvrg69mh');
define('SECURE_AUTH_SALT', 'yefsuzcshckpevttw0ran97steqkdq3iba2och6zckyaxyujfm9la19jbnympc6f');
define('LOGGED_IN_SALT',   'hg2tl6izdqmqeu2xnswwbet2okgrda5vh7q3jbeaicns00jsfbntfwvlcqyvbusx');
define('NONCE_SALT',       'kys8lvvb3nmrnitkin8sei9qanpeiqebhw3epizjoh3fhecd3v4gmxoh1keodz0o');

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
