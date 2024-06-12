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
define( 'DB_NAME', "potos" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         '$Y^/_*k?Fw7d`cE+~OR{_:_LZ$9.cC?1@qaM]{7/2]O1>S.U5iiMLSg%~pbXO;#D' );
define( 'SECURE_AUTH_KEY',  'wMo#|Tnrl._ib={`!(cF=Puw_N?75=U;hd@/MY:]TR~Rb+|TMbyp_d:B4krFSJ`w' );
define( 'LOGGED_IN_KEY',    'J{,pSr}ms!Ku(J;D*,^gs%PnA(2i0[7UUl;x~Y@k|DjP)^a1ZMF I0Hoe+[Re46F' );
define( 'NONCE_KEY',        '^r_b8eS`k+?E-uQREK]w]4LBdN0rId; c2lDl&)8kV_[j*[G-+#I8M:HIrx^p_6X' );
define( 'AUTH_SALT',        '*5[+#M#trYHZ6e:Kuw}(rBiNlWO(q3:ZH,Dy|p$YX6p.(9<pNo?qS>?C`*M<H,ho' );
define( 'SECURE_AUTH_SALT', 'WWHDE<UHQp)8mcrJFM5dP >|nirU?CmwSg@!OJ1)?z;desqHH7nMp~.5?=>_l@[B' );
define( 'LOGGED_IN_SALT',   'h=Pqe@4u2k<`Kw7I L @Rnae#c5q#B0P#>#,EXqlZaI>=pqTDRgB|Sn;$h/Kwpie' );
define( 'NONCE_SALT',       'R`s9K~bb`(;Upe5KrnR/uWGJ+h5GAwJ?8~E~@TS]KH1m|RxDL=^G3MCD7f6!?O~}' );

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



define( 'WP_SITEURL', 'http://localhost/potos' );
define( 'DUPLICATOR_AUTH_KEY', '0,i 2mz|&& sAyPyQH-&oF%6vY!_C>bFC56[Ehb?fU|U6AL>xToNE?u{ZQWN3b>m' );
define('WP_MEMORY_LIMIT','256M');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
