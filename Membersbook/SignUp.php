<?php
session_start();
if (!isset($_SESSION['checkLogin'])) {
    $_SESSION['checkLogin'] = 0;
}

// check login
if($_SESSION['checkLogin'] == 0 || $_SESSION['checkLogin'] == 1) {
   
}
elseif($_SESSION['checkLogin'] == 2){
    header("Location: memdisplay.php");
}
else{
    header("Location: index.php");
}
// echo $_SESSION['checkLogin'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--  icon -->
    <!-- <link href="Image/" rel="icon"> -->

    <meta charset="UTF-8">
    <title>SignUp</title>

    <!-- css link -->
    <link rel="stylesheet" href="styles.css">
    <!-- Boostrap link -->
    
    <!-- link font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  

</head>
<a href="adminpage.php"> <button style="font-family: 'Rubik', sans-serif;" id="bt" type="button " name="mode" value="back">Back</button></a>

<body id="color-way2">
    <form id="font" class="box" action="addData.php" method="post">
        <img src="Image/user.png" width=60 height=60 alt="">
        <input style="font-family: 'Rubik', sans-serif;" type="text" name="fname" placeholder="First Name">
        <input style="font-family: 'Rubik', sans-serif;" type="text" name="lname"placeholder="Last Name">
        <input style="font-family: 'Rubik', sans-serif;" type="text" name="nickname" placeholder="Nickname">
        <input style="font-family: 'Rubik', sans-serif;" type="email" name="email" placeholder="Email">
        <input style="font-family: 'Rubik', sans-serif;" type="password" name="password" placeholder="Password">
        <input style="font-family: 'Rubik', sans-serif;" type="text" name="phone" placeholder="Phone">
        <input style="font-family: 'Rubik', sans-serif;" type="url" name="url" placeholder="Facebook(URL)">
        <button style="font-family: 'Rubik', sans-serif;" id= "button" type="submit" name="mode" value="add" >Sign Up</button>
        
    </form>
</body>

</html>