<?php
defined('BASE_PATH') or die("error....");
/*
	function autoload($class)
	{
		
		$paths = explode(PATH_SEPARATOR, get_include_path());
		
		
		$flags = PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE;
		
		//$file = strtolower(str_replace("\\", DIRECTORY_SEPARATOR, trim($class, "\\"))).".php";
		$file = (str_replace("\\", DIRECTORY_SEPARATOR, trim($class, "\\"))).".php";
		
		foreach ($paths as $path)
		
		{
			
			$combined = ($path.DIRECTORY_SEPARATOR).$file;
			echo $combined;
			
			if (file_exists($combined))
		
			{
		
				include($combined);
		
				return;
		
			}
		
		}
		
		//throw new Exception("{$class} not found");
	}
*/
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

