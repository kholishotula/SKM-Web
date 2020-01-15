<?php

$loader = new \Phalcon\Loader();

$loader->registerDirs(
	[
		APP_PATH . '/controllers/',
		APP_PATH . '/models/',
		APP_PATH . '/config/route-group/',
	]
);

$loader->registerNamespaces(
	[
		'App\Forms' => APP_PATH ."/form/",
		'App\Events' => APP_PATH. '/controllers/security/'
	]
	);

$loader->register();

?>