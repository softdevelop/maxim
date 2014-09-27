<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'maxim');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'FNK>hb-%@Qf>HyjSJgU4REeP+|5a%YBHfSd)6)E`$N}1`}i(.L&ZUb:wwZcYkLhI');
define('SECURE_AUTH_KEY',  'Lu|igA5DqYM1S5]Z*F*x(n1ApeiO}5b-5BL|cP}I5{}#dQ9xZRf%?6DF;dVk^NqC');
define('LOGGED_IN_KEY',    '?WSaqowO;`** yc<RMtGZKI+%oSyor-b;7(1$;:`,d^Shp] p/Z|ZE(J,Du4XEy=');
define('NONCE_KEY',        '0_|=+FV[v!]8AAl+:jVZO(eB @IsSG6w)K_E?qo<>-$}w]a&)SNRElcT`$dX:lA>');
define('AUTH_SALT',        'hcvbzH+abP~WiII4Q_]-.QY%G-^2z|9Cm2?AqgFz)VQs<1FSJ{v*ypSlAdY(_DH6');
define('SECURE_AUTH_SALT', 'O2M0XK=}k5RK<)kR1`VFrN|4e-AAl8o$tt_v)4[>JraV&sgAG(+%S#i*~CDJaf8J');
define('LOGGED_IN_SALT',   '.RP<VqGG}GbV|12~AK/?3 g=/)b/CKt9xlSKNycNVqP}9b&:=lW?Lb3Y{mf<bAMo');
define('NONCE_SALT',       'vcY[w>fn5nvyIIf8k}9]zy^8?f%SI%U+++$wz2rPc`f4pl?Bvw[+}3{^8vJaEoq7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
