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
                        <a href="https://www.facebook.com/OECDEduSkills" title="Facebook">
                            <i class="fa fa-facebook">
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/user/EDUContact" title="Youtube">
                            <i class="fa fa-youtube">
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="https://oecdedutoday.com/" title="Blogs">
                            <i class="fa fa-envelope">
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/hashtag/oecdpisa" title="Twitter">
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
                        <a href="Index.php"><li>
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
                    <form action="http://127.0.0.1/PIRO-PISA-ROMANIA/Contact.php" method="POST">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="firstname"  placeholder="Your name..">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                        <label for="e-mail">E-mail</label>
                        <input type="text" id="e-mail" name="e-mail" placeholder="Your e-mail..">
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