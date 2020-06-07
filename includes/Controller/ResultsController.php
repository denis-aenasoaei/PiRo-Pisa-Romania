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
        $countries = [];
        $filters = [];
        $filNames = ["gender", "wealth_range", "age", "school_grade", "mean_type", "url"];
        if(isset($_GET['gender']))
            $filters['gender'] = (int)$_GET['gender'];
        if(isset($_GET['wealth_range']))
        {
            $filters['wealth_range'] = strtoupper($_GET['wealth_range']);
        }
        if (isset($_GET['mean_type']))
        {  
             $filters['mean_type']=(int)$_GET['mean_type'];
        }
            /*$means = $_GET['mean_type'];
            switch ($means) {
                case 'math':
                    $data = $this->model->getArrayBasedOnFilters("math", $filters, $countries);
                    break;
                case 'science':
                    $data = $this->model->getArrayBasedOnFilters("science", $filters, $countries);
                    break;
                case 'read':
                    $data = $this->model->getArrayBasedOnFilters("read", $filters, $countries);
                    break;
            }*/
        

        if(isset($_GET['age']))
        {
            $filters['age'] = (int)$_GET['age'];
        }

        if(isset($_GET['school_grade']))
        {
            $filters['school_grade'] = (int)$_GET['school_grades'];
        }
        
        foreach($_GET as $k => $v)
        {
            if(!in_array($k, $filNames))
            {
                array_push($countries, $_GET[$k]);
            }
        }
        if(!empty($filters))
        {
            if (isset($_GET['mean_type']))
            {
                $type = $_GET['mean_type'];
                switch ($type) {
                    case 'math':
                        $data = $this->model->getArrayBasedOnFilters("math", $filters, $countries);
                        break;
                    case 'science':
                        $data = $this->model->getArrayBasedOnFilters("science", $filters, $countries);
                        break;
                    case 'read':
                        $data = $this->model->getArrayBasedOnFilters("read", $filters, $countries);
                        break;
                    default:
                        $data = $this->model->getArrayBasedOnFilters("All", $filters, $countries);
                        break;
                }
            }
            else
            {
                $data = $this->model->getArrayBasedOnFilters("All", NULL, $countries);
            }
        }
    }
}   
?>