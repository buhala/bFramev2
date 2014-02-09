<?php
namespace system;
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
