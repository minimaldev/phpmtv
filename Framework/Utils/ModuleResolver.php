<?php
	namespace Framework\Utils;
	class ModuleResolver
	{
		static public function Resolve($callback)
		{	
			//resolvedor de modulos forma \foo\foo\functionname
			$module_array 	= explode('\\',$callback);			
			$module 		= implode('\\',
				array_slice(
					$module_array,
					0,
					end(array_keys($module_array))
				)
			);
			return  str_replace('\\', DIRECTORY_SEPARATOR, $module).'.php';
		}

		static public function Resolve_dots($callback)
		{	
			//resolvedor de modulos forma foo.foo.functionname
			$module_array 		= explode('.', $callback);
			print 
			$method_function 	= $module_array[end(array_keys($module_array))];
			
			$filename 			= implode('.',
				array_slice(
					$module_array,
					0,
					end(array_keys($module_array))
				)
			);
			
			return array(
				'file' => str_replace('.', DIRECTORY_SEPARATOR, $filename).'.php',
				'namespace' => str_replace('.', '\\', $filename),
				'method' => $method_function
			);
		}
		
	}

