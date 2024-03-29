<?php

	use Phalcon\Mvc\Router\Group as RouterGroup;

	class PPIDRoutes extends RouterGroup
	{
		public function initialize()
		{
			$this->setPaths([
				'controller' => 'ppid',
            ]);
            
            $this->setPrefix('/ppid');

            $this->addGet(
                '',
				[
					'action' => 'ppid',
				]
			);

			$this->addGet(
                '/data-responden',
				[
					'action' => 'responden',
				]
            );
            
            $this->addPost(
				'/data-responden',
				[
					'action' => 'storeRespond',
				]
			);

			$this->addGet(
                '/kuesioner',
				[
					'action' => 'kuesioner',
				]
            );
            
            $this->addPost(
				'/kuesioner',
				[
					'action' => 'storeJawab',
				]
			);

			$this->addGet(
                '/hasil-kuesioner',
				[
					'action' => 'hasilKuesioner',
				]
            );
		}
	}