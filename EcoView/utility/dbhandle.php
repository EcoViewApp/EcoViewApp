<?php

    $servername = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $DBname = "ecoview";

    $connection = mysqli_connect($servername, $DBusername, $DBpassword, $DBname);

    if (!$connection)
    {
        die("Connection failed: ".mysqli_connect_error());
    }
?>