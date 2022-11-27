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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '}XAb_|[ gnc:k,g<EP1TdVtS(.I8;Ud*xAi;cXQ y_;]/)>Gn2$]ogKO4`Gw8sad' );
define( 'SECURE_AUTH_KEY',  'JrgvBdipv;{S;*YA++s&|!o)II9%p,Z>=mL[Mi3W4jYPm+$0h-@-1AnjM;=/93Tx' );
define( 'LOGGED_IN_KEY',    'CUaT]I$^?c.pK-@sI.4{=w:5zY[{&^2,AiKKsSK&WCe9wPn5 =&u#@Ad!7^v+ei1' );
define( 'NONCE_KEY',        '@,Px_dR+&j!J0M%5a7ha%dgk1T.R}0q|jfo,fUX^|&QU>jkn2,T2`uxd6-Ve2)o+' );
define( 'AUTH_SALT',        'p=F{F&x)//k5MO)iZ`RxV]!zykljq9 $OvSM %8>/p3 a] F&6H~!]55RpNc<syf' );
define( 'SECURE_AUTH_SALT', 'Ih9pP%0$Z43t_WZ!-UHcUx[1:l[3ZPt.s{rqO-IHc`#4IAmx)r,2INx2|wm5T6B|' );
define( 'LOGGED_IN_SALT',   '%-@xS&}W|DUnYqn~/6^0zW|<:qj<-Bo|4#pCvd*A;X.wE]s<=6CR-7lpVe-N.8a)' );
define( 'NONCE_SALT',       'ES<T_S6=<Is/-[rO=LW<-0+%H;(lJKm?Ju6LwICy02y)TNboC>.a`AH-&$#^:#@0' );

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
