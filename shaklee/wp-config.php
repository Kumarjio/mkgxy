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
define('DB_NAME', 'consultl_wpshak');

/** MySQL database username */
define('DB_USER', 'consultl_wpshak');

/** MySQL database password */
define('DB_PASSWORD', 'X(S87F)20P');

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
define('AUTH_KEY',         'cdyp3ufyevzazrtowfisdut9oqhk3farmgpjhsvdsr1yipnwt6zzr7hy2tjdwpc9');
define('SECURE_AUTH_KEY',  'pjhiq0ztguwri9nmaqvy7h6smiq3rcszlb9mxggyy6wknwpzr4ts39vgdtc7lujm');
define('LOGGED_IN_KEY',    '0lwpbnianpexu7maptflntuzkm8aj9uhyaz32evbcakn3frriheghqff3y4hxfrs');
define('NONCE_KEY',        'cqirfmzte3dfurpzzvbujsbftaaecigsinljckfffojcaedphfyeezaxzy4eo27d');
define('AUTH_SALT',        'voozeuurifo40lrd02wa4mfltvedzvnnldbwndnz4tz0dsenhefbjljn8lxsx8yq');
define('SECURE_AUTH_SALT', 'lyzuefhxmrs8zwce7pchp6oztgrujhac37ixzmccuwprjnp6v0mvlo8pmkf9iorw');
define('LOGGED_IN_SALT',   'fbgnolmc49emjlishlwchremzgtlraegnxwuxibm57bqkoxsfskvu2hlqxw7b0dx');
define('NONCE_SALT',       'uyvt1vhmvms0nnyljfbxxcpa1yuzy2l9odsd493gfdy1asvvurv4wdfctdmruneb');

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
