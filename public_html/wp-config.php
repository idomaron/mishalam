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
define('DB_NAME', 'mishalam');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'rootpass');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME','http://office.sola.co.il:8080');
define('WP_SITEURL','http://office.sola.co.il:8080');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '1}JnVf`aW1XI&ShKf)W?PwX &(Z4h]706*BHRz*zXW LAIcf]HSJAdNn+A/2IT(%');
define('SECURE_AUTH_KEY',  'njSA,G9XO1V9Ru8C%3 .AD&R1QKKx;ut~wy)KTnq?g4N@+Z},Cq4 Ykx,_qFnwbQ');
define('LOGGED_IN_KEY',    'K6hb8B+]zW=JbVcDLwxYtBzPzZ.5e]LihE:mR-Me4eV;SkkEwtzIGg:Z./(o*Tvl');
define('NONCE_KEY',        ')+6g+;X!7TdJ/V1u8kqMh+S%Ll7ZVds3s}-ZlnI/y*7HJ]oK-~E8L+](n`q@%<eB');
define('AUTH_SALT',        '6U@?Ch{pt,#+;JOfU$&NXP~*|=.-?H8-a4(pt*1T#WdPv.DL1A:qbmp`rK9Mvz{!');
define('SECURE_AUTH_SALT', '05c@+{,Q{^LH3Qi !cjcAwy4Slv@wmV&)~Js$Q?,+u$-_[w,b*A>8R{M8YCIy.*X');
define('LOGGED_IN_SALT',   '0323:9u).|pml4_fLAG&-AwC;QT4!@j<f[#KgLilkFoW,beXP7qUw;]t2{+@afl&');
define('NONCE_SALT',       'k%OvH&WhJ*c3@cLPoBgCu,p:o0JsG+}JTJMH37xwpuvYQ]rVqym*p5{F@?o#l3s}');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
