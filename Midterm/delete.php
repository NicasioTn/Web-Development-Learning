<?php
    session_start();
    

    if($_SESSION['login'] == 0){
        header("Location: index.php");
    }
    else{
        header("Location: display.php");
    }

 
    

    $servername = "localhost";
    $username = "adminCenima";
    $password = "123";
    $dbname = "cinema";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $idmovie = $_POST['idmovie'];

    $check = InDB($conn, $idmovie);
   
    // echo strcmp($check, $idmovie) ."=".$check." ". $idmovie;
    if(strcmp($check, $idmovie) == 0)
    {
        $stmt = $conn->prepare("delete from movie where id=?");
        $stmt->bind_param("s", $idmovie);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            echo "deleted";
            refreshPage();
        }
        else{
            echo "notfound";
        }
    }
   
    function InDB($conn, $idmovie){
        $stmt = $conn->prepare("select id from movie where id=?");
        $stmt->bind_param("s", $idmovie);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            return $row["id"];
        }
        else{
            return "don't have movie in system";
        }
    }

    function refreshPage(){
        ?> 
        <!-- link back to main page  -->
        <head>
        <meta http-equiv='refresh' content='0; URL=display.php'>
        </head>

        <?php
    }
    
?>