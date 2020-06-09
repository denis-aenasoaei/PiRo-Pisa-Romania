<?php

//am lasat aici pentru a nu pastra acel formular.php (nu ar mai functiona oricum dupa ce am facut toate modificarile astea)
//Poti sterge oricand crezi ca nu mai ai nevoie de codul asta :) 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
//if (isset($_POST["submit"]))
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
  echo "Firstname :$fname<br>";
  echo "Lastname :$lname<br>";
  echo "City :$selectOption<br> ";
  echo "Message: $subject <br>";
    }
else
{
    header("Location: includes/Views/Contact.php");
    exit();
}

}
?>
<html lang="en-US">
<head>
    <link rel="stylesheet" type="text/css" href="StyleSheets/style.css">
    <link rel="stylesheet" type="text/css" href="StyleSheets/StyleContact.css">
    <link rel="icon" href="Images/Home/oecd_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>PiSa Statistics</title>
    
</head>
<body>

<header>
    <div class="header-area">
        <div class="header-logo">
            <picture>
                <img src="Images/Home/OECD.png" title="OECD">
            </picture>
        </div>
        <div class="header-social">
            <ul id="socials">
                <li>
                    <a href="#" title="Facebook">
                        <i class="fa fa-facebook">
                        </i>
                    </a>
                </li>
                <li>
                    <a href="#" title="Pinterest">
                        <i class="fa fa-pinterest">
                        </i>
                    </a>
                </li>
                <li>
                    <a href="#" title="LinkedIn">
                        <i class="fa fa-linkedin">
                        </i>
                    </a>
                </li>
                <li>
                    <a href="#" title="Twitter">
                        <i class="fa fa-twitter">
                        </i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="top_banner">
        <picture>
            <img src="Images/Home/banner_top.png" title="PISA">
        </picture>
    </div>
    <nav>
        <div class="nav-sticky">
            <div class="nav-menu">
                <ul id="navigation">
                    <a href="index.php"><li>
                        Home
                    </li></a>
                    <a href="Results.php"><li>
                        Results
                    </li></a>
                    <a href="Contact.php"><li>
                        Contact
                    </li></a>
                </ul>
            </div>
        </div>
    </nav>
</header>
    <main>
        <div class="container">
            <div class="head" >
                <h2>Contact Us</h2>
                <p>If you want more details about PISA tests or if you have more questions leave us a message</p>
            </div>
            <div class="row">
                <div class="col1">
                    <form action="Contact.php" method="POST">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="firstname"  placeholder="Your name..">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                        <label for="city">City</label>
                        <select id="city" name="city">
                            <option value="Alba Iulia">Alba Iulia</option>
                            <option value="Arad">Arad</option>
                            <option value="Bacau">Bacau</option>
                            <option value="Bistrita">Bistrita</option>
                            <option value="Botosani">Botosani</option>
                            <option value="Braila">Braila</option>
                            <option value="Brasov">Brasov</option>
                            <option value="Bucuresti">Bucuresti</option>
                            <option value="Buzau">Buzau</option>
                            <option value="Calarasi">Calarasi</option>
                            <option value="Cluj">Cluj-Napoca</option>
                            <option value="Constanta">Constanta</option>
                            <option value="Craiova">Craiova</option>
                            <option value="Focsani">Focsani</option>
                            <option value="Galati">Galati</option>
                            <option value="Giurgiu">Giurgiu</option>
                            <option value="Gorj">Gorj</option>
                            <option value="Hunedoara">Hunedoara</option>
                            <option value="Ialomita">Ialomita</option>
                            <option value="Iasi">Iasi</option>
                            <option value="Miercurea Ciuc">Miercurea Ciuc</option>
                            <option value="Oradea">Oradea</option>
                            <option value="Piatra Neamt">Piatra Neamt</option>
                            <option value="Pitesti">Pitesti</option>
                            <option value="Ploiesti">Ploiesti</option>
                            <option value="Resita">Resita</option>
                            <option value="Satu Mare">Satu Mare</option>
                            <option value="Sibiu">Sibiu</option>
                            <option value="Slatina">Slatina</option>
                            <option value="Slobozia">Slobozia</option>
                            <option value="Suceava">Suceava</option>
                            <option value="Targu-Mures">Targu-Mures</option>
                            <option value="Timisoara">Timisoara</option>
                            <option value="Tulcea">Tulcea</option>
                            <option value="Vaslui">Vaslui</option>
                            <option value="Zalau">Zalau</option>

                        </select>
                        <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Write something.." ></textarea>
                        <input type="submit" value="Submit">
                    </form>
                    
                    <!formaction="includes/Controller/ContactUsController.php" >
                </div>
                <div class="col2">
                    <img src="Images/Home/download.jpg">
                </div>
            </div>
        </div>
</main>
    <footer>
        <p>Sample footer text!</p>
    </footer>
</body>
</html>