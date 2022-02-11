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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'majd' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '*3c~Z/6s)b/L@n:<Lm)c&E~JptCS>R0MJCAH3}#i_-qN]*m*_kOQtxK9vJO8D^Xw' );
define( 'SECURE_AUTH_KEY',  '9o|&JR2C |Tqb;}~c[jKSr.Z*:Bq;,)t}/DJ^Y+3S8ctWvEnKpBWM;zMjvxKA%Jt' );
define( 'LOGGED_IN_KEY',    'i-)IG$w4$b(04mHJsS}x6*f5QMT%IZP7rAB`elFnW$vX{%naypCGl!Qe>m),@<Qs' );
define( 'NONCE_KEY',        'ZYsE]PCW%S@;i%GZ]OtDW5!RU!ctuJS+z.grB>dJVWNwC{~+LQ?&!2GSS={#`a/0' );
define( 'AUTH_SALT',        'n?JEx.VAu12N2?1NFr`]/nd$n*a)|qXl9{(od1eK4D2vY/VK1b?)m4!?M,dmJr.T' );
define( 'SECURE_AUTH_SALT', 'IU9wk|1wq9s~moIGx5^j#S{GtZu+w+h_~6 _W7n[a;?%]/q7qYw3oWwgk.i8M5EH' );
define( 'LOGGED_IN_SALT',   'nTSRbRm(W{:8<,U]d}6vUA2b?DR5:%R}P@:/YZMFeo5!Nrbbvj=5@_lWpVPLM-!a' );
define( 'NONCE_SALT',       'T%aq|t>iA98&E<1=fM)F7o%h (idYP_E9Mp[Uykb}+~ea3HPX]@OC-<ei 1Lpo+#' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
