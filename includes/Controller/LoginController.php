<?php
class LoginController extends Controller{
    private $model;

    function __construct()
    {
        $this->model = new LoginModel();
        if(isset($_COOKIE['user']) && isset($_COOKIE['uuid'])) {
            $connected=$this->model->checkUUID($_COOKIE["uuid"],$_COOKIE["user"]);
            if($connected) {
                $_SESSION['uuid'] = $_COOKIE['uuid'];
                $_SESSION['user'] = $_COOKIE['user'];
                header('Location: Admin.php');
            }
        }
    }

    public function Login(){

    $user = $_POST["username"];
    $password = $_POST["password"];
    $errors="";
    if (empty($user)) {
        $errors.="Username is required! ";
    }
    else {
        if (!ctype_alnum($user)) {
            $errors.= "Only letters and numbers are allowed. ";
        }
    }
    if (empty($password)) {
        $errors.="Password is required! ";
    }

    if(!empty($errors)) {
        echo "<script type='text/javascript'>alert('$errors');</script>";
        header("Refresh:0");
    }
    else {
        $validUser=$this->model->checkCredentials($user,$password);
        if($validUser){
            $session=$this->model->createSession($user);
            if(!$session){
                echo "<script type='text/javascript'>alert('Couldn't create session! Try again later.');</script>";
                header("Refresh:0");
            }
            else{
                setcookie("user", $user, time() + (86400 * 30), "/");
                setcookie("uuid", $session, time() + (86400 * 30), "/");
                $_SESSION["user"] = $user;
                $_SESSION["uuid"] = $session;
                header('Location: Admin.php');
            }
        }
        else{
            echo "<script type='text/javascript'>alert('Invalid credentials! Try again.');</script>";
            header("Refresh:0");
        }
    }


}
}

?>