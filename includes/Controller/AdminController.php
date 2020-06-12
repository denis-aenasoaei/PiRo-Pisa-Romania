<?php
class AdminController extends Controller{
    private $model;

    function __construct()
    {
        $this->model = new AdminModel();
    }

    public function treat()
    {
        if($_REQUEST["type"] === "delete")
        {
            if($_REQUEST["table"] === "country_scores"){
                if($_REQUEST["country"]==='')
                    return false;
                return $this->model->deleteCountry($_REQUEST["country"]);
            }
            elseif($_REQUEST["table"] === "Administrators"){
                if($_REQUEST["user"]==='')
                    return false;
                return $this->model->deleteUser($_REQUEST["user"]);
            }
            elseif($_REQUEST["table"] === "romania_data"){
                if($_REQUEST["stud_id"]==='')
                    return false;
                return $this->model->deleteStudent($_REQUEST["stud_id"]);
            }
        }
        elseif($_REQUEST["type"]==="select"){
            return $this->model->selectTable($_REQUEST["table"],$_POST);
        }
        elseif($_REQUEST["type"] === "add")
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
                
                if($studId==='' || $readGrade==='' || $mathGrade==='' || $scienceGrade==='' || $gender==='' || $scienceGrade==='' || $age==='' || $wealth==='')
                    return false;
                return $this->model->insertStudent($studId,$readGrade,$mathGrade,$scienceGrade,$gender,$schoolGrade,$age,$wealth);

            }

        }
        elseif($_REQUEST["type"] === "update")
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
            elseif($_REQUEST["table"] === "Administrators"){
                $user=$_REQUEST["user"];
                $pass=$_REQUEST["pass"];
                if($user==='')
                    return false;
                if($pass==='')
                    return false;
                return $this->model->updateUser($user,$pass);
            }
            elseif($_REQUEST["table"]==="country_scores"){
                $read=$_REQUEST["read"];
                $math=$_REQUEST["math"];
                $science=$_REQUEST["science"];
                $country=$_REQUEST["country"];
                if($country==='')
                    return false;
                return $this->model->updateCountry($country,$read,$math,$science);
            }
        }
    }
}

?>