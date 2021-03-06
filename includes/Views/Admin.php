<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="StyleSheets/style.css">
    <link rel="stylesheet" type="text/css" href="StyleSheets/StyleAdmin.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="Images/Home/oecd_logo.png">
    <script src="Scripts/adminScript.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <header>
        <div class="header-area">
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
        </div>
    </header>
    <main>
        <h1 id="title">DASHBOARD</h1>
        <div class="admin-navigation">  
            <button id="modify-table-data" class="admin-nav-button active"> Modify table data </button>
            <button id="select-table-data" class="admin-nav-button"> Select table data </button>
        </div>
        <div class="admin-actions">
            <div class="modify-table">
                    <form id="table-selection">
                        <label for="table-name"> Table Name: </label>
                        <select name="table-name" id="table-name">
                            <option value="Administrators"> Administrators </option>
                            <option value="romania_data"> Data from romania </option>
                            <option value="country_scores"> Data from other countries </option>
                        </select>
                        <label for="action-type"> Action: </label>
                        <select name="action-type" id="action-type">
                            <option value="add"> Add row </option>
                            <option value="update">Update a row </option>
                            <option value="delete">Delete a row </option>
                        </select>
                    </form>

                    <form id="modify-details">
                        <label for="input1" id="LB_input1" class=""> Username </label>
                        <input type="text" name="input1" id="input1" class="">
                        <label for="input2" id="LB_input2" class=""> Password </label>
                        <input type="password" name="input2" id="input2" class="">
                        <label for="input3" class="hidden" id="LB_input3"> Science Score </label>
                        <input type="text" name="input3" class="hidden" id="input3">
                        <label for="input4" class="hidden" id="LB_input4"> Reading score </label>
                        <input type="text" name="input4" class="hidden" id="input4">
                        <label for="input5" class="hidden" id="LB_input5"> Gender </label>
                        <select name="input5" class="hidden" id="input5">
                            <option value="1"> Female </option>
                            <option value="2"> Male </option>
                        </select>
                        <label for="input6" class="hidden" id="LB_input6"> School Grade </label>
                        <select name="input6" class="hidden" id="input6">
                            <option value="10"> Grade 10 </option>
                            <option value="11"> Grade 11 </option>
                        </select>
                        <label for="input7" class="hidden" id="LB_input7"> Age </label>
                        <select name="input7" class="hidden" id="input7">
                            <option value="15"> 15 </option>
                            <option value="16"> 16 </option>
                        </select>
                        <label for="input8" class="hidden" id="LB_input8"> Wealth Range </label>
                        <select name="input8" class="hidden" id="input8">
                            <option value="LOW"> Low </option>
                            <option value="MEDIUM"> Medium </option>
                            <option value="HIGH"> High </option>
                        </select>
                    </form>

                
                <button id="btn-submit"> Submit modifications </button>
            </div>
            <div class="select-table hidden">
                <form id="table-pick">
                    <label for="table-form"> Table Name: </label>
                    <select name="table-form" id="table-form">
                        <option value="Administrators"> Administrators </option>
                        <option value="romania_data"> Data from romania </option>
                        <option value="country_scores"> Data from other countries </option>
                    </select>
                </form>

                <form id="select-filters" action="" onsubmit="">
                    <label for="box_in1" id="label_in1" class=""> Username: </label>
                    <input type="text" name="input1" id="box_in1" class="">

                    <label for="box_in2" class="hidden" id="label_in2">  </label>
                    <input type="text" name="box_in2" class="hidden" id="box_in2">

                    <label for="box_in3" class="hidden" id="label_in3">  </label>
                    <input type="text" name="box_in3" class="hidden" id="box_in3">

                    <label for="box_in4" class="hidden" id="label_in4">  </label>
                    <input type="text" name="box_in4" class="hidden" id="box_in4">

                    <label for="box_in5" class="hidden" id="label_in5"> Gender: </label>
                    <select name="box_in5" class="hidden" id="box_in5">
                        <option value="ALL"> All</option>
                        <option value="1"> Female </option>
                        <option value="2"> Male </option>
                    </select>

                    <label for="box_in6" class="hidden" id="label_in6"> School Grade: </label>
                    <select name="box_in6" class="hidden" id="box_in6">
                        <option value="ALL"> All</option>
                        <option value="9"> Grade 9 </option>
                        <option value="10"> Grade 10 </option>
                        <option value="11"> Grade 11 </option>
                    </select>

                    <label for="box_in7" class="hidden" id="label_in7"> Age: </label>
                    <select name="box_in7" class="hidden" id="box_in7">
                        <option value="ALL"> All</option>
                        <option value="15"> 15 </option>
                        <option value="16"> 16 </option>
                    </select>

                    <label for="box_in8" class="hidden" id="label_in8"> Wealth Range: </label>
                    <select name="box_in8" class="hidden" id="box_in8">
                        <option value="ALL"> All</option>
                        <option value="LOW"> Low </option>
                        <option value="MEDIUM"> Medium </option>
                        <option value="HIGH"> High </option>
                    </select>

                </form>

                <button id="button_select"> Select </button>
                <table id="select-data" class="hidden"> </table>
                <form id="pages" class="hidden">
                    <label for="page" id="label_page">Page:</label>
                    <input name="page" type="number" min="1" max="1" value="1" step="1" id="box_page">
                </form>
            </div>
                
        </div>
        <div class="logout-wrapper">
            <button id="logout">Logout</button>
        </div>
    </main>
</body>
</html>
