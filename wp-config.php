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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'edwinbroce2022' );

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
define( 'AUTH_KEY',         'p9[jph_dM ;}/!*Y0N0zHWPSbFq]v*10/Yi&2 Y@]Y27:u6d=^x6ZRToq>-<6|fj' );
define( 'SECURE_AUTH_KEY',  'LsiP*Eff4B2}G{M.efWjaA*|4h!@WNu,*NjC`&IZjZZOG65*(Uk1%)3l&R/Ck$Vj' );
define( 'LOGGED_IN_KEY',    'H4KTC;F2+(!;<a0%IzG2+]:viGO|.(gv5Uj/rG_i@.{tVgz6[Tnf&EDM!M}4epxg' );
define( 'NONCE_KEY',        '$./MGnCO(Gka4k0Q.4ah>xT}ADKK_9V~kIKfpfEo }kio}6$:2%~T0v!C]Q.__,4' );
define( 'AUTH_SALT',        'j,l-%QBsf_,M/HO~MoU[j?E-?@uJfbZU}_22!h-FHF+&/bR#Y7-AB%id_o*yS 1#' );
define( 'SECURE_AUTH_SALT', 'ztj1Q1;t~3>2<6txe77J&2==|-jnWuhgj)ssPuKCA+jD{Egp4WF, }^u5YI>ENI&' );
define( 'LOGGED_IN_SALT',   'iujrQ;LpseF=pyRd8W^ke7c|bSEY{:JEICJ/VpCXPH Q-</Vu8r?P}=~of_?$zSy' );
define( 'NONCE_SALT',       'O{;`s}LFz?VVxD!>%+Dx`AfI5xZxF_5[b#@P}$.G#zGkL#RDu &{3Q1We5X5*OnU' );

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
