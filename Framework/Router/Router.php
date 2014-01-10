<?php
namespace Framework\Router;
defined('BASE_PATH') or die("error....");
	class Router
	{

		protected $count_not_found=0;

		protected $_routes = array();

		public function add($item)

		{

			array_push($this->_routers,$item); 

			return $this;

		}

		public function remove($route)

		{

			foreach ($this->_routes as $i => $stored)

			{

				if ($stored == $route)

				{

					unset($this->_routes[$i]);

				}

			}

			return $this;

		}	

		public function getRoutes()
		{
			$list = array();
			foreach ($this->_routes as $route)
			{
				$list[$route->pattern] = get_class($route);
			}
			return $list;
		}

	}

