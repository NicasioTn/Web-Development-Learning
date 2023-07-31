<?php
    session_start();
    if (!isset($_SESSION['checkLogin'])) {
        $_SESSION['checkLogin'] = 0;
    }
    
    //>>  connect
    $server = "localhost";
    $username = "user";
    $password = "123";
    $dbname = "users";

    $conn = new mysqli($server, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connection fail " . $conn->connect_error);
    } else { 
        // connection success
    }
    
    // receive
    $emaillogin = $_POST['emaillogin'];
    $passwordLogin = $_POST['passwordlogin'];
    
    // echo $emaillogin;
    $pwdInDB = getpasswordFromDB($conn, $emaillogin);
    ?>
    <head>
    <?php
    //verify password
    if(password_verify($passwordLogin, $pwdInDB)){
        // echo $passwordLogin ." == " . $pwdInDB;
        if(getRole($conn, $emaillogin) == "admin"){
            // go to Admin page
            $_SESSION['checkLogin'] = 1;
        ?>
            <meta http-equiv='refresh' content='0; URL=adminpage.php'>
        <?php
        }
        else{ // go to general user  page
            $_SESSION['checkLogin'] = 2;
        ?>
            <meta http-equiv='refresh' content='0; URL=memdisplay.php'>

        <?php
        }
    }
    else{
        // if password is not math echo $passwordLogin ." != " . $pwdInDB;
        ?>
            <meta http-equiv='refresh' content='0; URL=index.php'>
        <?php 
    }
    ?>
    </head>
    <?php   
       
    function getpasswordFromDB($conn, $emaillogin){
        $stmt = $conn->prepare("select password from users where email=?");
        $stmt->bind_param("s", $emaillogin);
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
    function getRole($conn, $emaillogin){
        $stmt = $conn->prepare("select role from users where email=?");
        $stmt->bind_param("s", $emaillogin);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1)
        {
            // successful
            $row = $result->fetch_assoc();
            return $row["role"];
        }
    }
    

?>