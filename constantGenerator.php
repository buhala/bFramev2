<?php
namespace system;
/**
*Generates some constants necessary for system code
*/
class constantGenerator {
    /**
     * 
     * @return type
     * Generates the site's path
     */
    public static function generateRealPath(){
        return str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', realpath(''))).'/';
    }
}
