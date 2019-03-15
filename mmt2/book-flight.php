<html lang="en">
<?php
include("includes/db.php");
session_start();
$user_id = $_SESSION["user_id"];
?>
<head>

    <!--META TAGS-->
    <meta charset="utf-8">
    
    <meta name="description" content="Building Holiday Website using HTML5, CSS3, JQuery and Bootstrap!">
    
    <meta name="keywords" content="HTML5, CSS, jQuery, Responsive, Bootstrap, Web Development, Holiday Website">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <!--TITLE OF THE PAGE-->
    <title>makemytrip</title>
    
    
        
    <!--fontawesome 4.7.0-->
        <link rel="stylesheet" href="vendors/fontawesome/css/font-awesome.min.css">
    <!--Fonts Used-->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet"> 
        
    <!-- Core Plugins-->
    
<!--        <link rel="stylesheet" href="vendors/magnific%20popup/dist/magnific-popup.css">-->
<!--    owl carousel-->
<!--
        <link rel="stylesheet" href="vendors/owl-carousel/OwlCarousel2-2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/OwlCarousel2-2.3.4/assets/owl.theme.default.css">
        <link rel="stylesheet" href="vendors/owl-carousel/OwlCarousel2-2.3.4/assets/owl.theme.blue.css">
-->

       
        <link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<!--        <link href="vendors/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />-->
<!--        End of core plugin css-->
        
    <!--Custom styling css-->
       <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/stylesheet.css">
        <link rel="stylesheet" href="css/responsive.css">
    <!--End of custom styling css-->

</head>


<body>
    
    <!--NAVBAR-->
    <?php
        include_once("includes/header.php");
    ?>
    <!--END OF NAVBAR-->
    
   
   
   
   
   
   
   
   <div class="section_flight">
        <div class="middle_section_flight">
            
            
            <div class="top-nav"></div>
      <div class="side"></div>
       <div class="flight-shedule">
        <div  class="heading">
           <div class="icon">
            <i class="fa fa-plane-departure fa-2x"></i>
            </div>
            <?php   
            
                ?>
             </div>
            <table>
                <tr>
                    <th class="strong">Airlines</th>
                    <th class="strong">Departure</th>
                    <th class="strong">Arrival</th>
                    <th class="strong">Duration</th>
                    
                    
                </tr>
                
                <?php
                if(isset($_GET['book'])){
                    $flight_id = $_GET['book'];
                }
                $query = "SELECT * from flight f,flight_class c,flight_scheduling s WHERE f.flight_id = $flight_id AND f.flight_id = c.flight_id AND f.flight_id = s.flight_id";
                $result = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($result)){
                    $price = $row['price'];
                   echo "<tr>
                            <th><label for=\"airline\">&nbsp; &nbsp;    {$row['company_name']}</label></th>
                              <th><p><strong class=\"strong\">{$row['departure_time']}</strong><small class=\"small\"></small>&nbsp;{$row['flight_source']}</p></th>
                              <th><p><strong class=\"strong\">{$row['arrival_time']} </strong><small class=\"small\"></small>&nbsp;{$row['flight_destination']}</p></th>
                              <th>{$row['total_hours']}</th>
                              </tr>"; 
                }
                
                ?>
                
           </table>
       
            </div>
            
            <?php
            $no_of_flight_travellers = $_GET['no_of_flight_travellers'];
            $price_total = $price * $no_of_flight_travellers;
            
            
            echo "<form action=\"insert_flight_book.php?book={$flight_id}&no_of_flight_travellers={$no_of_flight_travellers}&price={$price}\" method=\"POST\">";
            
            
            echo "<div style=\"margin-top:40px; font-size:25px; margin-left:20px;\">
                <label for=\"\">Grand Total : <span style=\"color:red;\"> Rs $price_total</span></label>
            </div>";
                    ?>
                    
            <?php
            $count = 1;
            while($count!=$no_of_flight_travellers+1){
                
                echo "<div style=\"font-size:20px; margin-left:20px; margin-top:40px;\" class=\"add_person_for_flight_book\">
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
                <div><input type="text" placeholder="Mobile Number" style="padding:7px; margin-top:10px;" name="contact_to_communicate"><p style="margin-top:2px; font-weight:100;">Your Mobile number will be used only for sending flight related communication.</p></div>
            </div>
            
            
            <div class="continue_and_book_flight">
               <?php
                echo "<button type=\"submit\" name=\"insert_book_flight\">Continue and Book</button>";
                echo "<a href=\"index.php?user_id={$user_id}\">Back</a>";
                ?>
            </div>
       
            <?php
            echo "</form>";
            
//            $date = $_SESSION["flight_dept_date"];
//            echo $date;
            ?>

            
       </div>
    </div>
   

 


 <!--start of CONTACT SECTION-->
    <?php
        include_once("includes/contact.php");
    ?>
    <!--end of CONTACT SECTION-->
    
    
   <!--start of footer section-->
   <?php
        include_once("includes/footer.php");
    ?>
    <!--end of footer section-->
    
    
    
    
    
    
    
    
    
    
    
    <!--SCRIPTS START HERE-->
    
    <!--jQuery Script-->
        <script src="vendors/jQuery/jquery-3.3.1.min.js"></script>
    <!--owl carouel-->
<!--    <script src="vendors/owl-carousel/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>-->
    <!--jquery ui-->
    <script src="../jQuery%20UI/js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script></script>
    <script src="vendors/fontawesome-free-5.3.1-web/fontawesome-free-5.3.1-web/js/fontawesome.min.js"></script>
    
    
    
    <script src="vendors/select2/js/select2.full.min.js"></script>
    <!--counter up-->
<!--    <script src="vendors/counter-up/jquery.counterup.min.js"></script>-->
    <script src="vendors/counter-up/jquery.counterup.js"></script>  
  
    <script src="vendors/wavepoints/jquery.waypoints.min.js"></script>
    <script src="js/script.js"></script>
    
    <!--SCRIPTS END HERE-->

    
    
    
</body>

</html>

