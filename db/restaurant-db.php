<?php
global $con;
$qry = "select * from restaurants";
$res = $con->query($qry);

if (mysqli_num_rows($res)>0) {
    $row = mysqli_fetch_array($res);
    echo "<pre>";
    print_r($row);
} else {
}