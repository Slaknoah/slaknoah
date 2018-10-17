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
define('DB_NAME', 'slaknoah');

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
define('AUTH_KEY',         'W*BDD5pVym #j*-KoKGnn1JsTFg=fSBSesy1xlLB[XXi3SZ@A&,8q5GEJg=`&b|m');
define('SECURE_AUTH_KEY',  'Gyj)S69t|IY,ulXtVkQ0,3/w=lL7D~<uO2X!i^^<g2$RVagHDdf|58(w06@^ATtN');
define('LOGGED_IN_KEY',    '858VW8gWYH>Bx=W1L5cQh]FxlC9eW=rYB$@H(=~6~jBFGD>VdtW>w@MN21q E*~>');
define('NONCE_KEY',        'QI%|v&<1&Kj.h6ZNbYRvMwhmNYIja3pdH,g_L/7^*~t)/b!pb<]b51:7w.7?M=Db');
define('AUTH_SALT',        'D85c57w f`s5ZNR<8RV)UW$@d>gX0^K1X;?5s~<7k8<RE`_He&6A%/# Ej&qN+`]');
define('SECURE_AUTH_SALT', '.*habjh$Bv4m-hEKB*0XnZq8@r1-=}Nj2}Lx;)sB9bZt*O?jNY2,<:2f}uW!;c{X');
define('LOGGED_IN_SALT',   'qf6=Iv341}n/C-3|ot.^NnJ,u j_w7bH1e, 8]+}xh`&`aU:V-Uy`Ad[?~f8F>?2');
define('NONCE_SALT',       'Ig=}I{d4#H2~9B0V7AwU}XAVbVq9v:E{E!<o}OIz+M-fQeCgp:7gE{>W&~7B?f~?');

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
