<?php
    $servername = "localhost";
    $username = "demo";
    $password = "180201web";
    $dbname = "demo";

    // connect
    $conn = new mysqli($servername, $username ,$password ,$dbname);

    //check connection status
    if($conn->connect_error){
        die("Connect Fail " . $conn->connect_error);
    }else{
        echo "Connection Seuccess";
    }

    //select database
    $sql = "select * from employees";
    $result = $conn->query($sql);
    echo "<br>";
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            echo $row["firstName"] . " ". $row["lastName"]. "<br>";
        }
    }else{
        echo "No result";
    }


?>