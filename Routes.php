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

?>