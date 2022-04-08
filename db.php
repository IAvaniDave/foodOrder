<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "foodorder";
$hostURL = "http://localhost/foodOrder/foodOrder/";

ob_start();
//ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/session'));
session_start();

$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$con) {
    die('Could not connect: ' . mysqli_error());
}