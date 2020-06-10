<?php

Route::add("index.php", function(){
    IndexController::createView('Index.php');
});

Route::add("Results.php", function(){
    ResultsController::createView('Results.php');
});

Route::add("Contact.php", function(){
    ContactUsController::createView('Contact.php');
});

Route::add("Login.php",function(){
    LoginController::createView('Login.php');
});

Route::add("Admin.php",function(){
    AdminController::createView('Admin.php');
});
?>