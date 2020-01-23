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
				'/pertanyaan/tambah',
				[
					'action' => 'create',
				]
			);

			$this->addPost(
				'/pertanyaan/tambah',
				[
					'action' => 'store',
				]
			);

			$this->addGet(
				'/pertanyaan/ubah',
				[
					'action' => 'edit',
				]
			);
			
			$this->addPost(
				'/pertanyaan/ubah',
				[
					'action' => 'update',
				]
			);
			
			$this->addGet(
				'/caripertanyaan',
				[
					'action' => 'search',
				]
			);
		}
	}