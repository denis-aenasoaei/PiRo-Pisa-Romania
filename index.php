<?php

DEFINE('BASE_DIR', __DIR__);

require_once(BASE_DIR . DIRECTORY_SEPARATOR . 'Routes.php');


function __autoload($class){
    if (file_exists(BASE_DIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'Classes' . DIRECTORY_SEPARATOR . $class . '.php'))
    {
        require_once BASE_DIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'Classes' . DIRECTORY_SEPARATOR . $class . '.php';
    }
    else if (file_exists(BASE_DIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . $class . '.php'))
    {
    require_once BASE_DIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . $class . '.php';
    }
    else if (file_exists(BASE_DIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . $class . '.php'))
    {
    require_once BASE_DIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . $class . '.php';
    }
}

$currController = Route::getUsedRoute($_GET['url']);
$method = $_SERVER['REQUEST_METHOD'];
if(strpos($currController,"index.php") !== false )
{
    $controller = new IndexController();
    Route::run($_GET['url']);
    //parse request
}
elseif(strpos($currController,"Results.php") !== false)
{
    $controller = new ResultsController();
    if(count($_GET) == 1)
    {
        if(isset($_GET['url']))
            Route::run($_GET['url']);
    }
    else
    {
        $controller->getFiltered();
        
    }


}
elseif(strpos($currController,"Contact.php") !== false)
{
    
    $controller = new ContactUsController();
   /* if($method === "POST")
    {
        //insert comentariu in BD
    }
    else
    {*/
        Route::run($_GET['url']);
  //  }

}


?>