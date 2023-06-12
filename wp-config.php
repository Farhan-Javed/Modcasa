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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'modcasa' );

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
define( 'AUTH_KEY',         'T0,O_7s/C+dPk=wKWd`3j><CC@GRnQQ}m3ex>dk|:-JjK-_XCk%OH+!lXI4|~)af' );
define( 'SECURE_AUTH_KEY',  '!~9~OH2Kv(X{$Z66R<z+i7xAO5>vnTt T:`ssDX%iPwY_?WpZe1mJ)g8?:SW~re,' );
define( 'LOGGED_IN_KEY',    'dS*g2yt*T<*^;@h/p%/{v1KFdgalB&R>,wQ1Q?d$lG9nTM:!X%9!k0kV:-wktNKk' );
define( 'NONCE_KEY',        'h|=J7M[#k1lSXi6`|v46aP:+(~vQ!7}]X-7v6><grb@n{f_?zK9SWQo9dUS&{n:^' );
define( 'AUTH_SALT',        'I2,6xa8>mn`(lzNUgf:d$qRG+&@n3o*S]5?e6S_s&pd(w?JtZBu>VVr%!a+[*e)y' );
define( 'SECURE_AUTH_SALT', '(h=*!$0+$}*s~x1W_mfQ[xVUCF]R3moK!,ni9~X)M![,},neGyOVDn:?iC56+!Ak' );
define( 'LOGGED_IN_SALT',   '{B7v+(F9Khp7PW,G{2hSlj5eUvcZ2 U;N^O^#Ei0p6D4c}@Wy>fLyee 8o=+gnar' );
define( 'NONCE_SALT',       't5 *7FI6T_Q5G8BC.U.v}hI`|$>dy)m+@ffV<v@HfX`zi`3Joy{&VRJQZGBW<bQv' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
