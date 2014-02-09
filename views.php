<?php
namespace system;
/**
 * Takes care of the views
 */
class views{
    /**
     * 
     * @param string $viewName
     * @param array $data
     * @param boolean $returnView
     * @param boolean $systemView
     * @return string
     * Loads a view
     */
    public static function loadView($viewName,$data=[],$returnView=false,$systemView=false){
        ob_start();
        if($systemView==false){
        include PROJECT_DIR.'views/'.$viewName.'.php';
        }
    else{
        include SYSTEM_DIR.'views/'.$viewName.'.php';
    }
        $content=ob_get_contents();
        ob_end_clean();
        if($returnView){
            return $content;
        }
        echo $content;
    }
}