<?php
    $server = 'localhost';
    $username_db = 'root';
    $password_db = '';
    $database = 'campus_connect_db';

    $conn = mysqli_connect($server, $username_db, $password_db, $database);

    if (!$conn) {
        die("Connection failed " . mysqli_connect_error());
    }
