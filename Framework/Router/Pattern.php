<?php
namespace Framework\Router;
use Framework\Utils\ModuleResolver;

//"format"
//preg_match('/(?P<name>\w+)\/(?P<digit>\d+)/', $str, $matches);
// url(r'^rss/', 'apps.rss_sitemap.views.rss_list', name='rss_home'),
	class Pattern
	{

		private $_pattern = null;
		private $_controller = null;
		private $_router_name = null;
		protected $_request;

		public function __construct($pattern, $controller, $name)
		{		
			$this->_pattern 		= "#{$pattern}#";
			$this->_controller 		=  $controller;
			$this->_router_name 	=  $name;
		}

		public function get_pattern()
		{
			return $this->_pattern;
		}
		public function is_this($url)
		{
			preg_match($this->_pattern, $url, $matches);
			return $matches == true;
		}

		public function get_name()
		{
			return $this->_router_name;
		}

		public function get_controller()
		{
			return ModuleResolver::Resolve_dots($this->_controller);
		}

		public function get_parameters($url)
		{

			preg_match($this->_pattern, $url, $matches);
			//remove numbers and string get only parameter
			return array_intersect_key(
				$matches, 
				array_flip(
					array_filter(
						array_keys($matches), 
						'is_string'
						)
					)
				);
		}
		
	}

