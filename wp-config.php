<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'atgenxclone' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&yfT<(0D7v^$|t>O[}o)U##o<?:!flu3lRHEc_fO,1iSx}NK->++zc:p9}@CpSYe' );
define( 'SECURE_AUTH_KEY',  ':Y6Lw9`|N7%L_#+Pc M3f4l&vo~qC* sp1T8E.R.`/a1+OGg2%%x8mi$/YeC@&}?' );
define( 'LOGGED_IN_KEY',    '1VOC_f>SP}JcrlYR_q -Wzq7%9ja^D8(aH%5?qS)Z.D)nxu-[r}hSU>U,mR=n1j3' );
define( 'NONCE_KEY',        'qi69NA6lLd_]M58}n{%{H{$WTA5mQ%(`lRc2[f4S EQup9tFL-);30/:TN7_RUjn' );
define( 'AUTH_SALT',        ')a<&0i~Z/)<;_(67_K;1&]zZtP8]N4|ko2/{J5]j3Db*7c%J @tn-2^wYgnIIA]O' );
define( 'SECURE_AUTH_SALT', 'G_Id-XMtL`zZ89:?f%@rwHoLNU8Rr_IsQ2+]P=F#W?<5oN6ry/>!2[xU&6gpte0Q' );
define( 'LOGGED_IN_SALT',   'r;>$)yArKkzRxg?tU[5Q<Rra%=z}t;1wv7<Y-iKBX6H|6[X)WTs}tZ|)0HII%Qpo' );
define( 'NONCE_SALT',       'p!~N Dx:hf*G]BwwthtjxTpiwPm7<7|DYFdfH,A4DC{N),LN5Qpb)nN#>a.mc!@d' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
