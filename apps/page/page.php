<?php
namespace Apps\Page;



function prueba($name='a') 
{
	
	header('Content-Type: text/html; charset=utf-8');
	header("HTTP/1.1 200 OK");

	$input = Request('hh',$name);	
	
	printf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));
	
}

function homepage() 
{
	header('Content-Type: text/html; charset=utf-8');
	header("HTTP/1.1 200 OK");
    print "HOMEPAGE";
}

function error_404() 
{
	header('Content-Type: text/html; charset=utf-8');
	header("HTTP/1.1 404 Not Found");
    print "error 404";
}
