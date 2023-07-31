<?php

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "Post ";
        $quiz = $_POST["Quiz"];
        $midterm = $_POST["Midterm"];
        $final = $_POST["Final"];
        
    }
    else{
        $quiz = $_GET["Quiz"];
        $midterm = $_GET["Midterm"];
        $final = $_GET["Final"];
    }
    //  echo " Quiz:" . $quiz 
    //  ." Midterm: " . $midterm 
    //  ." Final: " . $final;
    $total = $quiz + $midterm + $final;
    $grade = "";
    if($total >= 80)
    {
        $grade = "A";
    }elseif($total >= 70){
        $grade = "B";
    }elseif($total >= 60){
        $grade = "C";
    }elseif($total >= 50){
        $grade = "D";
    }elseif($total <50){
        $grade = "F";
    }
    echo "Total" .$total ."<h1>". $grade . "</h1>"
?>