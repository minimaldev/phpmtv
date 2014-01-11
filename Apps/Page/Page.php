<?php
namespace Apps\Page\Page;
use Framework\Http\Request;
use Framework\Http\Response\ViewResponse;

function prueba($name = 'a') 
{
	
	$req     = new Request;
	$input   = $req->get('hh',$name);	
	
	return new ViewResponse(
		BASE_PATH.DS.'views/name.php',
		array("name"=>"hola")
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
		array("name"=>"error 404 not found"),
		404
	);
}
