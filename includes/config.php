<?php
    ob_start(); //turns on output buffering.
    session_start(); //tells if user is logged in or out.

    date_default_timezone_set("Europe/London");

    //Connects to database
    //PDO stands for PHP Data Object
    try {
        $con = new PDO("mysql:dbname=jackflix;host=localhost", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch (PDOException $e) {
        exit("Connection failed: " . $e->getMessage());
    }
?>