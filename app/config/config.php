<?php

use Phalcon\Config;

return new Config([

	'database' => [
		'adapter' => 'Phalcon\Db\Adapter\Pdo\Mysql',
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'dbname' => 'SKM'
	],

	'url' => [
		'baseUrl' => 'http://localhost/SKM-Web/'
	]

]);

?>