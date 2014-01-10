<?php
defined('BASE_PATH') or die("error....");
return array(
	
	'/test'			=>	'Apps\\Page\\Page\\prueba',
	'/test/(\w.*)/'	=>	'Apps\\Page\\Page\\prueba',
	'/'				=>	'Apps\\Page\\Page\\homepage',

);
