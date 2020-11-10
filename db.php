<?php

    $server_name = "localhost";
    $server_uid = "root";
    $server_pwd = "";
    $server_db_name = "nyc";


    $conn = mysqli_connect($server_name, $server_uid, $server_pwd, $server_db_name);

    if(!$conn) {
        die(). mysqli_connect_errno();
    }


?>