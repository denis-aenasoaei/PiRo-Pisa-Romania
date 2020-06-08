    <!DOCTYPE html>
    <html lang="en-US">
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.bundle.min.js"></script>
        <script src="Scripts/resultsScript.js"></script>
        <link rel="stylesheet" type="text/css" href="StyleSheets/style.css">
        <link rel="stylesheet" type="text/css" href="StyleSheets/StyleHome.css">
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
            

            <section class="layout-container">
                <div class="filter-container">
                    <article class="countries-container">
                        <p id="country-label" class="label"> Countries </p>
                        <form id="country-choice">
                            <select id="c1" name="c1">
                                <option value="Albania"> Albania </option>
                                <option value="Argentina"> Argentina </option>
                                <option value="Australia"> Australia </option>
                                <option value="Austria"> Austria </option>  
                                <option value="B-S-J-Z (China)"> China </option>
                                <option value="Baku (Azerbaijan)"> Azerbaijan </option>
                                <option value="Belarus"> Belarus </option>      
                                <option value="Belgium"> Belgium </option>
                                <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
                                <option value="Brazil"> Brazil </option>  
                                <option value="Brunei Darussalam"> Brunei </option>
                                <option value="Austria"> Austria </option>      
                                <option value="Bulgaria"> Bulgaria </option>      
                                <option value="Canada"> Canada </option>
                                <option value="Chile"> Chile </option>      
                                <option value="Chinese Taipei"> Chinese Taipei </option>
                                <option value="Colombia"> Colombia </option>      
                                <option value="Costa Rica"> Costa Rica </option>      
                                <option value="Croatia"> Croatia </option>      
                                <option value="Cyprus"> Cyprus </option>
                                <option value="Czech Republic"> Czech Republic </option>      
                                <option value="Denmark"> Denmark </option>      
                                <option value="Dominican Republic"> Dominican Republic </option>
                                <option value="Estonia"> Estonia </option>      
                                <option value="Finland"> Finland </option>      
                                <option value="France"> France </option>      
                                <option value="Georgia"> Georgia </option>      
                                <option value="Germany"> Germany </option>      
                                <option value="Greece"> Greece </option>
                                <option value="Hong Kong (China)*"> Hong Kong (China) </option>      
                                <option value="Hungary"> Hungary </option>      
                                <option value="Iceland"> Iceland </option>      
                                <option value="Indonesia"> Indonesia </option>      
                                <option value="Ireland"> Ireland </option>      
                                <option value="Israel"> Israel </option>      
                                <option value="Italy"> Italy </option>      
                                <option value="Japan"> Japan </option>      
                                <option value="Jordan"> Jordan </option>      
                                <option value="Kazakhstan"> Kazakhstan </option>      
                                <option value="Korea"> Korea </option>      
                                <option value="Kosovo"> Kosovo </option>      
                                <option value="Latvia"> Latvia </option>      
                                <option value="Lebanon"> Lebanon </option>      
                                <option value="Lithuania"> Lithuania </option>      
                                <option value="Luxembourg"> Luxembourg </option>      
                                <option value="Macao (China)"> Macao (China) </option>      
                                <option value="Malaysia"> Malaysia </option>      
                                <option value="Malta"> Malta </option>      
                                <option value="Mexico"> Mexico </option>      
                                <option value="Moldova"> Moldova </option>      
                                <option value="Montenegro"> Montenegro </option>      
                                <option value="Netherlands*"> Netherlands </option>      
                                <option value="New Zealand"> New Zealand </option>      
                                <option value="North Macedonia"> North Macedonia </option>      
                                <option value="OECD average"> OECD average </option>      
                                <option value="Panama"> Panama </option>      
                                <option value="Peru"> Peru </option>      
                                <option value="Philippines"> Philippines </option>      
                                <option value="Poland"> Poland </option>      
                                <option value="Portugal*"> Portugal </option>      
                                <option value="Qatar"> Qatar </option>      
                                <option value="Romania"> Romania </option>      
                                <option value="Russia"> Russia </option>      
                                <option value="Saudi Arabia"> Saudi Arabia </option>      
                                <option value="Serbia"> Serbia </option>      
                                <option value="Singapore"> Singapore </option>      
                                <option value="Slovak Republic"> Slovak Republic </option>      
                                <option value="Slovenia"> Slovenia </option>      
                                <option value="Spain"> Spain </option>         
                                <option value="Sweeden"> Sweeden </option>      
                                <option value="Switzerland"> Switzerland </option>      
                                <option value="Thailand"> Thailand </option>      
                                <option value="Turkey"> Turkey </option>      
                                <option value="Ukraine"> Ukraine </option>      
                                <option value="United Arab Emirates"> United Arab Emirates </option>      
                                <option value="United Kingdom"> United Kingdom </option>      
                                <option value="United States*"> United States </option>      
                                <option value="Uruguay"> Uruguay </option>      
                                <option value="Viet Nam"> Viet Nam </option>  
                            </select>
                        </form>                 
                        <button type="button" class="filter-button" id="btn-add-country"> Add a country </button>
                        <button type="button" class="filter-button" id="btn-remove-country"> Remove a country </button>  
                    </article>
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
                
                <div class="chart-area">
                
                </div>
            </section>
        </body>
        
    </html>