<?php

	use Phalcon\Mvc\Router\Group as RouterGroup;

	class PersandianRoutes extends RouterGroup
	{
		public function initialize()
		{
			$this->setPaths([
				'controller' => 'persandian',
            ]);
            
            $this->setPrefix('/persandian');

            $this->addGet(
                '',
				[
					'action' => 'persandian',
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