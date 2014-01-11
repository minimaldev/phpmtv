<?php
namespace Framework\Router;
use Framework\Http\Request;
use Framework\Http\Response\ViewResponse;
use Framework\Utils\ModuleResolver;

	class LambdaRouter
	{
		protected $_request;
		protected $_script_name;
		protected $_uri;
		protected $_routes = array();

		public function __construct()
		{
			// hacer nada
			$this->_request 	= new Request;
			//obtenemos el nombre del archivo root
			$this->_script_name = explode('/', $_SERVER['REQUEST_URI']);

			$this->_uri			= $this->_request->get('_url','/');
			//obtenemos las urls
			$this->_routes 		=	include_once CONFIG_PATH.'routes.php';
			
		}

		protected function show404()
		{
			$server_pages 	= include_once CONFIG_PATH.'server_pages.php';
			$module 		= ModuleResolver::Resolve($server_pages['404']);
			include_once $module;	
			call_user_func($server_pages['404']);
		} 

		public function Run()
		{

			$showPage = array_filter(array_keys($this->_routes),
				array(__CLASS__, 'mapRoutes'));
			
			$isFile	  =in_array(ROOT_FILENAME,$this->_script_name); 

			if (!$showPage  or $isFile )
			{
				///mostramos error si pone index.php o nombre del archivo principal
				///o mostramos error si la pagina no se encuentra
				$this->show404();
			}
			

		}
		 protected function mapRoutes($pattern)
		{
		
			if ( preg_match("#^{$pattern}$#",urldecode($this->_uri), $params) ) 
			{	
				//pasa los parametros
			    array_shift($params);
			    //seteamos la funcion
			    $callback = $this->_routes[$pattern];
			   	//cargamos el modulo que sea con el pattern
			    $module = ModuleResolver::Resolve($callback);
			    include_once  $module;			        
			        
			    call_user_func_array($callback, array_values($params));
			    return true;
			}
			else
			{
			  	return false;
			}
		}
	}
