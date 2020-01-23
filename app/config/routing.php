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

		$router->addGet(
			'/tambah/operator',
			[
				'controller' => 'index',
				'action' => 'create',
			]
		);
		
		$router->addPost(
			'/tambah/operator',
			[
				'controller' => 'index',
				'action' => 'store',
			]
		);

		$router->mount(
			new LPSERoutes()
		);

		$router->mount(
			new PPIDRoutes()
		);

		$router->mount(
			new PersandianRoutes()
		);

		$router->mount(
			new LoginRoutes()
		);

		$router->mount(
			new LaporanRekapRoutes()
		);

		$router->mount(
			new KuesionerRoutes()
		);

		$router->mount(
			new PertanyaanRoutes()
		);

		$router->notFound([
			'controller' => 'index',
			'action' => 'show404',
		]);

		return $router;
	}
);

?>