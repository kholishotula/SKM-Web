<?php

	use Phalcon\Mvc\Router\Group as RouterGroup;

	class LPSERoutes extends RouterGroup
	{
		public function initialize()
		{
			$this->setPaths([
				'controller' => 'lpse',
            ]);
            
            $this->setPrefix('/lpse');

            $this->addGet(
                '',
				[
					'action' => 'lpse',
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