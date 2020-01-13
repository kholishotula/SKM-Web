<?php

$di->set(
	'router',
	function() {
		$router = new \Phalcon\Mvc\Router(false);

		$router->addGet(
			'/',
			[
				'controller' => 'index',
				'action' => 'index',
			]
		);
		
		$router->addGet(
			'/panduan',
			[
				'controller' => 'panduan',
				'action' => 'panduan',
			]
		);
		
		$router->addGet(
			'/survei',
			[
				'controller' => 'survei',
				'action' => 'survei',
			]
		);
		
		$router->addGet(
			'/laporan',
			[
				'controller' => 'laporan',
				'action' => 'laporan',
			]
		);

		$router->mount(
			new LoginRoutes()
		);

		$router->notFound([
			'controller' => 'index',
			'action' => 'show404',
		]);

		return $router;
	}
);

?>