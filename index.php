<?php



//protejer contra xss
function xssafe($data,$encoding='UTF-8')
{
	return htmlspecialchars($data,ENT_QUOTES,$encoding);
}

function sanitize($string = '', $is_filename = FALSE)
{
 	// Replace all weird characters with dashes
 	$string = preg_replace('/[^\w\-'. ($is_filename ? '~_\.' : ''). ']+/u', '-', $string);

 	// Only allow one dash separator at a time (and make string lowercase)
 	return mb_strtolower(preg_replace('/--+/u', '-', $string), 'UTF-8');
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

$uri = Request('_url','/');

$routes=array(
	
	'/test'			=>	'prueba',
	'/test/(\w.*)/'	=>	'prueba',
	'/'				=>	'homepage',

);

$server_pages=array(
	
	'404'	=>	'error_404',
	'500'	=>	'homepage',

);

///verificamos si index.php existe
$script_name=explode('/', $_SERVER['REQUEST_URI']);

if (!in_array(basename(__FILE__),$script_name))
{
	//verificamos si existe
	$count_not_found=0;
	//recorre los routers
	foreach ($routes as $pattern => $callback) 
	{
		//busca la coincidencia
		if (preg_match("#^{$pattern}$#",urldecode($uri), $params)) 
		{
			//pasa los parametros
	        array_shift($params);
	        return call_user_func_array($callback, array_values($params));
	    }
	    else
	    {
	    	$count_not_found++;
	    }
	}

	if (count ($routes) == $count_not_found)
		call_user_func($server_pages['404']);

}
else
{
	call_user_func($server_pages['404']);
}


