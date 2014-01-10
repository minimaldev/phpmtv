<?php
namespace Framework\Utils;

	class ModuleResolver
	{
		static public function Resolve($callback)
		{	
			//resolvedor de modulos forma \foo\foo\functionname
			$module_array = explode('\\',$callback);
			$module = implode('\\',array_slice($module_array,0,end(array_keys($module_array)))) ;
			return  str_replace('\\', DIRECTORY_SEPARATOR, $module).'.php';
		}
		
	}

