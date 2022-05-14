<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $ser="localhost";
    $log="root";
    $pass="";
    $bd="medyvargas2000";
    $char = "utf8";
    $dbc = mysqli_connect($ser,$log,$pass,$bd);
    $dbch = mysqli_set_charset($dbc,$char);
?>