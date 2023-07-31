<?php
    //connect to DB
    $servername = "localhost";
    $username = "demo";
    $password = "180201web";
    $dbname = "demo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "select * from products";
    $result = $conn->query($sql);
    $json = array(); 
    while($row = $result->fetch_assoc())
    {
        array_push($json, $row);

    }
    
    $output = json_encode($json);
    echo $output;

?>