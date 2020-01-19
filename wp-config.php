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
define( 'DB_NAME', 'adrinstitute' );

/** MySQL database username */
define( 'DB_USER', 'adrinstitute' );

/** MySQL database password */
define( 'DB_PASSWORD', 'test1234' );

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
define( 'AUTH_KEY',         ':I@|qPo WUxO.^VEkU^,EZlw|FH)l9c/ On0L(;*.LaV?y69N?WO`*O3FpZ#64f[' );
define( 'SECURE_AUTH_KEY',  'sEj%I<i)?Q[K`4hyG3/lK0^:oZo;nIh`rYj~rXD(Hd>QQc&aU4mPofxKvzDly}-F' );
define( 'LOGGED_IN_KEY',    ':|;@GYI)`B4(FSU=<w([6+I})CBYHV264Mtw1u8a=DY`D0@0n[]wNYq]uM0<<9/T' );
define( 'NONCE_KEY',        ']2ye.vX97bMYXKS?<k>q6]Y%aDYS|kKE5nPUDvZt0?)NBul2ZU`o3SSzeBtc}bxp' );
define( 'AUTH_SALT',        ']7aju(;&QN^L6}+9iOV*m!Q~q!ujp%xg0%yT%,S}fbn+fYINk=nplFgd<=& A}tA' );
define( 'SECURE_AUTH_SALT', 'y?GBz#Cb+8Tnp}^7Y$F?uVP,En;&{/)p^o4WKi@xJjK)J4)Jy5|g`qekAWAe:})H' );
define( 'LOGGED_IN_SALT',   'De1XB&hZ47a]`#*nu.gY;F?0T^.%JP}0-@0?1OW/6v^,Mk^X }syLg1M9Nd^HYKw' );
define( 'NONCE_SALT',       '*Wzn0{-$$ryRq;ElEJf0sC>_+6lr&pLZ=t9%6_kj+cafD=8*2(goON8Z6-!s|+1V' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'adri_';

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
