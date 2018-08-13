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
define('DB_NAME', 'multisite');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'nlstech888');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'WP_ALLOW_MULTISITE', true );

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'rNDA}Z8:}xPrd{*;:)3_V#6HD:sz6A[B^<Z{NFRc[3H hQzU[&+y%^4u+Lg*pFcV');
define('SECURE_AUTH_KEY',  ' MjZn-~y%oi+~.DWu;vWm[Z!,,pL[]BrB5>FRRWw8qr;v?e^lma>NpeN^JuwP;?,');
define('LOGGED_IN_KEY',    '5rIH?*bf.wdR42&KD+KJb% )~*c%j&oo6?tRIxcTYge`~wQ9^xqf}z)+2907/#RB');
define('NONCE_KEY',        '`(_1=C]hFV*#/#/c69&4C(FP2Xi8fLh=kWav$?W0SpTg#TrS26S5zwLL{y}zA}y[');
define('AUTH_SALT',        '!^A!3eTb0w/T.;j$[JVx]p87r!S~a]7(ly)Kw#=29C:7B+O!Y0x%}D}XTIT-Bu=9');
define('SECURE_AUTH_SALT', 'W0Yh|p_%voH+3YA7#JvzNi]D-)0Xb=z`|w~jq3nL!|6|Xp;<siPiLVLL+@CY/o2#');
define('LOGGED_IN_SALT',   '9VkV 2J5Yf0 +TT=ev*VWe[j: y516,/~X<`wz&%-38Bp~QoPaC~c%h)G5iGUMn2');
define('NONCE_SALT',       'CaSUrT?GjBz8+JG%Z1&&x^{tn`qllH,f6|NQw`Ax*op,PSv_qL[KitktWL${DIQC');

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

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', '192.168.0.117');
define('PATH_CURRENT_SITE', '/multisite/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

define('WP_HOME','http://192.168.0.117/multisite');
define('WP_SITEURL','http://192.168.0.117/multisite');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
