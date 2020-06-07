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

    public function getFiltered()
    {
        $filters = [];
        $filNames = ["gender", "wealth_range", "age", "school_grade", "mean_type", "url"];
        if(isset($_GET['gender']))
            $filters['gender'] = (int)$_GET['gender'];
        if(isset($_GET['wealth_range']))
        {
            $filters['wealth_range'] = strtoupper($_GET['wealth_range']);
        }

        if(isset($_GET['age']))
        {
            $filters['age'] = (int)$_GET['age'];
        }

        if(isset($_GET['school_grade']))
        {
            $filters['school_grade'] = (int)$_GET['school_grades'];
        }
        $countries = [];
        
        foreach($_GET as $k => $v)
        {
            if(!in_array($k, $filNames))
            {
                array_push($countries, $_GET[$k]);
            }
        }
        if(empty($filters))
        {
            $data = $this->model->getArrayBasedOnFilters("All", NULL, $countries);
            
        }
            else
            {
                $data = $this->model->getArrayBasedOnFilters("All", $filters, $countries);
            }
            $jsonData = json_encode($data, JSON_FORCE_OBJECT);
            echo $jsonData;
        }
    }


?>