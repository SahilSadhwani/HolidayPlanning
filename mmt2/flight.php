<html lang="en">
<?php
include("includes/db.php");  
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
    
    
    <?php
    include_once("nav_bar_things.php");
    ?>
    
    
    
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
            if(isset($_POST["search_flight_for"])){
                $flight_source = $_POST["flight_source"];
                $flight_destination = $_POST["flight_destination"];
            
            
            
            echo "<h2 class=\"head-title\">$flight_source-$flight_destination</h2>";
            }
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
                    if(isset($_POST["search_flight_for"])){
                        
                        $flight_source = $_POST["flight_source"];
                        $flight_dept_date = $_POST["flight_dept_date"];
                        $flight_class = $_POST["flight_class"];
                        $flight_destination = $_POST["flight_destination"];
                        $flight_ret_date = $_POST["flight_ret_date"];
                        $no_of_flight_travellers = $_POST["no_of_flight_travellers"];
                    
                
    
                $_SESSION["flight_dept_date"] = $flight_dept_date;
                        
                
                $query = "SELECT f.flight_id, f.flight_source,f.flight_destination,f.arrival_time,f.departure_time,f.total_hours,f.arrival_time_format,f.departure_time_format,a.flight_no,a.company_name,c.price  FROM flight_scheduling f, flight a, flight_class c, flight_availability fa WHERE flight_source = '$flight_source' AND flight_destination = '$flight_destination' AND f.flight_id = a.flight_id AND f.flight_id = c.flight_id AND c.class_type = 'BUSINESS' AND f.flight_departure_date = '$flight_dept_date' AND f.flight_id = fa.flight_id AND $no_of_flight_travellers<fa.seats_available";
                        
                        
                $result = mysqli_query($connection,$query);
                        
//                    echo $query;
                    ?>
<!--
                    <form method="POST">    
                    <div style="font-size:20px; margin:20px;">
                        <label for="">Change Date</label><input type="date" style="padding:5px; margin-left:15px;" name="check_flight_of_this_date"> 
                        <button type="button" style="margin-left:40px; background:red; color:#fff; border:none; padding:5px; cursor:pointer;" name="check_flight_date">Check</button></div>
                </form>
-->
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
                        
                        echo "<tr>
                              <th><label for=\"airline\">&nbsp; &nbsp;$company_name</label></th>
                              <th><p><strong class=\"strong\">$departure_time</strong><small class=\"small\"></small>&nbsp;$flight_source</p></th>
                              <th><p><strong class=\"strong\">$arrival_time </strong><small class=\"small\"></small>&nbsp;$flight_destination</p></th>
                              <th>$total_hours</th>
                              <th>$price</th>
                              <th><a href=\"book-flight.php?book={$row['flight_id']}&no_of_flight_travellers={$no_of_flight_travellers}\" name=\"book_flight\">Book</a></th></tr>
                              <tr><th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th></tr>";
                    }
                    }
                    ?>
                
                
<!--
                $sub_array = array();
    
//    $image_name = $row['product_id'] . "." . $row['image_extension'];
//    if($row['image_extension'] != "")
//        $image_path = "<img class='img-responsive' height='75px' src='http://localhost/erp/assets/products/images/".$image_name."'>";
//    else
//        $image_path = '<img class = "img-responsive" src="http://www.placehold.it/75x75/EFEFEF/AAAAAA&amp;text=no+image" alt="" />';
//    $sub_array[] = $image_path;
-->

                
                
                
<!--                <tr>-->
<!--
                    <th> <input id="" type="radio" name="booking_this_flight"><label for="airline">&nbsp; &nbsp;American Airlines</label></th>
                    <th><p><strong class="strong">8:35</strong><small class="small">AM</small>&nbsp;BKK</p></th>
                    <th><p><strong class="strong">09.00</strong><small class="small">AM</small>&nbsp;JFK</p></th>
                    <th>21h 15m | STOP</th>
                    <th>1,453 USD</th>
-->
<!--                </tr>-->
                
                
                
                
<!--
                <tr>
                    <th><input id="american" type="radio" name="booking"><label for="airline">&nbsp; &nbsp;American Airlines</label></th>
                    <th><p><strong class="strong">8:35</strong><small class="small">AM</small>&nbsp;BKK</p></th>
                    <th><p><strong class="strong">09.00</strong><small class="small">AM</small>&nbsp;JFK</p></th>
                    <th>21h 15m | STOP</th>
                    <th>1,453 USD</th>
                </tr>    
                <tr>
                    <th><input id="american" type="radio" name="booking"><label for="airline">&nbsp; &nbsp;American Airlines</label></th>
                    <th><p><strong class="strong">8:35</strong><small class="small">AM</small>&nbsp;BKK</p></th>
                    <th><p><strong class="strong">09.00</strong><small class="small">AM</small>&nbsp;JFK</p></th>
                    <th>21h 15m | STOP</th>
                    <th>1,453 USD</th>
                </tr>
                <tr>
                    <th><input id="american" type="radio" name="booking"><label for="airline">&nbsp; &nbsp;American Airlines</label></th>
                    <th><p><strong class="strong">8:35</strong><small class="small">AM</small>&nbsp;BKK</p></th>
                    <th><p><strong class="strong">09.00</strong><small class="small">AM</small>&nbsp;JFK</p></th>
                    <th>21h 15m | STOP</th>
                    <th>1,453 USD</th>
                </tr>
                <tr>
                    <th><input id="american" type="radio" name="booking"><label for="airline">&nbsp; &nbsp;American Airlines</label></th>
                    <th><p><strong class="strong">8:35</strong><small class="small">AM</small>&nbsp;BKK</p></th>
                    <th><p><strong class="strong">09.00</strong><small class="small">AM</small>&nbsp;JFK</p></th>
                    <th>21h 15m | STOP</th>
                    <th>1,453 USD</th>
                </tr>
-->
            </table>
        </div>
            
        </div><!--middle_section_flight-->
    </div><!--section-flight-->
    
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   <!--Start of ABOUT SECTION-->
    <?php
    include_once("includes/about.php");
    ?>
    <!--end of ABOUT SECTION-->
   
  


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

