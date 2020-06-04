<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
$fname = $_POST["firstname"];
echo $fname." ";
$lname = $_POST["lastname"];
echo $lname." ";
$selectOption = $_POST["city"];
echo $selectOption." ";
$subject = $_POST["subject"];
echo  $subject." ";
}
?>