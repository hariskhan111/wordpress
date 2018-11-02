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
define('DB_NAME', 'unite');

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
define('AUTH_KEY',         '+0n7yk#R{x{t@3_=J~+2BXl:n2<Gj%f,,i]*Qfh8kSXX@a2q=kLK0|$xbEZBvCd!');
define('SECURE_AUTH_KEY',  '3nS>,k|I)H*y-ZXGPwd?sk+VgOOAriaBluL@pW~dzn[s$YMK.pnpjMZ{)WI51^?6');
define('LOGGED_IN_KEY',    'fsSd7dnb=x u<C$R>;plhcF<=lGHrIE5+rak&.d#8^LQ_x9[E?6BC8lv2,=}{ffo');
define('NONCE_KEY',        'Xq8P%A1w@[u>}#PKH|7?5/S[R`5eD<-R$>lSCA-.M(U83@kh)X*IC:I w$Qo&0zG');
define('AUTH_SALT',        '3^}&{AAmeKwMX*#J_[Q2,FYmlmgIe<i&Xs9sV>nH$*7wV3L|YSf%6?N#j3(e1k(J');
define('SECURE_AUTH_SALT', 'K8BkHKH.@6|*Qxf5z)iW5^lv2GmEJgf#vC:e?L3Hv2td[#%I4U>PxJY{0Eq{plZ,');
define('LOGGED_IN_SALT',   'yma)TMiKa.Z6?MHf:%yes,[#`?a{XSUp{ ]ia_sa`??O,om<vbI ~crGPx5dEdw~');
define('NONCE_SALT',       '-y(KLJ @LU .N-jn_e^HaBxT~GFa$=6|sbSlvo,?_^zG>y]|Vfe.gnp<og 8OWDk');

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
