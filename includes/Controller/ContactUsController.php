<?php


class ContactUsController extends Controller{
    private $model;

    function __construct()
    {
        $this->model = new ContactsModel();
    }
    public function getContact(){

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $selectOption = $_POST["city"];
    $subject = $_POST["subject"]; 
    $errors = array();
    if (empty($fname)) {
        $errors[]="Firtsname is required";
      } else {
          // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
          $errors[]= "Only letters and white space allowed";
        }
    }
    
      if (empty($lname)) {
        $errors[]="Lastname is required";
      } else {
      
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
          $errors[]= "Only letters and white space allowed";
        }
      }    

        if (empty($subject)) {
            $subject = "";
            } else {
            $subject = $_POST["subject"];
            }
  
  if ( count( $errors ) == 0 ) {
  /*echo "Firstname :$fname<br>";
  echo "Lastname :$lname<br>";
  echo "City :$selectOption<br> ";
  echo "Message: $subject <br>";*/
  $dataB=$this->model->insertContactInDb($fname,$lname,$selectOption,$subject);
    }
        else
        {
    header("Location: includes/Views/Contact.php");
    exit();
        }

}
    
}
}

?>