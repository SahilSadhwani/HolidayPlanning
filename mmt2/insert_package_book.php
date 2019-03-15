<?php
include_once("includes/db.php");
session_start();
$user_id = $_SESSION["user_id"];


$package_id = $_GET["check"];
$price = $_GET["price"];
$number_of_person = $_GET["number_of_person"];

$total_price = $price * $number_of_person;

if(isset($_POST["insert_book_package"])){
    $contact_to_communicate = $_POST["contact_to_communicate"];
    
    $query = "SELECT date FROM static_packages WHERE package_id = $package_id";
    $result = mysqli_query($connection,$query);
    
    $row = mysqli_fetch_assoc($result);
    
    $date = $row["date"];
    
    $query = "INSERT INTO customer_package_booking(package_id,customer_id,total_no_of_travellers,total_price,date,contact_to_communicate) VALUES($package_id,$user_id,$number_of_person,'$total_price','$date',$contact_to_communicate)";
    
    $result = mysqli_query($connection,$query);
    
    
    
    
    
    $count = 1;
    
    $package_booking_id = mysqli_insert_id($connection);
    while($count!=$number_of_person+1){
        
        
        $person_name = $_POST["person_name_$count"];
        $person_age = $_POST["person_age_$count"];
        $person_gender = $_POST["person_gender_$count"];
       
//        
        $query = "INSERT INTO package_book_travellers(package_booking_id,person_name,person_age,person_gender) VALUES($package_booking_id,'$person_name','$person_age','$person_gender')";
        $result = mysqli_query($connection,$query);
        $count++;
        
    }
    
    $_SESSION["book_package"] = "SUCCESSFULLY_BOOKED_PACKAGE";
    header("Location: index.php?user_id={$user_id}&package_book_status=success");
    
    
    
}




?>





