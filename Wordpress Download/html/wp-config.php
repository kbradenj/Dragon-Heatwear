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
define('DB_NAME', 'drag3457795437');

/** MySQL database username */
define('DB_USER', 'drag3457795437');

/** MySQL database password */
define('DB_PASSWORD', 'A.j7VXyaGuX');

/** MySQL hostname */
define('DB_HOST', 'drag3457795437.db.3457795.hostedresource.com:3307');

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
define('AUTH_KEY',         '-3&3#4Hd@9Ks%RO=*3$R');
define('SECURE_AUTH_KEY',  'T*JavIBpt4js_Q9-c9Fw');
define('LOGGED_IN_KEY',    '@EIU3$yY%4w5 L-w5Sfh');
define('NONCE_KEY',        'xDK5FncpXPy38xR9snCn');
define('AUTH_SALT',        'zPha/R$kfXQPOF*zWL+c');
define('SECURE_AUTH_SALT', 'hf_bA&-g$D!b9)%7jp* ');
define('LOGGED_IN_SALT',   '%#xEFA2)d-VMcASKOrts');
define('NONCE_SALT',       '8vXOQ9yF$ZBgB7Aq7WcE');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_6qdw6krmpy_';
define( 'FORCE_SSL_LOGIN', 1 );
define( 'FORCE_SSL_ADMIN', 1 );

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
//define( 'WP_CACHE', true );
require_once( dirname( __FILE__ ) . '/gd-config.php' );
define( 'FS_METHOD', 'direct');
define('FS_CHMOD_DIR', (0705 & ~ umask()));
define('FS_CHMOD_FILE', (0604 & ~ umask()));


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');