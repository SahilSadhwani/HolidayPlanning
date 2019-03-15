<html lang="en">
<?php
include("includes/db.php");  
session_start();
if(isset($_GET["user_id"])){
    $user_id = $_GET["user_id"];
    $_SESSION["user_id"] = $user_id;
}
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
    
   
  
 


    <div class="hotel_section">
        <div class="hotel_middle_section">
          
        <div>
<!--            <a href="index.php" style="text-decoration:none; color:#fff; background:red; padding:12px; margin-top:100px;">Back</a><</-->-->
        </div>          
           
          <?php
            if(isset($_POST['search_hotel'])){
                $hotel_city = $_POST["hotel_city"];
                $hotel_date = $_POST["hotel_date"];
                $no_of_guests = $_POST["no_of_guests"];
                $no_of_rooms = $_POST["no_of_rooms"];
                
//                echo $hotel_city;
//                echo $hotel_date;
//                echo $no_of_guests;
//                echo $no_of_rooms;
                
                
                
                
                $query = "SELECT * FROM hotel WHERE hotel_city = '$hotel_city'";
                $result = mysqli_query($connection,$query);
                
                $num_rows = mysqli_num_rows($result);
//                echo $num_rows;
                
                
                $row_element_count = 0;
                $count = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $hotel_id = $row["hotel_id"];
                    $hotel_name = $row["hotel_name"];
                    $hotel_address = $row["hotel_address"];
                    $hotel_city = $row["hotel_city"];
                    $hotel_star = $row["hotel_star"];
                    
                    if(($row_element_count == 0) || ($row_element_count == 2)){
                        echo "<div style=\"margin-top:50px;\" class=\"container_hotel_section\">
                            <div class=\"row_hotel_section\">";
                        $row_element_count = 0;
                    }
                    
                    $query1 = "SELECT * FROM room WHERE hotel_id = $hotel_id AND room_type_id = 3";
                    $result1 = mysqli_query($connection,$query1);
                    
                    while($data1 = mysqli_fetch_assoc($result1)){
                        $economy_price = $data1["hotel_price"];
                    }
                    
                    
                    $query2 = "SELECT * FROM room WHERE hotel_id = $hotel_id AND room_type_id = 4";
                    $result2 = mysqli_query($connection,$query2);
                    
                    while($data2 = mysqli_fetch_assoc($result2)){
                        $deluxe_price = $data2["hotel_price"];
                    }
                    
                    
                    
                    $query3 = "SELECT * FROM room WHERE hotel_id = $hotel_id AND room_type_id = 5";
                    $result3 = mysqli_query($connection,$query3);
                    
                    while($data3 = mysqli_fetch_assoc($result3)){
                        $suite_price = $data3["hotel_price"];
                    }
                    
                    echo "
                            <form action=\"?hotel_id={$hotel_id}&hotel_city={$hotel_city}\" method=\"POST\">
                            <div class=\"col-md-6_hotel_section\">
                            <div class=\"card_hotel_section\">
                            
                            <img src=\"img/hotel_image_14.jpg\" alt=\"John\" style=\"width:100%\">
                            <div class=\"clear-fix_hotel_section\"><h1 class=\"h-name_hotel_section\">$hotel_name</h1></div>";
                            
                            $star_count = 0;
                            while($star_count!=$hotel_star){
                            echo "<i class=\"fa fa-star rating_hotel_section padding-left_hotel_section\"></i>";
//                            <i class=\"fa fa-star rating_hotel_section\"></i>
//                            <i class=\"fa fa-star rating_hotel_section\"></i>
//                            <i class=\"fa fa-star rating_hotel_section\"></i>
//                            <i class=\"fa fa-star empty_hotel_section\"></i>";
                            $star_count++;
                            }
                            
                            echo "<div style=\"margin-left:15px; margin-top:20px;\"><label>Inclusions - </label>
                            <label style=\"border-right:solid 1px #222; padding-right:10px; margin-left:15px;\">Wifi</label>
                            <label style=\"border-right:solid 1px #222; padding-right:10px; margin-left:15px;\">Laundary</label><label style=\"border-right:solid 1px #222; padding-right:10px; margin-left:15px;\">Parking</label>
                            <label style=\"margin-left:15px;\">Bar</label></div>";
                        
                            echo "<div style=\"margin-left:15px; margin-top:20px; font-size:18px;\"><label for\"room\">Economy</label><input type=\"radio\" value=\"Economy\" name=\"room\" style=\"margin-left:10px;\" checked=\"checked\">";
                            echo "<label style=\"margin-left:50px;\" for\"room\">Deluxe</label><input type=\"radio\" value=\"Deluxe\" name=\"room\" style=\"margin-left:10px;\">";
                            echo "<label style=\"margin-left:50px;\"for\"room\">Suite</label><input type=\"radio\" value=\"Suite\" name=\"room\" style=\"margin-left:10px;\"></div>";
                    

                            echo "<div style=\"margin-top:10px; margin-left:15px;\"><label>Rs $economy_price</label>
                            <label style=\"margin-left:85px;\">Rs $deluxe_price</label>
                            <label style=\"margin-left:65px;\">Rs $suite_price</label></div>";
                    
                            echo "<div class=\"city_hotel_section clear-fix_hotel_section\">
                            <p class=\"icon_hotel_section\">$hotel_city</p>
                            </div>
                            <div class=\"city_hotel_section clear-fix_hotel_section\">
                            <p class=\"pull-left_hotel_section\">$hotel_address</p>
                            </div>
                            <p><button type=\"submit\" name=\"view_hotel\" value=\"1\">Select</button></p>
                        </div>
                    </div></form>";
                    $row_element_count++;
                    
                        if($row_element_count==2){
                            echo "</div></div>";
//                            echo "<div class=\"container_hotel_section\">
//                            <div class=\"row_hotel_section\">";
                            
                        }
                            
                    
                    $count++;
                }
                echo "</div></div>";
                
                
                
            }
            
            ?>
            
            
