<?php
namespace Framework\Router;
defined('BASE_PATH') or die("error....");
use Framework\Http\Request;
use Framework\Http\Response\ViewResponse;
use Framework\Utils\ModuleResolver;

	class LambdaRouter
	{
		protected $_request;
		protected $_script_name;

		public function __construct()
		{
			// hacer nada
			$this->_request = new Request;
			//obtenemos el nombre del archivo root
			$this->_script_name = explode('/', $_SERVER['REQUEST_URI']);
			
		}

		protected function show404()
		{
			$server_pages = require_once CONFIG_PATH.'server_pages.php';
			$module = ModuleResolver::Resolve($server_pages['404']);
			include_once $module;	
			call_user_func($server_pages['404']);
		} 

		public function Run()
		{

			if (in_array(ROOT_FILENAME,$this->_script_name))
			{
				///mostramos error si pone index.php o nombre del archivo principal
				$this->show404();
			}
			else
			{
			//obtenemos los routers
			$routes 		 = require_once CONFIG_PATH.'routes.php';
			$uri 			 = $this->_request->get('_url','/');
			$count_not_found = 0;

			foreach ($routes as $pattern => $callback) 
			{
				//busca la coincidencia
				if (preg_match("#^{$pattern}$#",urldecode($uri), $params)) 
				{	
					//pasa los parametros
			        array_shift($params);
			       
			      	//cargamos el modulo que sea con el pattern
			        $module = ModuleResolver::Resolve($callback);
			        include_once  $module;			        
			        
			        return call_user_func_array($callback, array_values($params));
			    }
			    else
			    {
			    	$count_not_found++;
			    }
			}
			//si no hay paginas que coicidan mostramos error 404
			if (count ($routes) == $count_not_found)
				$this->show404();

			}

		}


	}

