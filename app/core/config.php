<?php 

defined('ROOTPATH') OR exit('Access Denied!');

if($_SERVER['SERVER_NAME'] == 'localhost')
{
	/** localhost database config **/
	define('DBNAME', 'simplesocial_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('ROOT', $_ENV['LOCALHOST_WEBSITE_URL']);

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

define('APP_NAME', "My Webiste");
define('APP_DESC', "Best website on the planet");

define('DEBUG', true);
