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

?>