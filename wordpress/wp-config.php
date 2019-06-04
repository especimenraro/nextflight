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
define( 'DB_NAME', 'nextflight' );

/** MySQL database username */
define( 'DB_USER', 'nextflight' );

/** MySQL database password */
define( 'DB_PASSWORD', 'libertad' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&EnZ/urk>ZFBZDd+9z9_U*0$7CX^on4=;LI@WoWdaoA;IGU0H>}ldhp7b!<SV$x~' );
define( 'SECURE_AUTH_KEY',  'Y|r=:fI_yrASKv25-I]]S& R|5kDLOb!Ot<NLv}Q1Fk@< ]F?w<r)LF4!i>ADM{n' );
define( 'LOGGED_IN_KEY',    'Tb>%fo%K[_%t:-l5{dxwOi%1TILP]ZR+H|]oXLn93i^q@4c$v5Pwe`n=q9}ay3lb' );
define( 'NONCE_KEY',        '{XOx+l-B4VGevpp#|q+8/B)/zZ]c[?N&|uJK#mX JyC3;e;o0R !kt%At@OA)!Yi' );
define( 'AUTH_SALT',        '9Q$D^ OVPypqIi,FIQHe% vwt@/0U&wViKsL*VqNzxOUG8r4P0H^fiRw[o1y+ih4' );
define( 'SECURE_AUTH_SALT', 'b(Rle?7F-(XD=gxuvJg&hcy:YBA6`E=PcWZ9|BFIneH%1/vQLXzo)fpu&hZKV}27' );
define( 'LOGGED_IN_SALT',   '6H9c=Do>#FzfQhCn~rwU/S/*VTVcEPsz.CXcdQV]jGC)88^_dN&dFOYlvAfzt1pA' );
define( 'NONCE_SALT',       ')4cDBrQ2BuMX,{NDQcG0T:r5h$YMe)MPsQ6OTm_Sl#$%8YHt&qW!SE~&nuDJi#i7' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

