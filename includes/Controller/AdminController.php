<?php
class AdminController extends Controller{
    private $model;

    function __construct()
    {
        $this->model = new AdminModel();
    }

    public function treat()
    {
        if($_SERVER["REQUEST_METHOD"] === "DELETE")
        {
            if($_REQUEST["table"] === "country_scores")
                $this->model->deleteCountry($_REQUEST["country"]);
            elseif($_REQUEST["table"] === "Administrators")
                $this->model->deleteCountry($_REQUEST["user"]);
            elseif($_REQUEST["table"] === "romania_data")
                $this->model->deleteCountry($_REQUEST["stud_id"]);
        }
        elseif($_SERVER["REQUEST_METHOD"] === "POST")
        {
            if($_REQUEST["table"] === "country_scores")
            {   $country=$_POST["country"];
                $read_mean =$_POST["read"];
                $math_mean =$_POST["math"];
                $science_mean =$_POST["science"];
                $error=array();
                if (empty($country)) {
                    $error[]="Enter country";
                } else {
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$country)) {
                    $error[]= "Only letters and white space allowed";
                    }
                }
                
                if (empty($read_mean)) {
                    $error[]="Read mean expected";
                } else {
                
                    // check if is number
                    if (!is_numeric($read_mean)) {
                    $error[]= "Only numbers";
                    }
                }  
                if (empty($math_mean)) {
                    $error[]="Math mean expected";
                } else {
                
                    // check if is number
                    if (!is_numeric($math_mean)) {
                    $error[]= "Only numbers";
                    }
                }  
                if (empty($science_mean)) {
                    $error[]="Science mean expected";
                } else {
                
                    // check if is number
                    if (!is_numeric($science_mean)) {
                    $error[]= "Only numbers";
                    }
                } 
                if ( count( $error ) == 0 ) {
                    $this->model->insertCountry($country,$read_mean,$math_mean,$science_mean);
                } 

            }
            elseif($_REQUEST["table"] === "Administrators")
            {
                $usern=$_POST["user"];
                $password=$_POST["pass"];
                $err=array();
                if (empty($usern)) {
                    $err[]="Username expected";
                }
                if (empty($password)) {
                    $err[]="Password expected";
                }
                if ( count( $err ) == 0 ) {
                    $this->model->insertUser($usern,$password);   
                    } 
            }
            elseif($_REQUEST["table"] === "romania_data")
            {
                $studId=$_POST["stud_id"];
                $readGrade=$_POST["read"];
                $mathGrade =$_POST["math"];
                $scienceGrade =$_POST["science"];
                $gender=$_POST["gender"];
                $schoolGrade=$_POST["school_grade"];
                $age=$_POST["age"];
                $wealth=$_POST["wealth_range"];
                $error1=array();
                if (empty($readGrade)) {
                    $error1[]="Read mean expected";
                } else {
            
                // check if is number
                if (!is_numeric($readGrade)) {
                $error1[]= "Only numbers";
                }
                }     
                if (empty($mathGrade)) {
                $error1[]="Math mean expected";
                } else {
            
                // check if is number
                if (!is_numeric($mathGrade)) {
                $error1[]= "Only numbers";
                }
                }  
                if (empty($scienceGrade)) {
                $error1[]="Science mean expected";
                } else {
            
                // check if is number
                if (!is_numeric($scienceGrade)) {
                $error1[]= "Only numbers";
                }
                } 
                if ( count( $error1 ) == 0 ) {
               $this->model->insert($studId,$readGrade,$mathGrade,$scienceGrade,$gender,$schoolGrade,$age,$wealth);
                } 

            }

        }

    }


}

?>