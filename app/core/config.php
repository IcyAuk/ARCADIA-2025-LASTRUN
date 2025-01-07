<?php 

defined('ROOTPATH') OR exit('Access Denied!');

if($_SERVER['SERVER_NAME'] == 'localhost')
{
	/** localhost database config **/
	define('ROOT', 'http://localhost/arcadia-2025-lastrun/');
	define('DBNAME', 'arcadia2025-lastrun');
	define('DBHOST', 'localhost');
	define('DBUSER', 'lastrun');
	define('DBPASS', '5556');
	define('DBPORT', '');
	define('DBCHARSET', '');

}else
{
	/** online server database config **/
	define('ROOT', $_ENV['DEPLOYED_WEBSITE_URL']);
	define('DBNAME', $_ENV['DATABASE_NAME']);
	define('DBHOST', $_ENV['DATABASE_HOST']);
	define('DBUSER', $_ENV['DATABASE_USERNAME']);
	define('DBPASS', $_ENV['DATABASE_PASSWORD']);
	define('DBPORT', $_ENV['DATABASE_PORT']);
	define('DBCHARSET', $_ENV['DATABASE_CHARSET']);
}


define('DATABASE_MONGODB_URI', $_ENV['DATABASE_MONGODB_URI']);

define('APP_NAME', "ARCADIA");
define('APP_DESC', "Site de Zoo");

define('IS_DOMAIN_DEPLOYED',false);
define('DEBUG', true);
