<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class IndexController extends Controller
{
	public function indexAction()
	{
		
	}
	public function show404Action()
	{
		?>
		<html><body background="assets/error404.gif" style="background-size: cover"></body></html>
		<?php
		die();
	}
};

?>