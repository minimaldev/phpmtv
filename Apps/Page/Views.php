<?php
namespace Apps\Page\Views;
use Framework\Http\Request;
use Framework\Http\Response\ViewResponse;

function prueba($name = 'a') 
{
		
	return new ViewResponse(
		BASE_PATH.DS.'views/name.php',
		array("name" => $name)
	);
	
}

function homepage() 
{
	header('Content-Type: text/html; charset=utf-8');
	header("HTTP/1.1 200 OK");
    print "HOMEPAGE";
}

function error_404() 
{
	return new ViewResponse(
		BASE_PATH.DS.'views/name.php',
		array("name" => "error 404 not found"),
		404
	);
}
