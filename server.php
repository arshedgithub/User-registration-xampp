<?php 

include('config/db_connect.php');

$fileeName = '';
$errors = array('firstName' => '', 'lastName' => '', 'email' => '', 'birthDate' => '', 'file'=>'');

if(isset($_POST['submit'])){ 
    
    if (empty($_POST['firstName'])) {
        $errors['firstName'] = 'Fisrt name is required';
    }else{
        $firstName = $_POST['firstName'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $firstName)) {
            $errors['firstName'] = 'Name must be a string';
        }
    }

    if (!empty($_POST['lastName'])) {
        $lastName = $_POST['lastName'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $lastName)) {
            $errors['lastName'] = 'Name must be a string';
        }
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    }else{
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        }
    }

    if (empty($_POST['birthDate'])) {
        $errors['birthDate'] = 'Birth Date is required';
    }else{
        $birthDate = $_POST['birthDate'];
    }

    if ($_FILES['file']) {
        
        $fileName =  $_FILES['file']['name'];
        $fileTmpName =  $_FILES['file']['tmp_name'];
        $fileSize =  $_FILES['file']['size'];
        print_r($_FILES['file']);
        
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
        $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'zip', 'docx');
        if(!in_array($fileExtension, $allowed)){
            echo 'Your file extension must be .zip, .docx, .pdf, .jpg, .pdf, .png, .jpg, .jpeg';
        }else if ($fileSize>1000000) {
            echo 'file is too large';
        }else{
            $fileNameNew = uniqid('', true).".".$fileExtension;
            $fileDestination = 'uploads/'.$fileNameNew;
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                echo 'success';
            }
                
                // header('location: register.php?uploadsuccess');
            }
        }
        
        if (!array_filter($errors)) {
            $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
            $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $birthDate = mysqli_real_escape_string($conn, $_POST['birthDate']);
            
            $query = "INSERT INTO users (firstName, lastName, email, birthDate, files) VALUES('$firstName', '$lastName','$email', '$birthDate', '$fileName')";
            if(mysqli_query($conn, $query)){
                // header('Location: data.php');
                echo $email.$file;
            }else{
                echo "Error: " . mysql_error($conn);
            }
        }
    }

?>