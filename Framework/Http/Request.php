<?php

namespace Framework\Http;

	class Request
	{
		public function xssafe($data, $encoding = 'UTF-8')
		{
			return htmlspecialchars($data, ENT_QUOTES, $encoding);
		}

		public function sanitize($string = '', $is_filename = FALSE)
		{
			// Replace all weird characters with dashes
	 		$string = preg_replace('/[^\w\-'.($is_filename ? '~_\.' : '').']+/u', '-', $string);

	 		// Only allow one dash separator at a time (and make string lowercase)
	 		return mb_strtolower(preg_replace('/--+/u', '-', $string), 'UTF-8');
	 	}

	 	public function get($item, $default = '')
	 	{

			if ( isset($_REQUEST[$item]) )

			{
				$uri =  substr($_REQUEST[$item], 1);
				
				return $this->xssafe($uri);			
			}

			else
				return $this->xssafe($default);
		}
	}

