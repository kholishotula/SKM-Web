<?php

	use Phalcon\Mvc\Router\Group as RouterGroup;

	class KuesionerRoutes extends RouterGroup
	{
		public function initialize()
		{
			$this->setPaths([
				'controller' => 'kuesioner',
			]);

			$this->addGet(
				'/kuesioner',
				[
					'action' => 'show',
				]
			);

			$this->addPost(
				'/kuesioner',
				[
					'action' => 'delete',
				]
			);

			$this->addGet(
				'/tambah-kuesioner',
				[
					'action' => 'create',
				]
			);

			$this->addPost(
				'/tambah-kuesioner',
				[
					'action' => 'store',
				]
			);

			$this->addPost(
				'/edit-kuesioner',
				[
					'action' => 'edit',
				]
            );
            
            // $this->addPost(
			// 	'/delete-kuesioner',
			// 	[
			// 		'action' => 'delete',
			// 	]
			// );
		}
	}