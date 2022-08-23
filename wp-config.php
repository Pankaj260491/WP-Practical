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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-practical' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         '-xGVt:JZqe,z7vO(tnhU0L!|Q#_G4{TUpqwlc&/UW,Z:e3`Lh4Hu@y41f]]/@n&_' );
define( 'SECURE_AUTH_KEY',  '`Unm,{ui2g@Gw`cG^>a.LGV]Z:4Lc8sXk}jt%[;54&-=#q/=IR):n6->`G3>yP[e' );
define( 'LOGGED_IN_KEY',    'eK>xJ:M9$jEy&]H4QqRack;VRKOj3Pd,+Xm:+eQk3M1sHo0>ml_!reR 8(*Wk*P$' );
define( 'NONCE_KEY',        '/>^Pv`H/ek7U`w9@b h;6H07S`%wuEhgUBy]^3k<i-ujJVdq.nFOix`rX3C=B5F%' );
define( 'AUTH_SALT',        'X_4-G[*`xa [TT SRDpz&8WSP8>942(obsK|kt1Bn[eEIgjVLB~}XjjBE7l]=2=U' );
define( 'SECURE_AUTH_SALT', '|d61%A`V#!`XRj{BE5]Wa+h>L>uqb((C5,X[/7A#u/N^4,6Z7LE2GBcm14KGykx-' );
define( 'LOGGED_IN_SALT',   'a%hVY(i4qH,B+%:9uz):b%p@CEqwY,6#|&VSE3-s[lQ5IL/l`=SH],@S(X?d4hhL' );
define( 'NONCE_SALT',       ' I(vBruo0)8QW1sCC`g@Z^M K)1xTp8OUOfgr7O#3-()l`YfOU Y#2viD}1*r,4h' );

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
