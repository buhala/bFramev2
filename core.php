<?php

namespace system;
/**
*Handles the lowest level of loading
*/
class core {
    /**
     * 
     * @throws \Exception
     * Initializes all necessary things.
     */
    public static function initFramework() {
        define('SITE_PATH', \system\constantGenerator::generateRealPath());
        \system\errorHandler::register_error_handler();
        if (!isset($_SERVER['PATH_INFO'])) {
            $_parsedScriptName = pathinfo($_SERVER['SCRIPT_NAME']);
            $_parsed = parse_url(str_replace($_parsedScriptName['basename'], '', str_replace($_parsedScriptName['dirname'] . '/', '', $_SERVER['REQUEST_URI'])));
            $_SERVER['PATH_INFO'] = $_parsed['path'];
        }
        
        $path=\system\router::generateClassName($_SERVER['PATH_INFO']);
        $instance=new $path['path'];
		$callable_array=[$instance,$path['method']];
		if(is_callable($callable_array)){
			call_user_func($callable_array);
		}
		else{
			throw new \Exception('Invalid method. Data dump:'.print_r($callable_array,true));
		}
    }

}
