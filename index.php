<?php



//protejer contra xss
function xssafe($data,$encoding='UTF-8')
{
	return htmlspecialchars($data,ENT_QUOTES,$encoding);
}

function Request($item,$default='')
{
	if (isset($_REQUEST[$item]))
		return xssafe($_REQUEST[$item]);
	else
		return xssafe($default);
}


function prueba($name='a') 
{
	
	header('Content-Type: text/html; charset=utf-8');
	
	$input = Request('hh',$name);	
	
	printf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));
	
}

function homepage() 
{
	
    //print "HOMEPAGE";
}

function error_404() 
{
    print "error 404";
}

$uri = Request('_url','/');

$routes=array(
	
	'/test'			=>	'prueba',
	'/test/(\w+)'	=>	'prueba',
	'/'				=>	'homepage',

);

$server_pages=array(
	
	'404'	=>	'error_404',
	'500'	=>	'homepage',

);

//verificamos si existe

foreach ($routes as $pattern => $callback) 
{
	if (preg_match("#^{$pattern}$#", $uri, $params)) 
	{
        array_shift($params);
        return call_user_func_array($callback, array_values($params));
    }
}
