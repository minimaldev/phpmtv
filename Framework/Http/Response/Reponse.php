<?php
namespace Framework\Http\Response;
defined('BASE_PATH') or die("error....");
use Framework\Http\Response\Base;

	class Response extends Base
	{	
		
	 	
	 	public function __construct($content='',$status=200,$type="text/html",$charset="utf-8")
	 	{
	 		parent::__construct($content,$status,$type,$charset);

	 		print htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
	 	}

	}

