<?php

	/*function autoload($class)
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
	}*/

function autoload($className)
	{
		
		if (class_exists($className)) 
		{
        	return true;
    	}   
 			/*if (false !== ($lastNsPos = strripos($className, '\\'))) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);

                $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }*/
       		
       		$fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className) .".php";
	
		
			$combined = BASE_PATH.DS.$fileName;
			echo $fileName."<br>";
			
			if (file_exists($combined))
		
			{
		
				include_once ($combined);
		
				return true;
		
			}
		
		return false;
		//throw new Exception("{$class} not found");
	}

	class Autoloader
	{
		
		public static function autoload($class)
		{
			autoload($class);
		}

	}

	spl_autoload_register('autoload');
	spl_autoload_extensions('.php');
	//spl_autoload_register(array('autoloader', 'autoload'));
