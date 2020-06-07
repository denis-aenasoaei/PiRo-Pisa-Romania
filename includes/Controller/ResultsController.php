<?php

class ResultsController extends Controller
{
    private $model;

    function __construct()
    {
        $this->model = new ResultsModel();
    }

    public function getAllRomaniaResponses()
    {
        $data = $this->model->getAllRomaniaRecords();
        echo '<pre>';
        print_r($data);
        echo '<pre>';
    }
    public function getAllMathRomaniaScores()
    {
        $data = $this->model->getAllMathRomaniaScores();
        echo '<pre>';
        print_r($data);
        echo '<pre>';
    }
}

?>