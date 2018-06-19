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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'jg2h?+=1%Lb7U&eL|@^y65Y+{#=lsoFw1$I ^,sM+bk%lr[^9ZRM[8<#Q:?(L_f7');
define('SECURE_AUTH_KEY',  't+))4.Nm8VWlen:{ .f2[5XNpLRW.{hSZid*Sw^XlAAL1#?PTZ}d6nT]cJmK]yB0');
define('LOGGED_IN_KEY',    ';5G6sFazaw$,&X7i}8XO?P2K/(uNwa`aU|D(:ko~*6P<!^#<x$H>0Z%uZB_|M)|,');
define('NONCE_KEY',        'VJNLyp@bY4W2y5XuSg|HGX5xytdLCW|mC}|.f}$TVj#Hw._vgM%z@w | n]kq?1*');
define('AUTH_SALT',        'z0W{md,u!k/kq}]V[lGE]2``KA;M0m):)BSsxrt8mVJ%mwM`+d138Kz;(MI_?^,p');
define('SECURE_AUTH_SALT', '2XldL&RNv{`qQFm@Z oRk*Ub=/Y7`*~!MQym;fc@~X&^:u7mWHZ[O49i;-7:bn/L');
define('LOGGED_IN_SALT',   '#o~}UZd1[OZ7Q73Eq~BG/m.2*?%@=Vh.}/d@V-+)nNG8vt,|--8nN.,ht`oz9J](');
define('NONCE_SALT',       ',+>Q{=$)Bb@p0S&Sf$xt2^DZfL*9Ea|!qzh,c8*z(WWw5IOxxacMBF~S(U9Br)IC');

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
