<?php include 'server.php' ?>

<html lang="en">
<head>
    <title>user info</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
<style>
    .err{
        font-size:2.5vh;
    }
</style>
<body>
<input type="button" value="show" class='btn btn-primary mx-5 mt-3' onClick="javascript:window.location.href = 'data.php'" >     
    <div class="content border rounded w-75 m-auto my-5 p-5">
    <form class="m-3" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype='multipart/form-data'>
    <h3 class='mb-4'>User Registration</h3>
            <div class="my-3">
                <label for="fName">First Name:</label>
                <input class="me-3" type="text" id="fName" name="firstName" />
                <div class="err px-2 text-danger"><?php echo $errors['firstName'] ?></div>
            </div>
                <div class="my-3">
                <label for="lName">Last Name:</label>
                <input type="text" id="lName" name="lastName" />
                <div class="err px-2 text-danger"><?php echo $errors['lastName'] ?></div>
            </div>
            <div class="my-3">
                <label for="email">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="email" id="email" name="email" />
                <div class="err px-2 text-danger"><?php echo $errors['email'] ?></div>
            </div>
            <div class="my-3">
                <label for="birthDate">Birth Date:&nbsp;</label>
                <input type="date" id="birthDate" name="birthDate" />
                <div class="err px-2 text-danger"><?php echo $errors['birthDate'] ?></div>
            </div>
            <div class="my-3">
                <input type="file" name="file" id="file" >
                <div class="err px-2 text-danger"><?php echo $errors['file'] ?></div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>