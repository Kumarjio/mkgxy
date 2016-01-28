<?php
$path = APPPATH.'libraries/library';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
spl_autoload_register(null, false);
spl_autoload_extensions('.php');
if (!function_exists('classLoader')) {
function classLoader($class)
{
	if (substr($class, 0, 4) == 'Zend') {
		$class2 = str_replace("_", "/", $class);
		$file = $class2 . '.php';
		require_once $file;
	}
}
}
/*** register the loader functions ***/
spl_autoload_register('classLoader');
?>