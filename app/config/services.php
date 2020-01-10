<?php

use Phalcon\Security;
use Phalcon\Http\Response\Cookies;
use Phalcon\Flash\Direct as FlashDirect;

$di->set(
	'voltService',
	function ($view, $di) {
		$volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);

		$volt->setOptions([
			"compiledPath" => APP_PATH . "/cache/",
			"compiledExtension" => ".compiled",
			"compileAlways" => true,
		]);
		
		return $volt;
	}
);

$di->set(
	'view',
	function () {
		$view = new \Phalcon\Mvc\View();
		$view->setViewsDir(APP_PATH . "/views");

		$view->registerEngines([
			".volt" => "voltService",
		]);

		return $view;
	}
);

$di->set(
	'db',
	function () use ($config) {
		$dbAdapter = $config->database->adapter;

		return new $dbAdapter([
			"host" => $config->database->host,
			"username" => $config->database->username,
			"password" => $config->database->password,
			"dbname" => $config->database->dbname
		]);
	}
);

$di->set(
	'url',
	function () use ($config, $di) {
		$url = new \Phalcon\Mvc\Url();

		$url->setBaseUri($config->path('url.baseUrl'));
		
		return $url;
	}
);

$di->set(
	'session',
	function () {
		$session = new Phalcon\Session\Adapter\Files();

		$session->start();

		return $session;
	}
);

$di->set(
    'security',
    function () {
        $security = new Security();

        $security->setWorkFactor(12);

        return $security;
    },
    true
);

$di->set(
    'cookies',
    function () {
        $cookies = new Cookies();

        $cookies->useEncryption(false);

        return $cookies;
    }
);

// Register the flash service with custom CSS classes
$di->set(
    'flash',
    function () {
        $flash = new FlashDirect(
            [
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]
        );

        return $flash;
    }
);

?>