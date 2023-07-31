<?php
    session_start();
    if(isset($_SESSION['number'])){
        $_SESSION['number']++;
    }else{
        $_SESSION['number'] = 0;

    }
    echo "Current session number: " . $_SESSION['number']

?>