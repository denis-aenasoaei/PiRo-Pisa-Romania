<?php

Route::set("index.php", function(){
    IndexController::createView('Index.php');
});

Route::set("Results.php", function(){
    ResultsController::createView('Results.php');
});

Route::set("Contact.php", function(){
    ContactUsController::createView('Contact.php');
});

?>