<?php
//If your project is located into a different dir, make sure to change it here.
define('PROJECT_DIR','../app/'); //This is non-existent. 
define('SYSTEM_DIR','./');
include SYSTEM_DIR.'autoLoader.php';
autoLoader::register();
autoLoader::insertNamespace('system', SYSTEM_DIR);
autoLoader::insertNamespace('app',PROJECT_DIR);
\system\core::initFramework();