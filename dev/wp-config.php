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
define('DB_NAME', 'db644090580');

/** MySQL database username */
define('DB_USER', 'dbo644090580');

/** MySQL database password */
define('DB_PASSWORD', 'im@rk123#@');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Sqx&P)`P67:X,xaYPLRJjR9yZN!w?@<zWh@X>4Ws`3!_pppgz%=vhNt44i=Tb@2y');
define('SECURE_AUTH_KEY',  'A[DUp3,|%okr.&tw6Z[yL_Z{_Z9e1*)} SGJo#<<1av4Ckw1+;2[NO:CqRF[&8&?');
define('LOGGED_IN_KEY',    't#[4j>nhw`Ipn1+ZKxQ,Ln[poCKu+t#I]QMu2LOrfR/.;{#T4yi<S&l;`*7?[C+D');
define('NONCE_KEY',        'XU:>dH+JYWQ|Y7nY1Qx:?V}Q_nj]YB{.rouig8A!Y:UY,CIp5UekMB4f+8vcmaOO');
define('AUTH_SALT',        'Ipk[_if_*f^0BCePWRH^sbRtLb {!?ey!V*B!y!&p5cjzjv%Lo|C?zCHc@3i>`fp');
define('SECURE_AUTH_SALT', '7{zkdM7Xc7*$D1Jv08`m9}/#i*4 mPKj -T|6mpwLs*q%cW_cf&wEGi5q|m^z{+v');
define('LOGGED_IN_SALT',   'ghbHFx$7:ah+=4I4Reh$mf|UGW:8;RNLu6v&DOXgud^be<FrOG=]g^,b?-8<ipW~');
define('NONCE_SALT',       'RPr`@1;IjZi%[R!mKG=u9;H*rb.)-^glVOAy&yx!<1dUNBW:Hp43VXCRBhS%,%n@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'im_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
