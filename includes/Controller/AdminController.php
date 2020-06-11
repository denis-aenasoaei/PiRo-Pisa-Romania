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
                return $this->model->deleteCountry($_REQUEST["country"]);
            elseif($_REQUEST["table"] === "Administrators")
                return $this->model->deleteUser($_REQUEST["user"]);
            elseif($_REQUEST["table"] === "romania_data")
                return $this->model->deleteStudent($_REQUEST["stud_id"]);
        }
        elseif($_SERVER["REQUEST_METHOD"] === "POST")
        {
            if($_REQUEST["table"] === "country_scores")
            {   
                $country= $_POST["country"];
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
                // check if is number
                if (!is_numeric($read_mean)) {
                    $error[]= "Only numbers";
                }
              
                // check if is number
                if (!is_numeric($math_mean)) {
                    $error[]= "Only numbers";
                }
                  
                    // check if is number
                if (!is_numeric($science_mean)) {
                    $error[]= "Only numbers";
                }
                 
                if ( count( $error ) == 0 ) {
                    return $this->model->insertCountry($country,$read_mean,$math_mean,$science_mean);
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
                    return $this->model->insertUser($usern,$password);   
                } 
            }
            elseif($_REQUEST["table"] === "romania_data")
            {
                $studId= $_POST["stud_id"];
                $readGrade=$_POST["read"];
                $mathGrade =$_POST["math"];
                $scienceGrade =$_POST["science"];
                $gender=$_POST["gender"];
                $schoolGrade=$_POST["school_grade"];
                $age=$_POST["age"];
                $wealth=$_POST["wealth_range"];
                $error1=array();
                
                // check if is number
                if (!is_numeric($readGrade)) {
                    $error1[]= "Only numbers";
                }
             
                // check if is number
                if (!is_numeric($mathGrade)) {
                    $error1[]= "Only numbers";
                }
                  
            
                // check if is number
                if (!is_numeric($scienceGrade)) {
                    $error1[]= "Only numbers";
                }
                
                if ( count( $error1 ) == 0 ) {
                    return $this->model->insert($studId,$readGrade,$mathGrade,$scienceGrade,$gender,$schoolGrade,$age,$wealth);
                } 

            }

        }
        elseif($_SERVER["REQUEST_METHOD"] === "PUT")
        {
            if($_REQUEST["table"] === "romania_data")
            {
                $values = [];
                if(isset($_REQUEST['stud_id']) && is_numeric($_REQUEST['stud_id'])) 
                    $studId= (int) $_REQUEST['stud_id'];
                else{
                    $error1[]= "Invalid student ID";
                }

                if(isset($_REQUEST["read"]))
                {
                    if (!is_int($_REQUEST['read'])) {
                        $error1[]= "Only numbers";
                    }
                    else{
                        $values['read_grade']=(int)$_REQUEST["read"];
                    }
                }
                if(isset($_REQUEST["math"]))
                {
                    
                    if (!is_numeric($_REQUEST['math'])) {
                        $error1[]= "Only numbers";
                    }
                    else{
                        $values['math_grade'] =(int)$_REQUEST["math"];
                    }
                }
                if(isset($_REQUEST["science"]))
                {
                    if (!is_numeric($_REQUEST['science'])) {
                        $error1[]= "Only numbers";
                    }
                    else{
                        $values['scie_grade'] =(int)$_REQUEST["science"];
                    }
                }
    
                $values['gender']=$_REQUEST["gender"];            
                $values['school_grade']=$_REQUEST["school_grade"];
                $values['age']=$_REQUEST["age"];
                $values['wealth_range']=$_REQUEST["wealth_range"];
                $error1=array();
                
                if ( count( $error1 ) == 0 ) {
                    return $this->model->updateStud($studId, $values);
                } 

            }
        }

    }
}

?>