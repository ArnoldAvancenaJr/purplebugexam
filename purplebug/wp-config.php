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
define( 'DB_NAME', 'purplebug' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         'CoK?Y>Yw`kF9Y8~4m8W;-7{zs+2CSdcV#a`5>/YLHA;{:Mu5$i4ew.K$9p+JdJ$B' );
define( 'SECURE_AUTH_KEY',  '=37N-aol9-0|+rgruMLD0h^a=>hcLu(L+a(vz;|<YA$IV:+UP&<vWsoO0;2|r;4U' );
define( 'LOGGED_IN_KEY',    'S_t+h!A~<BIrzUtsZmcn:/Kj4-GBcSI3r$Y:jP!,ER~%}t7]hzVb*]ng3}X:Bvu}' );
define( 'NONCE_KEY',        'ZLv>Nxp7GQ7K&~l_uW8;qc_2^%h_BM~9<|2}&oi_r*UNOJd kyP/F+@QJDabuae@' );
define( 'AUTH_SALT',        '>ULwQ<FvLiSgJSD74?@&nO2&l%:gt#:D%`W@DZW/UfAI_.0%t&=R)*,y%%nhQe}Z' );
define( 'SECURE_AUTH_SALT', 'vvEGK137L|,<WT!:ubp7wh:_0NQdVv]XH#gba Z|a#P`d7,n>4&G=J1+{K3uta*@' );
define( 'LOGGED_IN_SALT',   '?9_{Y)y8;]Eq-lmoKm$-?)Pjo=]ju0kXa%)k;f(Tjij_kueMm(^t__GLi)v-/&)6' );
define( 'NONCE_SALT',       'PRV=Me+N(1eNQ4%bDXV9>D_RDVc4B7i>#mL.5X&x7y8/!6ufbxMtXiAuV$:>=S;e' );

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
