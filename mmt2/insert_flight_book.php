<?php
//echo "hello";
include_once("includes/db.php");
session_start();
$user_id = $_SESSION["user_id"];
$date = $_SESSION["flight_dept_date"];

$no_of_flight_travellers = $_GET["no_of_flight_travellers"];
$price = $_GET["price"];


if(isset($_POST["insert_book_flight"])){
    
    $total_price = $price*$no_of_flight_travellers;
    $flight_id = $_GET["book"];
    $contact_to_communicate = $_POST["contact_to_communicate"];
    
//    echo $contact_to_communicate;
    
    
    $query = "INSERT INTO flight_book(flight_id,user_id,flight_price,flight_date,contact_to_communicate,total_no_of_travellers,total_price) VALUES($flight_id,$user_id,$price,'$date','$contact_to_communicate',$no_of_flight_travellers,$total_price)";
    
    echo $query;
    
    $result = mysqli_query($connection,$query);
    
    $count = 1;
    
    $flight_booking_id = mysqli_insert_id($connection);
    while($count!=$no_of_flight_travellers+1){
        
        
        $person_name = $_POST["person_name_$count"];
        $person_age = $_POST["person_age_$count"];
        $person_gender = $_POST["person_gender_$count"];
       
//        
        $query = "INSERT INTO flight_book_travellers(flight_booking_id,person_name,person_age,person_gender) VALUES($flight_booking_id,'$person_name','$person_age','$person_gender')";
        $result = mysqli_query($connection,$query);
        $count++;
        
    }
    
    $_SESSION["book_flight"] = "SUCCESSFULLY_BOOKED_FLIGHT";
    header("Location: index.php?user_id={$user_id}&flight_book_status=success");
    
}


?>