<?php
//add routers
return array(
	
	'/test'			=>	'Apps\Page\prueba',
	'/test/(\w.*)/'	=>	'Apps\Page\prueba',
	'/'				=>	'Apps\Page\homepage',

);
