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
				'/kuesioner/tambah',
				[
					'action' => 'create',
				]
			);

			$this->addPost(
				'/kuesioner/tambah',
				[
					'action' => 'store',
				]
			);

			$this->addGet(
				'/kuesioner/ubah',
				[
					'action' => 'edit',
				]
			);
			
			$this->addPost(
				'/kuesioner/ubah',
				[
					'action' => 'update',
				]
			);
			
			$this->addGet(
				'/carikuesioner',
				[
					'action' => 'search',
				]
			);
		}
	}