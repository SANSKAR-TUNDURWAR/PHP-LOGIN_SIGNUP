<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "user";

    $con= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!$con){
        die("failed to connect");
    }
?>