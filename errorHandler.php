<?php
namespace system;
class errorHandler extends \Exception{
    /**
     * Registers the error and exception handlers
     */
    public static function register_error_handler(){
        set_error_handler('\system\errorHandler::error_handler',E_ALL);
        set_exception_handler(array('\system\errorHandler', 'exception_handler'));
    }
    /**
     * Handlers errors
     * @param int $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     * @param string $errcontext
     */
    public static function error_handler($errno,$errstr,$errfile,$errline,$errcontext){
        $details=['errno'=>$errno,'errstr'=>$errstr,'errfile'=>$errfile,'errline'=>$errline,'errcontext'=>$errcontext];
        \system\views::loadView('error', $details, false, true);
        
    }
    /**
     * Handles exceptions
     * @param \Exception $exception
     */
    public static function exception_handler(\Exception $exception){
        $details=['errstr'=>$exception->message,'errfile'=>$exception->file,'errline'=>$exception->line,'errno'=>isset($exception->code)?$exception->code:'-'];
        \system\views::loadView('error',$details,false,true);
        die();
    }
}