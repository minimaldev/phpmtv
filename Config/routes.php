<?php
use Framework\Router\Pattern;
return array(
	new Pattern("^test/$", 'Apps.Page.Views.prueba', 'rss_home'),
	new Pattern("^test/(?P<name>\w+)/$", 'Apps.Page.Views.prueba', 'rss_home'),
	new Pattern("^/$", 'Apps.Page.Views.homepage', 'homepage'),
	//new Pattern("^(?P<name>\w+)/(?P<digit>\d+)/$", 'Apps.Page.prueba', 'rss_home'),
);
