<?php

	function autoload($className)
	{
		
       		if (class_exists($className))
       			return true;

       		$fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className) .".php";
	
		
			$combined = BASE_PATH.DS.$fileName;
			
			
			if (file_exists($combined))
		
			{
		
				include_once ($combined);
		
				return true;
		
			}
	
		throw new Exception("{$class} not found");
	}


	spl_autoload_register('autoload');

