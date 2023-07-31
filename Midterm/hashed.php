<?php
        function hashed(){
            $hashed = password_hash("1234", PASSWORD_DEFAULT);
            return $hashed;
        }


        echo hashed();
?>