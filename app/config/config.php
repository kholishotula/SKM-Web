<?php

use Phalcon\Config;

return new Config([
	'database' => [
		// 'adapter' => 'Phalcon\Db\Adapter\Pdo\Mysql',
		// 'host' => 'localhost',
		// 'username' => 'skmdiskominfotik',
		// 'password' => 's3mbarang@',
		// 'dbname' => 'skmdiskominfotik_skm'

		'adapter' => 'Phalcon\Db\Adapter\Pdo\Mysql',
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'dbname' => 'skm_kp2'
	],

	'url' => [
		'baseUrl' => 'http://localhost/SKM-Web/'
	]
]);

?>