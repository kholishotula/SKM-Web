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
		<html>
		<head>
			<title>404 - Not Found</title>
			<meta charset="utf-8" />
		</head>
		<body>
		<pre>
          .--.
         / _  \  ___      .--.
        | ( _.-""   `'-.,' _  \
         \.'            '.  ) /
         /                \_.'
        /    .-.   .-.     \
        |   / o \ / o \    |
        ;   \.-'` `'-./    |
        /\      ._.       /
      ;-'';_   ,_Y_,   _.'
     /     \`--.___.--;.
    /|      '.__.---.  \\
   ;  \              \  ;'--. .-.
   |   '.    __..-._.'  |-,.-'  /
   |     `""`  .---._  / .--.  /
  / ;         /      `-;/  /|_/
  \_,\       |            | |
  404 '-...--'._     _..__\/
                `"""`
  So tau nda ada ni url masi le mo buka,
  kena toch...
		</pre>
		</body>
		</html>
		<?php
		die();
	}
};

?>