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
define( 'DB_NAME', 'wptest' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', 'utf8mb4_general_ci' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '~YFrbitOL.Ppp$spS1U}kr33tq!,uehI&`dX(#r^aE$//|4q+0E,mLdt5brVaGHp' );
define( 'SECURE_AUTH_KEY', 'iOg`%xb,]ovwTfyUH2H~-92=[r7)]8O]:$zLa,.yO[i;a3;&VB5=C.YYp|Go=ji|' );
define( 'LOGGED_IN_KEY', ' @C<Ofh7D s|;:*^kG$/#B|b0ow4j~m$H:L|@]%$>qtxVxLgx2f,6rY?5*IDB+d>' );
define( 'NONCE_KEY', 'vZ3gM?jnlToD,G]fLJe$b5I9kl(Omuv.o-w&Vud[Q0O3jZ{-zD!725rb)P,dae%r' );
define( 'AUTH_SALT', '>@3k+QP]%%o<]zJh@&/`>2]u<3P=2]|^avIz}(<M&m]kM&>Y/nu7Gu!j>(&$B md' );
define( 'SECURE_AUTH_SALT', 'l9FO$ULSd|0sc_9CW/b9`FUQ!(L-u?oG~pGn;^V1k<EFAi8S]^*g&Cp6fbQ?jB#M' );
define( 'LOGGED_IN_SALT', '>b!WT_v?Y= $Rd9>`dUq76)M)N}6Rac7&z*9bgH))y#MD-tSxLSQ MmoV]cJ*W2?' );
define( 'NONCE_SALT', 'jfZnn_|E@id-W}-xlkZ:ZbNHQc/#xe|@OZ&6^R-//b#+gtnercs];OO3`[%X1ps:' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpim_';

/**
 * Added with Version 2.9, there is automatic database optimization support, which you can enable by adding the following define to your wp-config.php file only when the feature is required
 */
define( 'WP_ALLOW_REPAIR', false );

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define( 'WP_DEBUG', false );
define( 'SAVEQUERIES', false );
if ( WP_DEBUG ) {
	@ini_set( 'log_errors', 'On' ); /* Ideally, this should be set in php.ini, if you have access */
	@ini_set( 'error_log', __DIR__ . '/php_error.log' );
	define( 'WP_DEBUG_LOG', true );
	define( 'WP_DEBUG_DISPLAY', false );
}

/**
 * Prevent editing of WordPress files from wp-admin
 */
define( 'DISALLOW_FILE_EDIT', true );

/**
 * Prevent files installation form wp-admin
 */
define( 'DISALLOW_FILE_MODS', true );

/**
 * By default, WordPress creates a new set of images every time you edit
 * an image and when you restore the original, it leaves all the edits on the server.
 * Defining IMAGE_EDIT_OVERWRITE as true changes this behaviour.
 * Only one set of image edits are ever created and when you restore the original,
 * the edits are removed from the server.
 */
define( 'IMAGE_EDIT_OVERWRITE', true );

/**
 * Make sure a cron process cannot run more than once every WP_CRON_LOCK_TIMEOUT seconds.
 */
define( 'WP_CRON_LOCK_TIMEOUT', 3600 );

/**
 * Please note, this setting may not work if your host does not allow for increasing the PHP memory limit--in that event,
 * contact your host to increase the PHP memory limit. Also, note that many hosts set the PHP limit at 8MB.
 */
define( 'WP_MEMORY_LIMIT', '256M' );

/**
 * Post Revisions
 * WordPress, by default, will save copies of each edit made to a post or page,
 * allowing the possibility of reverting to a previous version of that post or page.
 * The saving of revisions can be disabled, or a maximum number of revisions per post or page can be specified.
 */
define( 'WP_POST_REVISIONS', 3 );

/**
 * Modify AutoSave Interval
 * When editing a post, WordPress uses Ajax to auto-save revisions to the post as you edit.
 * You may want to increase this setting for longer delays in between auto-saves,
 * or decrease the setting to make sure you never lose changes. The default is 60 seconds.
 */
define( 'AUTOSAVE_INTERVAL', 160 );

/**
 * Contact form 7
 */
define ('WPCF7_LOAD_JS', true); // Added to disable JS loading
define ('WPCF7_LOAD_CSS', false); // Added to disable CSS loading
define ('WPCF7_AUTOP', false); // Added to disable wrapping new lines with paragraphs

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
