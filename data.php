<?php 

include('config/db_connect.php');

$result = mysqli_query($conn, "SELECT * FROM users");

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];
    $data = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $files = mysqli_fetch_assoc($data);
    $filepath = 'uploads/' . $file['savedFile'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['savedFile']));
        flush(); //clearing system output buffer
        readfile('uploads/' . $file['savedFile']);
        die(); // terminate from the script   
    } else {
        echo 'File does not exist.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
</head>
<body>
<input type="button" value="back" class='btn btn-success px-3 mx-5 mt-3' onClick="javascript: window.location.href = 'index.php'">
    <div class='m-5'>
    <table class="table">
        <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Birth Date</th>
            <th>File</th>
            <th></th>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['birthDate']; ?></td>'file';
                    <td><?php echo $row['files']; ?></td>
                    <td><a href="data.php?file_id=<?php echo $row['id']?>"><button class="btn btn-success py-1">Download</button></a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
</body>
</html>