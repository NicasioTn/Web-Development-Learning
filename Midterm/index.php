<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        $_SESSION['login'] = 0;
    }
    
    // if($_SESSION['login'] == 0){
    //     header("Location: index.php");
    // }
   
    
    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Icon -->
    <link href="Image/Icon.png" rel="icon">
    <!-- Boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Google Font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2098 Cinema</title>
</head>
    
<body class="backImg">   
    <div class="Loginbox">
        <img class="img-fluid" src="Image/cinemaposter.jpg" alt="Cinama Logo">
        <br><br>
        <form action="check.php" method="post">
            <h3 class="setText font"><b>ระบบจัดการข้อมูลภาพยนตร์</b></h1>
            <label for="Username"></label>
            <input type="text" class="center inputbox font" name="username" placeholder=" ชื่อผู้ใช้(Username)" value="">
            <label for="Password"></label>
            <input type="password" class="center inputbox font" name="password" placeholder=" รหัสผ่าน(Password)" value=""> <br>
            <button class="btn btn-outline-primary center font" type="submit"><b>เข้าสู่ระบบ</b>
               
            </button>
        </form>
    </div>
</body>

</html>