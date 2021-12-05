<?php 
session_start();

$db = mysqli_connect('localhost', 'root', '', 'greenline');

if ($db->connect_error) {
    die('connection failed : ' . $db->connect_error);
}

$firstName = "";
$lastName = "";
$bdate = "";
$file = '';
$errors = array();

function uploadfile(){
    $fileName =  $_FILES['file']['name'];
    $fileTmpName =  $_FILES['file']['tmp_name'];
    $fileErr =  $_FILES['file']['error'];
    $fileSize =  $_FILES['file']['size'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if(in_array($fileActualExt, $allowed)){
    if ($fileErr === 0) {
        if ($fileSize < 1000000) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            header('location: register.php?uploadsuccess');
        }else{
            echo 'Your file is too big!';
        }
    }
    }else {
        echo 'There was an error uploading your file!';
    }
}



// collecting the form data
if(isset($_POST['reg_user'])){
    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $bdate = mysqli_real_escape_string($db, $_POST['bdate']);
    $file =  $_FILES['file'];
    
    
}

if (empty($firstName)) { array_push($errors, "Name is required"); }
if (empty($bdate)) { array_push($errors, "Birth date is required"); }
if (empty($file)) { array_push($errors, "file is required"); }

if (count($errors) == 0) {
    $query = "INSERT INTO users (firstName, lastName, birthDate) VALUES('$firstName', '$lastName', '$bdate')";
  	mysqli_query($db, $query);
      echo 'success ', $firstName , $lastName, $bdate;
      uploadfile();
}  else {
    print_r($errors);
}

?>