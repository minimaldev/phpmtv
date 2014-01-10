<?php
use Framework\Http\Request as Request;
namespace Framework\Router;
	
	class LambdaRouter
	{
		protected $_request;
		public function __construct()
		{
			// hacer nada
			$this->_request = new Framework\Http\Request;
		}

		public function Run()
		{
			//obtenemos los routers
			$routes =CONFIG_PATH.'routes';
			$uri = $this->_request->get('_url','/');

			foreach ($routes as $pattern => $callback) 
			{
				//busca la coincidencia
				if (preg_match("#^{$pattern}$#",urldecode($uri), $params)) 
				{	
					//pasa los parametros
			        array_shift($params);
			        // $callback;
			        return call_user_func_array($callback, array_values($params));
			    }
			    else
			    {
			    	$this->count_not_found++;
			    }
			}
		}
	}

