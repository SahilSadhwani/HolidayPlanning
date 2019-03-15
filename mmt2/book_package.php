<html>
<?php
session_start();
$user_id = $_SESSION["user_id"];
?>
    <head>
        <title>Your Package</title>
            <link rel="stylesheet" href="css/normalize.css">
            <link rel="stylesheet" href="css/responsive.css">
            <link rel="stylesheet" href="css/stylesheet.css">
            <link rel="stylesheet" href="vendors/Themeable-jQuery-Tabs-Plugin-CardTabs/css/jquery.cardtabs.css">
            <link rel="stylesheet" href="vendors/Themeable-jQuery-Tabs-Plugin-CardTabs/docs/demo.css">
            <!--fontawesome 4.7.0-->
        <link rel="stylesheet" href="vendors/fontawesome/css/font-awesome.min.css">
    <!--Fonts Used-->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet"> 
    </head>
    
<body>
    
    <!--header-->
    <?php
    include_once("includes/header.php");
    include_once("nav_bar_things.php");
    require_once("includes/db.php");
    $package_id = $_GET['check'];
    $number_of_person = $_GET['number_of_person'];
//    echo $package_id;
    $query="
select p.package_id,p.package_day,p.package_description,s.package_no_of_days,s.date,s.package_destination,s.package_price, s.flight_id,s.hotel_id_1,s.hotel_id_2,s.hotel_id_3,s.hotel_id_4,s.hotel_id_5,s.hotel_id_6,s.hotel_id_7,s.hotel_id_8 from static_packages s,package_day p where p.package_id=s.package_id and p.package_id=$package_id";
    $result_set=mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result_set);
    $package_destination = $row['package_destination'];
//    echo $package_destination;
    $cost = $row['package_price'];
    $num = mysqli_num_rows($result_set);
    $package_deisciption = $row['package_description'];
//    echo $package_deisciption;
    $date = $row['date'];
    $num_days = $row['package_no_of_days'];
    
    
                    $hotel_1= $row['hotel_id_1'];
                    $hotel_2= $row['hotel_id_2'];
                    $hotel_3= $row['hotel_id_3'];
                    $hotel_4= $row['hotel_id_4'];
                    $hotel_5= $row['hotel_id_5'];
                    $hotel_6= $row['hotel_id_6'];
                    $hotel_7= $row['hotel_id_7'];
                    $hotel_8= $row['hotel_id_8'];
    
                    
    ?>
    <!--end of header-->
    
    
    
    
    
    
    
    
    
    
    
    <div class="whole-content">
        <div class="whole-middle-content">
        
        
        
        
        
        
        
        <?php
            echo "<form action=\"insert_package_book.php?number_of_person={$number_of_person}&check={$package_id}&price={$cost}\" method=\"POST\">";
            
            ?>
    
    <?php
            $count = 1;
            while($count!=$number_of_person+1){
                
                echo "<div style=\"font-size:20px; margin-left:20px; margin-top:40px;\" class=\"add_person_for_package_book\">
                <label for=\"\">Person $count</label><input type=\"text\" placeholder=\"Name\" name=\"person_name_$count\">
                
                <label for=\"\">Age</label><input type=\"number\" min=\"1\" style=\"width:40px;\" name=\"person_age_$count\">
                
                <label for=\"\">Gender</label>
                    <select name=\"person_gender_$count\" id=\"\">
                    <option value=\"\"></option>
                    <option value=\"MALE\">MALE</option>
                    <option value=\"FEMALE\">FEMALE</option>
                    </select>
                </div>";
                $count++;
            }
            
            ?>
            
            <div style="font-size:20px; margin-left:20px; margin-top:50px;">
                <label for="">Contact details</label>
                <div><input type="text" placeholder="Mobile Number" style="padding:7px; margin-top:10px;" name="contact_to_communicate"><p style="margin-top:2px; font-weight:100;">Your Mobile number will be used only for sending package related communication.</p></div>
            </div>
            
            
            <div class="continue_and_book_package" style="margin-top:50px;">
               <?php
                echo "<button type=\"submit\" name=\"insert_book_package\" style=\"background:red; border:none; color:#fff; padding:8px; font-size:22px; margin-left:20px; cursor:pointer;\">Continue and Book</button>";
                
                echo "<a style=\"background:red; border:none; color:#fff; padding:8px; font-size:22px; text-decoration:none; margin-left:200px;\" href=\"index.php?user_id={$user_id}\">Back</a>";
                ?>
            </div>
       
            <?php
            echo "</form>";
            
    ?>
   
    
    
        
        
        
        
        
<!--
        <div class="static-package-top-section">
           
           <div class="tour-short-info">
            <h4>
            <?php 
//    echo "Package booked of : $package_destination";
?>
            </h4>
            <div class="content-title-underline" style="width:150px;"></div>
            <h4>
              <?php 
//$val=$number_of_person*$cost;  echo "Total Cost $val"; 
?>
              </h4>
               <p>
               <?php 
//echo "Date: $date "
?>
               </p>
               <p>
               <?php
//echo "Number of Persons: $number_of_person ";
?> 
               </p>
               <p>
               <?php 
//echo "Number of Days: $num_days "
?> </p>
            <h4>Thank You For Booking</h4>   
            
        </div>
        
        </div>
-->
<!--        end of static package top section-->
        </div>
    </div>        
    
        
    
    <!--contact section-->
     
    <!--end of contact section-->
    <!--footer-->
    
    <!--end of footer-->
    
    <!--SCRIPTS START HERE-->
    
    <!--jQuery Script-->
        <script src="vendors/jQuery/jquery-3.3.1.min.js"></script>
    <!--owl carouel-->
<!--    <script src="vendors/owl-carousel/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>-->
    <!--jquery ui-->
<!--    <script src="../vendors/jQuery%20UI/js/jquery-ui-1.12.1/jquery-ui.js"></script>-->
    <script></script>
    <script src="vendors/fontawesome-free-5.3.1-web/fontawesome-free-5.3.1-web/js/fontawesome.min.js"></script>
    
    
    <script src="vendors/select2/js/select2.full.min.js"></script>
    <!--counter up-->
<!--    <script src="vendors/counter-up/jquery.counterup.min.js"></script>-->
    <script src="vendors/counter-up/jquery.counterup.js"></script>  
  
    <script src="vendors/Themeable-jQuery-Tabs-Plugin-CardTabs/js/jquery.cardtabs.js"></script>
    <script src="js/script.js"></script>
    
    <!--SCRIPTS END HERE-->

</body>

</html>