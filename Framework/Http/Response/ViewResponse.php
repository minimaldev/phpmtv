<?php
namespace Framework\Http\Response;
use Framework\Http\Response\Base;
{
	class ViewResponse extends Base
	{	


	 	public function __construct($view,$content='',$status=200,$type="text/html",$charset="utf-8")
	 	{
	 		parent::__construct($content,$status,$type,$charset);
	 		
	 		if (file_exists($view))
	 		{
	 			extract($content);

	 			ob_start();
           		include $view;
           	
           		return ob_end_flush();
	 		}
	 		 else 
        	{
            	throw new Exception("no template file {$view} present in directory " );
        	}
	 	}

	}
}
