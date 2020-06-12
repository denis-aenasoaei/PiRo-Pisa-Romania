<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="StyleSheets/style.css">
    <link rel="stylesheet" type="text/css" href="StyleSheets/StyleLogin.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="Images/Home/oecd_logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <header>
        <div class="header-area">
            <div class="header-logo">
                <picture>
                    <img src="http://127.0.0.1/PIRO-PISA-ROMANIA/Images/Home/OECD.png" title="OECD">
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
                <img src="http://127.0.0.1/PIRO-PISA-ROMANIA/Images/Home/banner_top.png" title="PISA">
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
        <h1>Connect to admin panel</h1>
        <form action="http://127.0.0.1/PIRO-PISA-ROMANIA/Login.php" method="POST">
            <p>
                <br />
                Username:
                <input type="text" name="username">
            </p>
            <p>
                <br />
                Password:
                <input type="password" name="password">
            </p>

            <input type="submit" class="loginButton" value="Login">
        </form>
    </main>
</body>
</html>
