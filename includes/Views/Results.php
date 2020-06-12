    <!DOCTYPE html>
    <html lang="en-US">
    <head>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.bundle.min.js"></script>
        <script type="text/javascript" src="Scripts/canvas2svg.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="Scripts/canvas2svg.js"></script>
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
            <section class="layout-container">
                <div class="filter-container">
                    <article class="countries-container">
                        <p id="country-label" class="label"> Countries </p>
                        <button type="button" class="filter-button" id="btn-add-country"> Add a country </button>
                        <button type="button" class="filter-button" id="btn-remove-country"> Remove a country </button> 
                        <form id="country-choice">
                        </form>   
                    </article>
                    <div id="filter-wrapper">
                        <article class="age-container">
                            <p id="age-label" class="label"> Age </p>
                            <form id="age-choice">
                                <label for="age_15"> 15 </label>
                                <input type="checkbox" id="age_15" name="age_15">
                                <label for="age_16"> 16 </label>
                                <input type="checkbox" id="age_16" name="age_16">
                            </form>
                        </article>
                        <article class="wealth-container">
                            <p id="wealth-label" class="label"> Wealth </p>
                            <form id="wealth-choice">
                                <select id="wealth-combo-box" name="wealth-combo-box">
                                    <option value="All"> All incomes </option>
                                    <option value="LOW"> Low income </option>
                                    <option value="MEDIUM"> Medium income </option>
                                    <option value="HIGH"> High income </option>
                                </select>
                            </form>
                        </article>
                        <article class="school-grade-container">
                            <p id="school-grade-label" class="label"> School grade </p>
                            <form id="school-grade-choice">
                                <label for="grade_9"> 9 </label>
                                <input type="checkbox" id="grade_9" name="grade_9">
                                <label for="grade_10"> 10 </label>
                                <input type="checkbox" id="grade_10" name="grade_10">
                            </form>
                        </article>
                        <article class="gender-container">
                            <p id="gender-label" class="label"> Gender </p>
                            <form id="gender-choice">
                                <select id="gender-combo-box" name="gender-combo-box">
                                    <option value="3"> All </option>
                                    <option value="1"> Female </option>
                                    <option value="2"> Male </option>
                                </select>
                            </form>
                        </article>
                    </div>
                        <article class="indicator-container">
                        <p id="indicator-label" class="label"> PISA Indicator </p>
                            <form id="indicator-choice">
                                <select id="indicator-combo-box" name="indicator-combo-box">
                                    <option value="All"> All </option>
                                    <option value="reading"> Reading </option>
                                    <option value="math"> Math </option>
                                    <option value="science"> Science </option>
                                </select>
                            </form>
                        </article>
                    
                </div>
                
                <div class="chart-area" id="chart-container">
                    <canvas id="chart"> </canvas>
                </div>

                <div class="options-area">
                    <button class="options-button" id="exportPNG"> Export PNG</button>
                    <button class="options-button" id="exportSVG"> Export SVG</button>
                    <button class="options-button" id="exportCSV"> Export CSV</button>
                    <button class="chart-type-button" id="button-barchart"> Bar Chart </button>
                    <button class="chart-type-button" id="button-point"> Points Chart </button>
                    <button class="chart-type-button" id="button-polar"> Polar Area Chart </button>
                </div>
            </section>
        </body>
        
    </html>