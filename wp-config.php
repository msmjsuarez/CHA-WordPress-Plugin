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
define('DB_NAME', 'companydata.org.uk');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'D1:qzK[z5)JPWmw9G69c=J3S~_%g!NDjqNBB%SPLV+Tqd.84[1<esC*iUxwiMwB?');
define('SECURE_AUTH_KEY',  '*Naqxw>g|Ey>|Q!Qka3i1Q._s1V9w?w|<QtrCqAW wjjW=T)}4y=]GH3HY9Zbr+W');
define('LOGGED_IN_KEY',    '.O!W=6*u&L 5}vrOW&]GfoS3W8Wei#u)Pd^5qq.O^@EYrj<+K~*ki#DnJT0!JLz%');
define('NONCE_KEY',        'tEH %?!5w%)ut- _^Wr>,J*bq{/dwC0D/DM_x*NTaMz;)6Y{?reSmxu._PazOCG5');
define('AUTH_SALT',        '~uuTSb,a<QV1|q`)DXUEK.9jMUW75rq[3n|{|&rLZ]3p]Dko^CwKLaZgkl_&%$ZK');
define('SECURE_AUTH_SALT', 'VG.T5IOExXuapgLOj(| cCFs8|=`FdcqPE2C7imzsDTb#?|kUi>uYW[Fl,p*s[hv');
define('LOGGED_IN_SALT',   ';@d0E4u4(N$JZz#H<dw#(ZlP/,]b8zH7J=/>ldkO:T~nbqqoho-j>ZT&E^4MZ`>S');
define('NONCE_SALT',       'J_`wz OokalIe`ECS/$PR!y!A)ew2W#B7NhP2FpJgc=~$K-L>+KA/P8icPVo]bs/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
