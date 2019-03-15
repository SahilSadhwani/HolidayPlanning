<?php
// echo "welcome";
include_once("includes/db.php");
session_start();    

if(isset($_POST["ajax"])){
    $source_customize = $_POST["source_customize"];
    $destination_customize =$_POST["destination_customize"];
    $departure_date_customize = $_POST["departure_date_customize"];
    $arrival_date_customize = $_POST["arrival_date_customize"];
    $guest_customize = $_POST["guest_customize"];
    $room_customize = $_POST["room_customize"];
    $flight_class_customize = $_POST["flight_class_customize"];
    
    
//    echo $source_customize;
//    echo $departure_date_customize;
//    echo $guest_customize;
    
    $user_id = $_SESSION["user_id"];
//    echo $user_id;

    
    header("Location: flight_ajax.php?user_id={$user_id}&source_customize={$source_customize}&destination_customize={$destination_customize}&departure_date_customize={$departure_date_customize}&arrival_date_customize={$arrival_date_customize}&guest_customize={$guest_customize}&room_customize={$room_customize}&flight_class_customize={$flight_class_customize}");
    exit();
    
}
?>