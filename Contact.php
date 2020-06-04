﻿<?php require '../Controller/formular.php'?>
<!DOCTYPE html>
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
                    <a href="index.html"><li>
                        Home
                    </li></a>
                    <a href="#"><li>
                        Results
                    </li></a>
                    <a href="#"><li>
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
                    <form action="../formular.php" method="post">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Your name..">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                        <label for="city">City</label>
                        <select id="city" name="city">
                            <option value="alba">Alba Iulia</option>
                            <option value="arad">Arad</option>
                            <option value="bacau">Bacau</option>
                            <option value="bistrita">Bistrita</option>
                            <option value="botosani">Botosani</option>
                            <option value="braila">Braila</option>
                            <option value="brasov">Brasov</option>
                            <option value="bucuresti">Bucuresti</option>
                            <option value="buzau">Buzau</option>
                            <option value="calarasi">Calarasi</option>
                            <option value="cluj">Cluj-Napoca</option>
                            <option value="constanta">Constanta</option>
                            <option value="craiova">Craiova</option>
                            <option value="focsani">Focsani</option>
                            <option value="galati">Galati</option>
                            <option value="giurgiu">Giurgiu</option>
                            <option value="gorj">Gorj</option>
                            <option value="hunedoara">Hunedoara</option>
                            <option value="ialomita">Ialomita</option>
                            <option value="iasi">Iasi</option>
                            <option value="harghita">Miercurea Ciuc</option>
                            <option value="oradea">Oradea</option>
                            <option value="neamt">Piatra Neamt</option>
                            <option value="pitesti">Pitesti</option>
                            <option value="ploiesti">Ploiesti</option>
                            <option value="resita">Resita</option>
                            <option value="satumare">Satu Mare</option>
                            <option value="sibiu">Sibiu</option>
                            <option value="slatina">Slatina</option>
                            <option value="slobozia">Slobozia</option>
                            <option value="suceava">Suceava</option>
                            <option value="mures">Targu-Mures</option>
                            <option value="timisoara">Timisoara</option>
                            <option value="tulcea">Tulcea</option>
                            <option value="vaslui">Vaslui</option>
                            <option value="zalau">Zalau</option>

                        </select>
                        <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Write something.." ></textarea>
                        <input type="submit" value="Submit">
                    </form>
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