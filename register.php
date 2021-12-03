<?php include 'server.php' ?>
<html lang="en">
<head>
    <title>user info</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
<body>
<input type="button" value="show" class='btn btn-primary mx-5 mt-3' onClick="javascript:window.location.href = 'data.php'" >        <form class="m-3" action="register.php" method="post">
    <div class="content border rounded w-75 m-auto my-5 p-5">
    <h3 class='mb-4'>User Registration</h3>
            <div class="my-3">
                <label for="fName">First Name:</label>
                <input class="me-3" type="text" id="fName" name="firstName" value="<?php echo $firstName; ?>" />
                <label for="lName">Last Name:</label>
                <input type="text" id="lName" name="lastName" value="<?php echo $lastName; ?>" />
            </div>
            <div class="my-3">
                <label for="bDate">Birth Date:&nbsp;</label>
                <input type="date" id="bdate" name="bdate" value="<?php echo $bdate; ?>" />
            </div>
            <div class="my-3">
                <input type="file" name="file" id="file">
            </div>
            <button type="submit" name="reg_user">Submit</button>
        </form>
    </div>
</body>
</html>