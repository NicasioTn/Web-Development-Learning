<?php
    if(isset($_COOKIE['Number'])){
        echo "Cookie is already set<br>555";
        setcookie('Number',$_COOKIE['Number'] += 1,time() + ((86400) * 30));
    }else{
        echo "Cookie is NOT set";
        setcookie('Number', 0, time() + ((86400) * 30));
    }
?>