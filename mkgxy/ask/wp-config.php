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
define('DB_NAME', 'consultl_wpask');

/** MySQL database username */
define('DB_USER', 'consultl_wpask');

/** MySQL database password */
define('DB_PASSWORD', 'SPr99(u6-k');

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
define('AUTH_KEY',         '1dbhpoemx4gfplk1k9asmz0o3jh8c9niu0gfzab0nm247imtmdpmakazpax6y3dd');
define('SECURE_AUTH_KEY',  'jgiqiqxvxfzn4zjoqlcqugzzvt07gmqrmx7gq1ve8ap3rl6egfpp0zjhvhvsoubn');
define('LOGGED_IN_KEY',    '8etlxolyfeuh1rk4i95d2g0wcffneyobhxqibsmo77oqlf2fzwtcf7tlja0mzfsb');
define('NONCE_KEY',        'qq4rhpm7yj8f1yaelzjqumw9nvgjysavmu1iulzdcxz2zhhwbpykhbvkjzxsum8u');
define('AUTH_SALT',        'yuhp7hewtierdiog6bhtugeieqpq1l4vt3rco4xeu65h7ea7orb7wxpupug0uxnr');
define('SECURE_AUTH_SALT', 'mzif9op0ekr1k0sulpde2kecneh7ntbhkzq8p7t80cbzym4ooymnqes58ldgy8ft');
define('LOGGED_IN_SALT',   'qvaw9r8pbn2qqp1b1a9jsdngqv804zpc9dvcwx01jbxf2q9rgaphptfuoz8szite');
define('NONCE_SALT',       'polqtjj6cjvpjbw6uoadzaiykojk3nk7na7att5poazaspipforysjjueyglh4ck');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '';

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
