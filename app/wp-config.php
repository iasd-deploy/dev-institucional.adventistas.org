<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $_ENV['WP_DB_NAME']);

/** MySQL database username */
define('DB_USER', $_ENV['WP_DB_USER']);

/** MySQL database password */
define('DB_PASSWORD', $_ENV['WP_DB_PASSWORD']);

/** MySQL hostname */
define('DB_HOST', $_ENV['WP_DB_HOST'] . ':3306');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/* Multisite */
define('WP_ALLOW_MULTISITE', true);

define('AS3CF_SETTINGS', serialize(array(
	'provider' => 'aws',
	'access-key-id' => $_ENV['WP_S3_ACCESS_KEY'],
	'secret-access-key' => $_ENV['WP_S3_SECRET_KEY'],
	'bucket' => $_ENV['WP_S3_BUCKET'],
	'enable-delivery-domain' => true,
	'delivery-domain' => 'files.adventistas.org'
)));

define('FORCE_SSL', true);
define('FORCE_SSL_ADMIN', true);
$_SERVER['HTTPS'] = 'on';

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
define('AUTH_KEY',         '9G^DYm6]#>WKm)DG!^iT5:Eh/aI&hMMoI^!5{>fcMu(AY>gX4GP,YJ+xV-{rv-X3');
define('SECURE_AUTH_KEY',  'q1>scdFI}#,SP?Zn#ih7HSM4AU0fImYpq-pp|t0mD&EQKTPh~/,4RR?@WIk:q.v[');
define('LOGGED_IN_KEY',    'iga-bu|]lCId9^vwXM/+qRZ~Z0-zj~.S0Ni&kRWA5t5ze~?p9L,WwVLhYZPdZL[B');
define('NONCE_KEY',        'OSAM])0lW8$RH/u|p:_c-Fa+e|q6O4Lab4Ng*1Qw5`NI${3| 2i4S<5hZgP&JIZk');
define('AUTH_SALT',        '#(pNnuZ=BR]3Hz4o0uxj=#eJR&ftT|>B#7(^$zXV8t*dRLE651s^E#ySlXToaKF8');
define('SECURE_AUTH_SALT', 'CYZ,r?~bS9G]&aY(]&B%|l.<(}9{(@Eh,w9Yy*r=Xo~$luwn)zWfn*0Vp@PzBg~<');
define('LOGGED_IN_SALT',   '5l0m;^|z--mc9j/rLOmPCSn={TVRoE-^0mXbdn3[{>S6Q&CrW3XwtLZI2#2 A<j+');
define('NONCE_SALT',       'J$ujM!?hn74U3i H6Gi0t]oa3O]B=b>%,YOfLFURkOT!_GXKuI?-31,<^x:~fTb?');

/**#@-*/

/**
 * WordPress database table prefix.
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
define('WP_DEBUG', false);

define('WP_MEMORY_LIMIT', '512M');

/* Add any custom values between this line and the "stop editing" line. */

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', $_ENV['DOMAIN_CURRENT_SITE']);
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
