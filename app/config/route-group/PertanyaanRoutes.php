<?php

	use Phalcon\Mvc\Router\Group as RouterGroup;

	class PertanyaanRoutes extends RouterGroup
	{
		public function initialize()
		{
			$this->setPaths([
				'controller' => 'pertanyaan',
			]);
			
			$this->addGet(
				'/pertanyaan',
				[
					'action' => 'show',
				]
			);

			$this->addPost(
				'/pertanyaan',
				[
					'action' => 'delete',
				]
			);

			$this->addGet(
				'/tambah-pertanyaan',
				[
					'action' => 'create',
				]
			);

			$this->addPost(
				'/tambah-pertanyaan',
				[
					'action' => 'store',
				]
			);

			$this->addPost(
				'/edit-pertanyaan',
				[
					'action' => 'edit',
				]
            );
		}
	}