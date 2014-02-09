<?php
namespace system;
class router{
    /**
     * 
     * @param type $params
     * @return type
     * Generates a class name based on the URL
     */
    public static function generateClassName($params){
        $params=self::getCustomRoute($params);
        $info=explode('/',$params);
        $return=['path'=>'app\controllers\\'.$info[1]];
        $return['method']=isset($info[2])?$info[2]:'index';
        unset($info[1],$info[0],$info[2]);
        $return['args']=$info;
        return $return;
    }
    /**
     * 
     * @param type $params
     * @return type
     * Gets a non-standart route
     */
    private static function getCustomRoute($params){
        $routes=\system\configReader::returnConfig('routes');
		if(strlen($params)<2){
			return $routes['default'];
		}
        foreach($routes['basic'] as $k=>$r){
            if($k==$params){
                return $r;
            }
        }
        $rs=$routes['advanced']();
        if($rs!==null){
            return $rs;
        }
        return $params;
    }
}