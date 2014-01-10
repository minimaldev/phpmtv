<?php
namespace Framework\Http\Response;

{
	class Base
	{	
		protected $_headers;
	 	
	 	public function __construct($content='',$status=200,$type="text/html",$charset="utf-8")
	 	{
	 		header("Content-Type: {$type}; charset={$charset}");
	 		switch ($status)
	 		{
	 			case 404:
	 				header("HTTP/1.1 404 Not Found");
	 		 		break;
	 		 	default:
	 				header("HTTP/1.1 200 OK");
	 		}

	 		
	 	}

	 	public function add($item)
	 	{
			
			array_push($this->_headers,$item);
			return $this;
			
		}

		public function remove($header)

		{

			foreach ($this->_headers as $i => $stored)

			{

				if ($stored == $header)

				{

					unset($this->_headers[$i]);

				}

			}

			return $this;

		}	
		public function getHeaders()
		{
			foreach ($this->_headers as $i => $stored)
			{
				header($stored);
			}
			
		}
	}
}
