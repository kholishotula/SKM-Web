<?php

	use Phalcon\Mvc\Router\Group as RouterGroup;

	class LoginRoutes extends RouterGroup
	{
		public function initialize()
		{
			$this->setPaths([
				'controller' => 'login',
			]);

			$this->addGet(
				'/login',
				[
					'action' => 'create',
				]
			);

			$this->addPost(
				'/login',
				[
					'action' => 'store',
				]
			);

			$this->addGet(
				'/logout',
				[
					'action' => 'destroy',
				]
			);

			$this->addGet(
				'/profile',
				[
					'action' => 'showAccount',
				]
			);

			$this->addPost(
				'/profile',
				[
					'action' => 'showAccount',
				]
			);

			$this->addGet(
				'/admin/ubah',
				[
					'action' => 'edit',
				]
			);

			$this->addPost(
				'/admin/ubah',
				[
					'action' => 'update',
				]
			);
		}
	}