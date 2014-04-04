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
			echo "404";
		} 


		public function Run()
		{

			$showPage = array_filter(
				$this->_routes,
				array(__CLASS__, 'mapRoutes')
			);
			if (!$showPage)
			{
				//si la pagina no se encuentra muestra error 404
				$this->show404();
			}

		}
		 protected function mapRoutes($pattern)
		{
			///chequeamos si es index file		
			
			if ($pattern->is_this($this->_uri) == true)
			{
				list($file,$namespace, $method) = array_values($pattern->get_controller()); 
				$file = BASE_PATH . DS . $file;
				if ( file_exists($file) )	
				{
					include_once $file;
				  	//resolve namespacing autoloading
				    //llamamos a la funcion o la vista 
				    $params = array_values($pattern->get_parameters($this->_uri));
				    call_user_func_array($namespace . $method,  $params );
					return true;				
				}
	
			}
			// comprobamos si existe en el router
			return false;
		}
	}
