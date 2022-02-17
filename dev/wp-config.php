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
define('DB_NAME', 'wordpress_development');

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
define('AUTH_KEY',         'lHug0d0CjE4h>^B`jp~E|L)gB,=!&CO#Yv6p.XboCRWmgoCyma#;jx_u8%+w5tn;');
define('SECURE_AUTH_KEY',  'kYJDmuax&ZONSM@r;jx]nH|8$l#8*H8(rG30,?yb| R4KY%B+.]P9d]:.635$1Vz');
define('LOGGED_IN_KEY',    '>HJ$9t>J1n&al+ht wi]u0SW6yo@%dM*v(QFHNi.L,?Q`K2#h2iJi9cT_z=]hfJy');
define('NONCE_KEY',        'PF]#B>!`Fbw%Yhq,vJf;IAhqq6}]^99{@Rp*I#}uH^RT:pE<w$jzANNDVeT=.D y');
define('AUTH_SALT',        '20+JG1A:4?)^YYq|!d;|_()pozk.=-dWoM}j:Q;$r<1|}w)o;qwsa/Vu/+q?JpJ ');
define('SECURE_AUTH_SALT', '8,9<sI_zaD:vU_{aptLJ6WjA D.{d]*TR-G+G^uE?wf@2+4$5q;pEXHv{DizuwK$');
define('LOGGED_IN_SALT',   'dD~ocrI&rv7,VFOiF`K3Y/.!#SQS`Wj pahH{9MEdAWWB;E9 Z$.XlL9m{tTkXG@');
define('NONCE_SALT',       'R!65W;sHi;S6/y~Jl7r+7>^scVH7{yeUEZP3rX7w|a*QQ@Y6}%b~>M#7M|;9e<be');

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
