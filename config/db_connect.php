<?php

$conn = mysqli_connect('localhost', 'root', '', 'greenline');

if ($conn->connect_error) {
    die('connection failed : ' . $conn->connect_error);
}

?>