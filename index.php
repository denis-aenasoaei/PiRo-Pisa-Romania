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
    Route::run($currController);
    //parse request
}
elseif(strpos($currController,"Results.php") !== false)
{
    $controller = new ResultsController();
    if(count($_GET) == 1)
    {
        Route::run($currController);
    }
    else
    {
        $controller->getFiltered();
    }


}
elseif(strpos($currController,"Contact.php") !== false)
{
    $controller = new ContactUsController();
    if($method === "POST")
    {
        $controller->insertComment();
    }
    Route::run($currController);
}
elseif(strpos($currController,"Login.php") !== false)
{
    $controller = new LoginController();
    if($method === "POST")
    {
        $controller->Login();
    }
    Route::run($currController);
}
elseif(strpos($currController,"Admin.php") !== false)
{
    $controller = new AdminController();
    if(!isset($_COOKIE["user"]) or !isset($_COOKIE["uuid"]))
    {
        header("location:Login.php");
    }
    else
    {
        if($method === "GET")
        {
            Route::run($currController);
        }
        else{
            $controller->treat();
            //request is made from XHR 
            //TREAT THE REQUEST
            //se trimite DELETE pentru a sterge ceva
            //se trimite PUT pentru a face update la ceva
            //se trimite POST pentru a adauga ceva
            //pentru a accesa valorile din request PUT si request DELETE poti folosi array-ul $_REQUEST la fel ca in $_GET
            

            //http_response_code(404);
            //http_response_code(200);
        }

    }
}
?>