<?php 

defined('ROOTPATH') OR exit('Access Denied!');

/** check which php extensions are required **/
check_extensions();
function check_extensions()
{

	$required_extensions = [

		'gd',
		'mysqli',
		'pdo_mysql',
		'pdo_sqlite',
		'mongodb',
	];

	$not_loaded = [];

	foreach ($required_extensions as $ext) {
		
		if(!extension_loaded($ext))
		{
			$not_loaded[] = $ext;
		}
	}

	if(!empty($not_loaded))
	{
		show("Extensions manquantes : <br>".implode("<br>", $not_loaded));
	}
}

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}

function esc($str)
{
	return htmlspecialchars($str);
}

function redirect($path)
{
	header("Location: " . rtrim(ROOT,'/') . $path);
	die;
}