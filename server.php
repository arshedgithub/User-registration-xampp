<?php 
session_start();

$db = mysqli_connect('localhost', 'root', '', 'greenline');

if ($db->connect_error) {
    die('connection failed : ' . $db->connect_error);
}

$firstName = "";
$lastName = "";
$bdate = "";
$file = "";
$errors = array();



// collecting the form data
if(isset($_POST['reg_user'])){
    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $bdate = mysqli_real_escape_string($db, $_POST['bdate']);
    $file = mysqli_real_escape_string($db, $_POST['file']);
}

if (empty($firstName)) { array_push($errors, "Name is required"); }
if (empty($bdate)) { array_push($errors, "Birth date is required"); }

if (count($errors) == 0) {
    $query = "INSERT INTO users (firstName, lastName, birthDate) VALUES('$firstName', '$lastName', '$bdate')";
  	mysqli_query($db, $query);
      echo 'success ', $firstName , $lastName, $bdate;
}  

?>