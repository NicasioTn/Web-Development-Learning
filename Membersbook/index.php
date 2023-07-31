<?php
session_start();
if (!isset($_SESSION['checkLogin'])) {
    $_SESSION['checkLogin'] = 0;
}
// check login
if ($_SESSION['checkLogin'] == 1) {
    header('adminpage.php');
} elseif ($_SESSION['checkLogin'] == 2) {
    header('memdisplay.php');
} else {
}
$_SESSION['checkLogin'] = 0;

// echo $_SESSION['checkLogin'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Icon -->
    <link href="Image/user.png" rel="icon">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>

    <!-- css link -->
    <link rel="stylesheet" href="styles.css">

    <!-- Boostrap link -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

    <!-- link font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
</head>

<body id="color-way2">
        <form id="font" class="box" action="checkLogin.php" method="post">
            <img src="Image/user.png" width=80 height=80 alt="">
            <h4 id="textcolor">Email</h4>
            <input id="font" type="email" name="emaillogin">
            <h4 id="textcolor">Password</h4>
            <input id="font" type="password" name="passwordlogin">
            <button type="submit" name="mode" value="login" id="button">SignIn</button><br>
            <br>
            <a href="SignUp.php" id="textcolor">I'm don't have account</a>
            <br>
        </form>
</body>

</html>