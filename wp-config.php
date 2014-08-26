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


// some changes required for this to work using the remote db and remote uploads
	
	// echo('<pre>');
	// print_r($_SERVER);
	// echo('</pre>');

	$environment = 'production';

	if ($_SERVER['HTTP_HOST'] == 'induction.baddeo.com') 			$environment = 'testing';
	else if ($_SERVER['HTTP_HOST'] == 'localhost') 					$environment = 'dev-matteo';	
	else if ($_SERVER['HTTP_HOST'] == 'localhost:8888')				$environment = 'dev-sel&rhys';


	// WP_HOME and WP_SITEURL are set in the remote DB
	// but we're overriding them here to use the local url instead
	switch ($environment)
	{
		case 'production':
			define ('WP_HOME', 			'http://induction.ravensbourne.ac.uk/');
			define ('WP_SITEURL', 		'http://induction.ravensbourne.ac.uk/');
			break;

		case 'testing':
			define ('WP_HOME', 			'http://induction.baddeo.com/');
			define ('WP_SITEURL', 		'http://induction.baddeo.com/');
			break;

		case 'dev-matteo':
			define ('WP_HOME', 			'http://localhost/rave/induction/microsite');
			define ('WP_SITEURL', 		'http://localhost/rave/induction/microsite');
			break;

		case 'dev-sel&rhys':
			define ('WP_HOME', 			'http://localhost:8888/ravedigitalzombies');
			define ('WP_SITEURL', 		'http://localhost:8888/ravedigitalzombies');
			break;	
	}
	
	
	// THEME URL

	define ('WP_THEME_URL', 			WP_SITEURL . '/wp-content/themes/ravedigitalzombies'); 		
	// this allows us to use a local test, whilst keeping wp-content remote
	// see https://codex.wordpress.org/Editing_wp-config.php#Moving_themes_folder
	// and /wp-content/themes/ravedigitalzombies/header.php

	// DB settings
	
		// remote DB on induction.baddeo.com
		// define ('DB_HOST', 			'localhost');
		define ('DB_HOST', 			'46.183.13.53');
		define ('DB_NAME', 			'baddeocomwpp4o37y56');
		define ('DB_USER', 			'wptz2apl46gvvmog');
		define ('DB_PASSWORD', 		'J1rN3}7Pwhf%51d0UnCO');

		// remote DB on induction.ravensbourne.ac.uk
		/*define('DB_NAME', 			'inductio3_q7de');
		define('DB_USER', 			'inductio3_q7de');
		define('DB_PASSWORD', 		'fbbvy9syht63dult');
		define('DB_HOST', 			'10.168.1.44');*/

	define ('DB_CHARSET', 				'utf8');
	define ('DB_COLLATE', 				'');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eL*-W[YrsMY,ImdTLVfWsVGp,4p?bV.ixuIlk9.2-L7WEc:Vy4og@9YM-MCL}pOk');
define('SECURE_AUTH_KEY',  '*SCvq?vWf40dGE1]y:mYEwr0tJBWL]XdL}}m=6]=onoJjl7[pPXJ3-HQDMn?VPZA');
define('LOGGED_IN_KEY',    'yqk^uiNsAPWFSnP.xEHcOmV=9%R1CK@ZZBdmNKKVA21?K}fyPrC=Ttvi,/1^KEQh');
define('NONCE_KEY',        'CEd5KKs9qsC7oCwd6G+k00gu7t4nZ83tC_ALax=YUApl1k@wc%]/mbT9.jhsIC5s');
define('AUTH_SALT',        'K0-KHPijRox9F?[?uiUJm=JiRyX^+kuA3GN6*HbfSr?Ja/vfXpRJ/NpGgY}i5eo}');
define('SECURE_AUTH_SALT', '0xE4]%fVt%MbwYrtI-W}OWX}+UzIh,]U+Mj6y.Gk9P50}IrpMlG=lCGzfZ6J_=lL');
define('LOGGED_IN_SALT',   'QQ*D:bx,[95nm0?l-1nqn}_KdZ*mHh0.}sfmIh,re^Uqi4GDmrr]sY7.,:pv5a+:');
define('NONCE_SALT',       '?7g,7jN]+y-z0%v%wL9]trs}7vVgSgyPqwoZ+,o[%izQFsI-XyyddmI*Vs7AaSSk');

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
