<?php
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
define('DB_NAME', 'consultl_wpAnd');

/** MySQL database username */
define('DB_USER', 'consultl_wpAnd');

/** MySQL database password */
define('DB_PASSWORD', 'SUP[Au810]');

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
define('AUTH_KEY',         'tn2qjazj0zvbpculezudeuyf90noeo1lrkxi7ylv4bu9bmfajd1gsjm3kndpynjl');
define('SECURE_AUTH_KEY',  's58iwoyi6ffjnkv9qtmkwjux3cdtc1qzev8l1vkvncju4shw03wmutmbcvyb45pa');
define('LOGGED_IN_KEY',    'yggancupwsjfi4nuammeb2ae1fnxuvvnevugvspqmdbcxn4ea9abco4fgwlcbxni');
define('NONCE_KEY',        'kcxip36nsvmecseyjh0fci6lklnlaiaohqb6rcqal4nuysulhufgqmz8lyebusg1');
define('AUTH_SALT',        '71geipwgqyyqrafamxma16pdvqu0cfb2uitomwiyu93coqatbn4fmrp86lp7gplp');
define('SECURE_AUTH_SALT', 'bwj3b29jxphkefz2qruwxfsupmwwsj9wktdry22egk4fjbji5tpa0vbhsf7ndwrf');
define('LOGGED_IN_SALT',   'swjlrcbkgnxkkgm7bhym3vikcet4m6frdpfauozg4zz8thxig6h1dhojftrqt7pz');
define('NONCE_SALT',       'fesit1ogvwnpxjdxaz6bbblbuxkp83txnk9wzou7zbvs3fase9mq9adwetkv6j9v');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
