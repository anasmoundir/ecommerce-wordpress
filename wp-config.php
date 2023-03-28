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
define( 'DB_NAME', 'ecommerce' );

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
define( 'AUTH_KEY',         '&u]Kv@+NY[!R3Ro_iJZC(Z{ vY65^7n,AXmK_Z|Hq#w]FmKpBdK#J.tE]f-6A{K3' );
define( 'SECURE_AUTH_KEY',  ',d59.nnF _hB,/e7G8k%Pz.B.Z|xbr-Hf C+/WsN:^>*H^.v<4h 6W7&Rv|)}F[8' );
define( 'LOGGED_IN_KEY',    '$#%A%C)$g4T]&A?AZNtBmvh8QlaUogM /mrVFnd[Y?$VJxuh!n#|%eJ2qGY>A07m' );
define( 'NONCE_KEY',        '`yW5:7jqC:A-V|15AL+&H,pZr@!1dOmFhw5KAF4zPNtUBQu3LpS70vIi267ZTV+4' );
define( 'AUTH_SALT',        'W?F5rZ]{zO)JMf8tde07@GOr?W)Nr%v_2dH)*wtdj=5[uMtW!<O3AbNY=D(ctADI' );
define( 'SECURE_AUTH_SALT', 'Ob}50F_*x)_Ypz9(cgrKPdU@UK1>ntS+[. NKpO(!NADR(rO94o./Gl?;ugb/I >' );
define( 'LOGGED_IN_SALT',   'y/~^)?=||M1/O/JU1K}Q;_(qGV?YhCJJF8V|5T.{~`/r.WVk{.;mTwgdfC( b[JQ' );
define( 'NONCE_SALT',       'MOdm2>-BL5DhdB%kHN3VlXYA6X^<(!h*iFx3m6:U>Iz%{NrG) (FKev/<>yYWYt}' );

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
