<?php
include_once("includes/db.php");
session_start();
$user_id = $_SESSION["user_id"];

//echo "s";




//$package_id = $_GET["check"];
$grand_total = $_GET["grand_total"];
$no_of_guests = $_GET["no_of_guests"];
$on_date = $_GET["on_date"];
$off_date = $_GET["off_date"];
$source = $_GET["source"];
$destination = $_GET["destination"];
$flight_id_departure = $_GET["flight_id"];
$flight_id_arrival = $_GET["flight_id_ret"];
$hotel_id = $_GET["hotel_id"];
$total_hotel_price = $_GET["total_hotel_price"];
$total_flight_price = $_GET["total_flight_price"];


//
//$total_price = $price * $number_of_person;
//
if(isset($_POST["insert_book_customize_package"])){
    $contact_to_communicate = $_POST["contact_to_communicate"];
//    echo $contact_to_communicate;
    
//    
    
//    $query = "SELECT date FROM static_packages WHERE package_id = $package_id";
//    $result = mysqli_query($connection,$query);
//    
//    $row = mysqli_fetch_assoc($result);
//    
//    $date = $row["date"];
//    
    $query = "INSERT INTO customer_customize_package(user_id,customize_package_source_name,customize_package_destination_name,flight_id_departure,flight_id_arrival,hotel_id,customize_package_price,total_flight_price,total_hotel_price,on_date,off_date,contact_to_communicate,total_no_of_travellers) VALUES($user_id,'$source','$destination',$flight_id_departure,$flight_id_arrival,$hotel_id,$grand_total,$total_flight_price,$total_hotel_price,'$on_date','$off_date',$contact_to_communicate,$no_of_guests)";
    
    $result = mysqli_query($connection,$query);
//    
//    
//    
//    
//    
    $count = 1;
    
    $customize_package_booking_id = mysqli_insert_id($connection);
    while($count!=$no_of_guests+1){
        
        
        $person_name = $_POST["person_name_$count"];
        $person_age = $_POST["person_age_$count"];
        $person_gender = $_POST["person_gender_$count"];
       
//        
        $query = "INSERT INTO customize_package_book_travellers (customer_customize_package_id,person_name,person_age,person_gender) VALUES($customize_package_booking_id,'$person_name',$person_age,'$person_gender')";
        $result = mysqli_query($connection,$query);
        $count++;
        
    }
    
    $_SESSION["book_package"] = "SUCCESSFULLY_BOOKED_PACKAGE";
    header("Location: index.php?user_id={$user_id}&package_book_status=success");
    
    
    
}




?>