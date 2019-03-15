<html lang="en">
<?php
include_once("includes/db.php");  
session_start();
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
            
                $flight_source = $_GET["source_customize"];
                $flight_destination = $_GET["destination_customize"];
            
//            echo $flight_source;
//            echo $flight_destination;
            
            echo "<h2 class=\"head-title\">$flight_source-$flight_destination</h2>";
            
                ?>
             </div>
            <table>
                <tr>
                    <th class="strong">Airlines</th>
                    <th class="strong">Departure</th>
                    <th class="strong">Arrival</th>
                    <th class="strong">Duration</th>
                    <th class="strong">Price</th>
                    <th></th>
                </tr>
                
                <tr><th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th></tr>
                
                
                 <?php
//                    if(isset($_GET["ajax"])){
                        
                        $flight_source = $_GET["source_customize"];
                        $flight_dept_date = $_GET["departure_date_customize"];
                        $flight_class = $_GET["flight_class_customize"];
                        $flight_destination = $_GET["destination_customize"];
                        $flight_ret_date = $_GET["arrival_date_customize"];
                        $no_of_flight_travellers = $_GET["guest_customize"];
                        $no_of_rooms = $_GET["room_customize"];
                
//                echo $flight_source;
//                echo $flight_destination;
//                echo $flight_class;
                        
                    
                
    
//                $_SESSION["departure_date_customize"] = $flight_dept_date;
                
                $query = "SELECT f.flight_id, f.flight_source,f.flight_destination,f.arrival_time,f.departure_time,f.total_hours,f.arrival_time_format,f.departure_time_format,a.flight_no,a.company_name,c.price FROM flight_scheduling f, flight a, flight_class c WHERE flight_source = '$flight_source' AND flight_destination = '$flight_destination' AND f.flight_id = a.flight_id AND f.flight_id = c.flight_id AND c.class_type = '$flight_class'";  
                
                        
                $result = mysqli_query($connection,$query);
//                       echo "s";
//                echo $query;
//                echo "ss";
//                    $ans = mysqli_num_rows($result);
//                echo $ans;
                
                    ?>
                    
                  
                    
                    
                    <div style="font-size:20px; margin:20px;"><a href="index.php" style="background:red; color:#fff; border:none; padding:7px; text-decoration:none;">Go Back</a></div>
                    
                   <?php
//                    if(isset($_POST["check_flight_date"])){
//                        echo "ss";
//                    }
//                        else{
//                            echo "s";
//                        }
                    ?>
                   
                    
                    <?php    
//                echo "ok";
                    while($row = mysqli_fetch_assoc($result)){
                        $company_name = $row['company_name'];
                        $arrival_time = $row['arrival_time'];
                        $departure_time = $row['departure_time'];
                        $flight_source = $row['flight_source'];
                        $flight_destination = $row['flight_destination'];
                        $total_hours = $row['total_hours'];
                        $flight_id = $row['flight_id'];
                        $price = $row['price'];
                        $arrival_time_format = $row['arrival_time_format'];
                        $departure_time_format = $row['departure_time_format'];
                        
//                        echo $company_name;
//                        echo "s";
                        
                        echo "<tr>
                              <th><label for=\"airline\">&nbsp; &nbsp;$company_name</label></th>
                              <th><p><strong class=\"strong\">$departure_time</strong><small class=\"small\"></small>&nbsp;$flight_source</p></th>
                              <th><p><strong class=\"strong\">$arrival_time </strong><small class=\"small\"></small>&nbsp;$flight_destination</p></th>
                              <th>$total_hours</th>
                              <th>$price</th>
                              <th><a href=\"hotel_ajax.php?source={$flight_source}&destination={$flight_destination}&flight_dept_date={$flight_dept_date}&flight_ret_date={$flight_ret_date}&no_of_guests={$no_of_flight_travellers}&no_of_rooms={$no_of_rooms}&flight_class={$flight_class}&flight_id={$flight_id}\" name=\"book_flight\">Select</a></th></tr>
                              <tr><th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th></tr>";
                    }
//                    }
                    ?>
                    
                    </table>
        </div>
            
        </div><!--middle_section_flight-->
    </div><!--section-flight-->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                
            
    
    
    
    

  
 


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

