<!DOCTYPE html>
<html lang="en-US">
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="Scripts/canvas2svg.js"></script>
    <script src="Scripts/resultsScript.js"></script>
    <link rel="stylesheet" type="text/css" href="StyleSheets/style.css">
    <link rel="stylesheet" type="text/css" href="StyleSheets/StyleResults.css">
    <link rel="icon" href="Images/Home/oecd_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <form id="inputForm">
            <input type="text" id="c1" name="c1">
            <input type="text" id="c2" name="c2">
            
        </form>
        <p id="temp"></p>
        <button id="testButton"> Get Chart </button>
        <button id="exportPNG" style="display:none;" onclick="download('PNG')"> Export PNG</button>
        <button id="exportSVG" style="display:none;" onclick="download('SVG')"> Export SVG</button>
        <button id="exportCSV" style="display:none;" onclick="download('CSV')"> Export CSV</button>
        <div id="chartContainer" height="400px" width = "400px">
            <canvas id="myChart"></canvas>
        </div>
        </main>
    </body>
    
</html>