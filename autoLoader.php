<?php
/**
*Handles automation of class loading
*/
class autoLoader{
    /**
     * Stores all first level namespaces
     * @var array
     */
    private static $baseNamespaces=[];
    /**
     * Registers the autoloading function
     */
    public static function register(){
        spl_autoload_register(__NAMESPACE__.'\autoLoader::loadClass');
    }
    /**
     * Includes the class based on a guess. Either that or it throws a non-existent exception.
     * @param string $class
     * @throws \Exception
     * 
     */
    public static function loadClass($class){
        $info=explode('\\',$class);
        //print_r($info);
        $path='';
        foreach(self::$baseNamespaces as $namespace=>$dir){
            if($namespace==$info[0]){
                $path=$dir;
                break;
            }
        }
        if($path==''){
            throw new \Exception('Invalid NameSpace for loading:'.$info[0]);
        }
        unset($info[0]);
        foreach($info as $p){
            $path.=DIRECTORY_SEPARATOR.$p;
        }
        $path.='.php';
        if(file_exists($path)){
        include $path;
        }
        else{
            throw new \Exception('Invalid filename to autoload. Expected'.$path);
        }
        
    }
    /**
     * Adds a base namespace
     * @param string $name
     * @param string $dir
     */
    public static function insertNamespace($name,$dir){
        self::$baseNamespaces[$name]=$dir;
    }
}