<!--
            <div class="container_hotel_section">
        <div class="row_hotel_section">
            <div class="col-md-6_hotel_section">
                <div class="card_hotel_section">
                    <img src="img/bg-1.jpg" alt="John" style="width:100%">
                    <div class="clear-fix_hotel_section"><h1 class="h-name_hotel_section">Golden Tulip Goa</h1></div>
                    <i class="fa fa-star rating_hotel_section padding-left_hotel_section"></i>
                    <i class="fa fa-star rating_hotel_section"></i>
                    <i class="fa fa-star rating_hotel_section"></i>
                    <i class="fa fa-star rating_hotel_section"></i>
                    <i class="fa fa-star empty_hotel_section"></i>
                    <div class="city_hotel_section clear-fix_hotel_section">
                    <p class="icon_hotel_section">Candolium</p>
                    </div>
                    <div class="city_hotel_section clear-fix_hotel_section">
                    <p class="pull-left_hotel_section">4 mins walk from LPK Waterfront</p>
                    </div>
                    <p><button>Contact</button></p>
                </div>
            </div>
-->
<!--
            <div class="col-md-6">
                <div class="card">
                    <img src="img/bg-1.jpg" alt="John" style="width:100%">
                    <div class="clear-fix"><h1 class=" h-name">Golden Tulip Goa</h1></div>
                    <i class="fa fa-star rating padding-left"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star empty"></i>
                    <div class="city clear-fix">
                    <p class="icon">Candolium</p>
                    </div>
                    <div class="city clear-fix">
                    <p class="pull-left">4 mins walk from LPK Waterfront</p>
                    </div>
                    <p><button>Contact</button></p>
                </div>
            </div>
-->
<!--        </div>-->
        
<!--
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="img/bg-1.jpg" alt="John" style="width:100%">
                    <div class="clear-fix"><h1 class=" h-name">Golden Tulip Goa</h1></div>
                    <i class="fa fa-star rating padding-left"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star empty"></i>
                    <div class="city clear-fix">
                    <p class="icon">Candolium</p>
                    </div>
                    <div class="city clear-fix">
                    <p class="pull-left">4 mins walk from LPK Waterfront</p>
                    </div>
                    <p><button>Contact</button></p>
                </div>    
            </div>
            <div class="col-md-6">
                <div class="card">
                    <img src="img/hotel.jpg" alt="John" style="width:100%">
                    <div class="clear-fix"><h1 class=" h-name">Golden Tulip Goa</h1></div>
                    <i class="fa fa-star rating padding-left"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star rating"></i>
                    <i class="fa fa-star empty"></i>
                    <div class="city clear-fix">
                    <p class="icon">Candolium</p>
                    </div>
                    <div class="city clear-fix">
                    <p class="pull-left">4 mins walk from LPK Waterfront</p>
                    </div>
                    <p><button>Contact</button></p>
                </div>
            </div>
        </div>
-->
    </div>
            
            
        </div>
<!--    </div>-->
    










<!--start of CONTACT SECTION-->
    <?php
//        include_once("includes/contact.php");
    ?>
    <!--end of CONTACT SECTION-->
    
    
   <!--start of footer section-->
   <?php
//        include_once("includes/footer.php");
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
