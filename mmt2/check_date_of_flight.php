<?php
include_once("includes/db.php");

session_start();
$date = $_SESSION["flight_dept_date"];

//echo $date;

if(isset($_POST["check_flight_date"])){
    $check_flight_of_this_date = $_POST["check_flight_of_this_date"];
    echo $check_flight_of_this_date;
    
    $_SESSION["flight_dept_date"] = $check_flight_of_this_date;
    header("Location: flight.php?date={$check_flight_of_this_date}");
//    exit();
}
?>