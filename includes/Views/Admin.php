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
    </header>
    <main>
        <h1 id="title">DASHBOARD</h1>
        <div class="admin-navigation">  
            <button id="modify-table-data" class="admin-nav-button"> Modify table data </button>
            <button id="placeholder1" class="admin-nav-button"> placeholder </button>
            <button id="placeholder2" class="admin-nav-button"> placeholder </button> 
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
                        <label for="action-type">Action: </label>
                        <select name="action-type" id="action-type">
                            <option value="add"> Add row </option>
                            <option value="update">Update a row </option>
                            <option value="delete">Delete a row </option>
                        </select>
                    </form>

                    <form id="add-country">
                        <label for="country">Country name </label>
                        <input type="text" name="country">
                        <br>
                        <label for="math">Math Score </label>
                        <input type="text" name="math">
                        <br>
                        <label for="scie">Science Score </label>
                        <input type="text" name="scie">
                        <br>
                        <label for="read">Reading score </label>
                        <input type="text" name="read">
                    </form>
                        
            </div>
        </div>
        <div class="logout-wrapper">
            <button id="logout">Logout</button>
        </div>
    </main>
</body>
</html>
