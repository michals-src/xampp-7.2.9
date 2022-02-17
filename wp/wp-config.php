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
define('DB_NAME', 'wordpress_nauka');

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
define('AUTH_KEY',         'M<Y;Xo>_u9@boi;QF=ia^u-P5PpsNED,DK(OW19^%)J8*Ry#@jAvWiQrEh?gwyXY');
define('SECURE_AUTH_KEY',  'zHMLF(2Ru:f|8P|8U5Q%O^;[/2nOua?aYSX5?rXi4]e[sw${;Wln05j?$`gfz:(D');
define('LOGGED_IN_KEY',    'SGP1vv@7#HRcGS~dc*?I@e]=RXN/,Q6`3c5k#3Ve~0`v:hkM3GeIp[NmR:smi6c}');
define('NONCE_KEY',        '=aJar`=]KCW3vC&[}m+|q{kN+UT5:IoO/+F#F%SxDI}}z&Xu&IOgG)3P+Gz3x4FF');
define('AUTH_SALT',        '3Lh5H}e9FWSVik0I1A6/Lz]JU9g-!=j*rL7p<3Sp?xF49-WLAbj%nn|1v8N-4Fhu');
define('SECURE_AUTH_SALT', 'am{1~J@Q+wX> s*E^d.b$yzf#k.*o4FFNf_kLkYr|OwgBjq3jy,}4)VUE>2{F.8*');
define('LOGGED_IN_SALT',   '?Cozj[J-P>%F&bkCkMQ$w~wT]YWEGD<0MgU5>W>9vwyl(,RbmESaD2jlHae^7t#n');
define('NONCE_SALT',       'Xqfob4T*j(r`6V-zK?,*ZQI9:e87ossCpXUTLNIOId@.H~B?qq8o_bUUS:()*k^.');

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
