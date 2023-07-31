<?php
// show error php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

    // conect db
    $servername = "localhost";
    $username = "demo";
    $password = "180201web";
    $dbname = "demo";
 
    $conn = new mysqli($servername, $username, $password, $dbname);

    //prepare value
    $data = array();
    $data["customerName"] = "Peeratach Buuto";
    $data["phone"] = "0646415863";
    $json = json_encode($data);
    echo $json; // acsume that recieved from front-end

    //push data to database
    $dataIn = json_decode($json, true); // Array that converted from json
    $stmt = $conn->prepare("update customers set customerName=?, " .
            " phone=? where customerNumber=103");
    $stmt->bind_param("ss", $dataIn["customerName"], $dataIn["phone"] );
    $stmt->execute();
    echo "<br>";
    if($stmt->affected_rows > 0){
        echo "updated!";
    }
    else
    {
        echo "failed to update customers";
    }
    $conn->close();
?>