<?php
class AdminController extends Controller{
    private $model;

    function __construct()
    {
        $this->model = new AdminModel();
    }


}

?>