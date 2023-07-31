<?php
    $servername = "localhost";
    $username = "demo";
    $password = "180201web";
    $dbname = "demo";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connection Fail ". $conn->connect_error);
    }else{
        echo"Connection success";
    }
    $email = $_GET["email"];
    $password = $_GET["password"];
    
    $stmt = $conn->prepare("select * from employees where email=? and password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    

    $result = $stmt->get_result();
    if($result->num_rows == 1){ // if num_rows > 0 "sql injection" ' or ' '1'='1' 
        echo "Login Success <br>";
        $row = $result->fetch_assoc();
        echo $row["firstName"] . " " . $row["lastName"] 
            . " " . $row["email"];
    }else{
        echo "Login Fail";
    }