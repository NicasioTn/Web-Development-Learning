<?php
    session_start();
    
    if($_SESSION['login'] == 1){
        header("Location: display.php");
    }
    

    $servername = "localhost";
    $username = "adminCenima";
    $password = "123";
    $dbname = "cinema";
 
    $conn = new mysqli($servername, $username, $password, $dbname);

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $id = getusernameDB($conn, $username);
    $pwd = getpasswordDB($conn, $username);

    // echo strcmp($username, $id);
    if(strcmp($username, $id) == 0) // username pass
    {
        // echo "11";
        if(password_verify($password, $pwd)){
            $_SESSION['login'] = 1;
            header("Location: display.php");
        }
        else{
            passwordFail($username);
                
        }
    }
    
    
    function getusernameDB($conn, $username)
    {
        $stmt = $conn->prepare("select username from cinemasystem where username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1)
        {
            // successful
            $row = $result->fetch_assoc();
            return $row["username"];
        }
        else{
            return "";
        }
    }
    function getpasswordDB($conn, $username)
    {
        $stmt = $conn->prepare("select password from cinemasystem where username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1)
        {
            // successful
            $row = $result->fetch_assoc();
            return $row["password"];
        }
        else{
            return "";
        }
    }
    function passwordFail($username){
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
                    <label for="แจ้งเตือน" class="font notify"><b> *ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง </b></label>
                    <label for="Username"></label>
                    <input type="text" class="center inputbox font" name="username" placeholder=" ชื่อผู้ใช้(Username)" value="">
                    <label for="Password"></label>
                    <input type="password" class="center inputbox font" name="password" placeholder=" รหัสผ่าน(Password)" value=""> <br>
                    <button class="btn btn-outline-primary center font" type="submit"><b>เข้าสู่ระบบ</b></button>
                </form>
            </div>
        </body>

        </html>
        <?php
    }

    
  
?>