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
define( 'DB_NAME', 'members' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '@]$i@Lpx6([bkcDI,ZL+I5,i3p]=cTxa8:)0H-bh&/=)ux0.(7&e#SCSj/+4  d:' );
define( 'SECURE_AUTH_KEY',  'J(=F!3fB5W=$st}Zmh*Nx01lEv-Nu(dlD7V@!mslIGiBH/p=rtIX:3AKcQ,:oh3Z' );
define( 'LOGGED_IN_KEY',    'iT<9/bT5/7<=KM$^{C@f(=RJTco|Osr9C3/uLV*Ca0/b~=o5Eo_nw9y%na.)UiM8' );
define( 'NONCE_KEY',        '2vYEUP>E~z0jEV_$j4HvBXvccM;caX<Vs,@%[)U]0JLSUokBP%0%z*b$L#>4$}O}' );
define( 'AUTH_SALT',        '`SM/WUpg#F:nNeOd-{b)4_u2BEd~B4*jjsIaDFl bIa2jIWM~WSb[=Ie&kMw4%0,' );
define( 'SECURE_AUTH_SALT', 'O9WG+Ly9qIHza%Kq&hJZFj?6)X(We)d8r2]3zilAG(q75l-g1~YRU%bE;=sqHi]f' );
define( 'LOGGED_IN_SALT',   't%kjL`jpb&uZyK+q=+3o`$bg[bJNc-%t`bDKwpAdZ5IB%EnDoNElZdr&G_]ExrvD' );
define( 'NONCE_SALT',       '3)[4*wa,4d?qv(8kKe$O`yNVRaM6R%-yZV5ve<tK`I<0c<Xrz.]T7mV@ cqdlDB<' );

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
