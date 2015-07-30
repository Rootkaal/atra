<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'atrabase');

/** MySQL database username */
define('DB_USER', '4bc00fe0a5b8');

/** MySQL database password */
define('DB_PASSWORD', 'programacion2014');

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
define('AUTH_KEY',         '+B;s5X4bn.8;7mw<Qh[>7a}yj{UU=Tac6KAaVVG[LGIFz9pr?&^#>N-;v*1V.nbR');
define('SECURE_AUTH_KEY',  'h@cos-juj|Pt?$C8k~V$A;!#r{^su85P{q9W1ZfJtazl16~w36$Ya&1A;&X-Pa; ');
define('LOGGED_IN_KEY',    'Z].T||ESFXHZQ;sP!]iB//EaJ9MmM|<R0J46&M1/u2gQ!EG1+01Zf}EV]E(62t>w');
define('NONCE_KEY',        'p?46+K{8tW>;Ok3djyE|NJjq5Rv]fbY.o7wlC03m|aks,uu^wq0>0]6H_hZ;7QkR');
define('AUTH_SALT',        'UpQ-5r]1hvKDJFt<s&8:`X05-.~g<v`nxn^c_^B,=Sk^&ea3r94K.w=N)X<L+I5W');
define('SECURE_AUTH_SALT', 'DX|Bmp}EZ(=$_pnb5(VhjE%s5RgWIb%?Q_x(qDkG!vjW2@{8O+m6h)fOj?DQprL?');
define('LOGGED_IN_SALT',   'dWJ2}eKEWMF&[u09^* De5xINW#3TL_ddqM:Alz vH|+DM~(]`rf?*xV,$XmaN.0');
define('NONCE_SALT',       'a)-/Zg:Eni2rX)UIAd]f-<;C6#yR;eol8{XnktTv%d.(%HBswl0MCW-Du9n7w%G|');

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
