<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', 'root');

/** Database hostname */
define('DB_HOST', 'localhost:8889');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         ';lf!M>1TSfhalpyv;IYHmv^,qH?^pkqRIpu99%)]i_]BQy?_) PtYf2Hkg*<Xm*1');
define('SECURE_AUTH_KEY',  '9_p@QhrW21dmNE9in)rAR_sQlrLlq/`LEFuyOZgSGo*{xHOs53zzL#Ry}l$C+B:9');
define('LOGGED_IN_KEY',    'aDRle$g7mN^|&92^bXP=gPA:9*3)}1:N]*;E.IbZrvx2eG*]/vp|2y86J<<W;Tb8');
define('NONCE_KEY',        'Ftrs$N|aizk#4g<!mJ1GnoeV/Qvb%p-?DvZNes+VXp?4&LqpdLmstN-z~csW6>[)');
define('AUTH_SALT',        'EX|#z+K^@Wj$4QL6HH|;|mgf7b7wwOEQ.]VG{a/u9-`e[2/}eF{Zim2PC_=o22lV');
define('SECURE_AUTH_SALT', 'gm~Bs*}e1JNOZ}XL/TRxa+6Yeq|acvER&2kyjGFO&R.dc lJLwqG<f?-Z?6eoAvS');
define('LOGGED_IN_SALT',   'XXtBRyqx;*;Flvg<nrhnt5B{E#cSA(dEif~459a/},tz!8%)To$/$ghL<(/L Z~r');
define('NONCE_SALT',       'Jh@^gnwaB}G|2VmKY*WA=K^PfGb|QW(t-yXC@>&^a`I6wZTVTc(xt&v@9_).iMLG');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);  // Log errors to wp-content/debug.log
define('WP_DEBUG_DISPLAY', false);  // Do not show errors on the front-end

/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
