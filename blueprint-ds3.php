<?php
/**
 * Automate the setup of WordPress, Kadence
 * Version: 1.0.0
 *
 * You can modify this blueprint to your liking. For example a user is created named "testadmin" with a password of "password". You can change these and the admin_email address. 
 * Also if you do not want a particular function to occur you can comment that line out by placing two fowrad slashes in front of the line. For example: // ds_cli_exec( "wp plugin update --all" ); 
 * This will no longer update all plugins.
 */
 
 
//** ----------- WORDPRESS CORE -------------- **//

//** Download the latest version of WordPress
ds_cli_exec( "wp core download" );

//** Install WordPress
ds_cli_exec( "wp core install --url=$siteName --title='Kadence Website' --admin_user=testadmin --admin_password=password --admin_email=test@$siteName" );



//** ----------- BASIC SETTINGS AND CLEANUP -------------- **//

//** Change the tagline
ds_cli_exec( "wp option update blogdescription 'Astra Website'" );

//** Change Permalink structure
ds_cli_exec( "wp rewrite structure '/%postname%' --quiet" );

//** Discourage search engines from indexing this site
ds_cli_exec( "wp option update blog_public 'on'" );

//** Remove Default Themes (Except twentytwenty for debugging)
ds_cli_exec( "wp theme delete twentynineteen" );
ds_cli_exec( "wp theme delete twentyseventeen" );

//** Remove Plugins
ds_cli_exec( "wp plugin delete akismet" );
ds_cli_exec( "wp plugin delete hello" );

//** Remove Default Post/Page
ds_cli_exec( "wp post delete 1 --force" ); // Hello World!
ds_cli_exec( "wp post delete 2 --force" ); // Sample Page
ds_cli_exec( "wp post delete 3 --force" ); // Privacy Page

//** Delete First Comment
ds_cli_exec( "wp comment delete 1 --force" );

//** set the timezone
ds_cli_exec( "wp option update timezone_string 'America/Los_Angeles'" );


//** -------------- THEMES -------------- **//

/* Install Kadence Theme*/
ds_cli_exec( "wp theme install kadence --activate" );


//** -------- PLUGINS ------------- **//

//** Install Kadence Blocks
/** Download plugin from repository, unzip, activate */
ds_cli_exec( "wp plugin install kadence-blocks --activate" );

// Install Kadence Blocks Pro Plugin
//ds_cli_exec( "cp 'C:/Users/gregg/Dropbox/WP_Pithy/11. Kadence/kadence-blocks-pro.zip' ./; wp plugin install kadence-blocks-pro.zip --activate; rm kadence-blocks-pro.zip" );

/* License Kadence to match the ones in your account(https://www.kadencewp.com/my-account/my-api-keys/) */
//ds_cli_exec( "wp option update kt_api_manager_kadence_gutenberg_pro_data '{\"api_key\": \"kadence_gutenberg_pro_wc_order_10cMZcvZ4LCib_am_MtPfTsz52kZR\",\"activation_email\": \"admin@serverpress.com\",\"product_id\": \"kadence_gutenberg_pro\" }' --format=json" );

// Install Kadence Pro Theme Plugin
//ds_cli_exec( "cp 'C:/Users/gregg/Dropbox/WP_Pithy/11. Kadence/kadence-pro.zip' ./; wp plugin install kadence-pro.zip --activate; rm kadence-pro.zip" );

/* License Kadence to match the ones in your account(https://www.kadencewp.com/my-account/my-api-keys/) */
//ds_cli_exec( "wp option update ktp_api_manager '{\"ktp_api_key\": \"ktpl_wc_order_b6qGj7KlrjEBz_am_BWAvwbxvKCUh\",\"activation_email\": \"admin@serverpress.com\" }' --format=json" );

// Install Kadence Starter Templates Plugin
ds_cli_exec( "wp plugin install kadence-starter-templates --activate" );

// Update all plugins and themes
ds_cli_exec( "wp plugin update --all" );
ds_cli_exec( "wp theme update --all" );

//** ----------- FINAL CHECK AND CLEANUP -------------- **//

//** Check if index.php unpacked okay
if ( is_file( "index.php" ) ) {

	//** Cleanup
	ds_cli_exec( "rm blueprint.php" );	
	ds_cli_exec( "rm index.htm" );
	ds_cli_exec( "rm blueprint-ds3.php");
	ds_cli_exec( "rm blueprint-ds5.php");
	ds_cli_exec( "rm blueprint.png");
}