<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cursosamacss' );

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
define( 'AUTH_KEY',         '] WDym:l;qlW=QOo`piie<.8#]<i{,)~q/^3pD*7tGwL@u&L)uq_fRUtBba@ix^p' );
define( 'SECURE_AUTH_KEY',  'WFwR+Vy(vi1aR}0&FCaFMbTV.>7eyhaj%@BbpE@YDs|v*,`Kko|?OWcDtyAQ(NYX' );
define( 'LOGGED_IN_KEY',    '%Zc* @b?/gO^>r}xcD+&+emx7IMnZ% Y712E9htU@R.}s:[rlf7+<huVDjrDTmc>' );
define( 'NONCE_KEY',        'D*g~SpO`Hm;DfsY{{`/HqMlUAGqO`]RqId^IlCwBl*M%`;C#+QeH)e6}2Nx9.{Lq' );
define( 'AUTH_SALT',        'T*,3fg8sgw;@1.6_EeAjZ/`vTUNozb0FBl5<incW>Qiv+v#X;`4JxTX_ZxsK?HKy' );
define( 'SECURE_AUTH_SALT', 'bA:,P@N=@!ZL!8yWBWpL(9N8o2@gQ`}8#X`T(=s_2Dr{T-z8IWAfbvBDn>quJ<2c' );
define( 'LOGGED_IN_SALT',   '5!^RcKt1xry9ZjBzc[b32JMiQ)k>[:1R$/6(n9/1]{hLD~[TWP9rfk1eg%9)_{yv' );
define( 'NONCE_SALT',       '=Gl8H6`c}nVW}n]NZ6c$=Y.ME>s[D4PKp#uhIhtC%vP~DB-=3Ye*q_h9_mP?V>{2' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
