<?php

class Controller {
    public static function createView($viewName)
    {
        require_once(BASE_DIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $viewName);
    }
}