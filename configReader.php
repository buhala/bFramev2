<?php

namespace system;
/**
*Handles reading of user-based configurations.
*/
class configReader {
    /**
     *
     * @var array 
     * Stores all already loaded arrays
     */
    private static $configs;
    /**
     * Reads a configuration file.
     * @param type $configName
     * @return array
     * @throws \Exception
     */
    public static function returnConfig($configName) {
        if(!isset(self::$configs[$configName])){
        $config = PROJECT_DIR . 'config/' . $configName . '.php';
        if (file_exists($config)) {
            include PROJECT_DIR . 'config/' . $configName . '.php';
            self::$configs[$configName]=$$configName;
            return $$configName;
        } else {
            throw new \Exception('File does not exist!');
        }
    }
    else{
        return self::$configs[$configName];
    }
    }

}
