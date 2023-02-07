<?php

    session_start();
    // $OPic = 'http://localhost/hostler/Upload/OwnerProfile/';
    // $Ohostle = 'http://localhost/hostler/Upload/HostelImg/';
    // $Vhostle = 'http://localhost/hostler/Upload/HostelVideo/';

    $server_Name = 'localhost';
    $userName = 'root';
    $password = '';
    $DB_Name = 'office';

    $conn = mysqli_connect($server_Name,$userName,$password,$DB_Name);
    
?>