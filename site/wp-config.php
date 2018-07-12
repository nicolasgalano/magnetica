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
define('DB_NAME', 'wedoweb-magnetica');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'mqapn9fzubtj9vahbju2x4yyvz8q4ahs6omxcpfx613xqnz9w58bjzfxt5s1pvhc');
define('SECURE_AUTH_KEY',  'urambdd6hmos1gkri10gbgstkaajbf5rzcj5ufmfj71gbsbfykjwfnz5vkc31dcu');
define('LOGGED_IN_KEY',    'uhcsnvytbdwm5q1aonhifmxgfyjlkjkvm54g64vaaqd1tshdk3expuhhi7daiqsj');
define('NONCE_KEY',        '5mjeslbnjmlpakw3gihx4po8ra8hnd3agfryswjptk4xrolzmg0ytf8bqz4q23jo');
define('AUTH_SALT',        'dtqt376q1zajfti7zmupbedij39eksc9mplbzd9cz8jm28wp82nbcmmzq8e5t6h2');
define('SECURE_AUTH_SALT', 'xe2ppyeuiyssfb0avcf4oiodfoxrare8w10geweeakczqmjbcqcnjttdguhtzvqu');
define('LOGGED_IN_SALT',   'jxbtdqlk2tzfvt7oazrrqc1wuwniq1apjbndzqwm1dvnobbresk0xjerfjeo8nao');
define('NONCE_SALT',       'oagtckqhsv8vh1xjx71vn1kitdhbamxfpojh6vq8gvaioz3s2rmehmxtjggpwnfp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
