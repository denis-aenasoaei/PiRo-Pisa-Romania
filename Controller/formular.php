<?php
if(isset($_POST['submit']))
{ 
$fname = $_POST["fname"];
echo $fname;
$lname = $_POST["lname"];
echo $lname;
$selectOption = $_POST["city"];
echo $selectOption;
$subject = $_POST["subject"];
echo  $subject;
}
?>