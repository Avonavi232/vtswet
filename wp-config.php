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

define('DB_NAME', 'vtswetdev');



/** MySQL database username */

define( 'DB_USER', 'root' );



/** MySQL database password */

define('DB_PASSWORD', '123QWEasd');



/** MySQL hostname */

define('DB_HOST', 'localhost');



/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8');



/** The Database Collate type. Don't change this if in doubt. */

define('DB_COLLATE', '');



if ($_SERVER['HTTP_HOST'] == 'localhost') {

    define('WP_SITEURL', 'http://vtswet.loc');

    define('WP_HOME', 'http://vtswet.loc');

} else {

    define('WP_SITEURL', 'http://vtswet.loc');

    define('WP_HOME', 'http://vtswet.loc');

}











/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define('AUTH_KEY',         'r`Ss2$n5kDtM6Q+(xU]Er[N.30HMf2%oxa8Y+S)DMX%4D^7K]mLBG9>dGK+3Eugc');

define('SECURE_AUTH_KEY',  '|0i|2y2yM{Q2 +Paa(7g4[%b.GM9a]bjUvs9[6qjqzhZD^=j4OxQDg(D%v_6CZq/');

define('LOGGED_IN_KEY',    'Q@wAr(<!^SH7R=089eS8o3QQFcl&:djOl~f`IAtiP-?DFtx924EF$C2Vm*@yi0gO');

define('NONCE_KEY',        '}3WJKDbg3zE?b5#1FikyQaUN# 0e^maaa]cIe09~oaD@{U&Xsi}G<^?3$TY&cu8~');

define('AUTH_SALT',        'T1!avK%]^E^Kv{=jHm :^]RY|Ui ryQ*q>,fRi@j/euHzk $$Jskz(+HF;7Y}&&2');

define('SECURE_AUTH_SALT', 'C@994hYeY:sZ(l78~_t_k9Fetvk.OqqQdsdrq|M%=tGDAIPrJ(-{nec1(PZQzOS.');

define('LOGGED_IN_SALT',   'Yx?^W-v%]KM^~OcO)A!td i*<}#uI0Hos|tTjD9f*PVrH:!IT.:xZlBSy(iN(0{$');

define('NONCE_SALT',       'qRV~Stw~;#Sr^@30:FxUnJ4Cc:jYkB.gVewxb]{ALA>P~C|WXE!9cW@xKdR{P@c#');



/**#@-*/



/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'aigop_';



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

