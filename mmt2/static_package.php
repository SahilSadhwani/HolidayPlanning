<html>
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
    <header>
        <nav>
            <div id="mmt-menu" class="container">
                      <ul class="top-bar">
                          <li><a class="smooth-scroll" id="holiday-tp" href="index.php">Holidays</a></li>
<!--                          <li><a class="smooth-scroll" id="hotel-search" >Hotels</a></li>-->
                          <li><a class="smooth-scroll" id="flight-search">Flights</a></li>
                         
                          <li><a class="smooth-scroll" href="#contact-section">Contact</a></li>
                          
                      </ul>
                      <div id="text"></div>
                  </div>
                  
        </nav>
        
    </header>
    
    
    
    <?php
    
    require_once("includes/db.php");
    include("nav_bar_things.php");
    
    $package_id = $_GET['search_package_to'];
//    echo $package_id;
    $query="
select p.package_id,p.package_day,p.package_description,s.package_no_of_days,s.date,s.package_destination,s.package_price, s.flight_id,s.hotel_id_1,s.hotel_id_2,s.hotel_id_3,s.hotel_id_4,s.hotel_id_5,s.hotel_id_6,s.hotel_id_7,s.hotel_id_8,s.add_image_1,s.add_image_2,s.add_image_3 from static_packages s,package_day p where p.package_id=s.package_id and p.package_id=$package_id";
    $result_set=mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result_set);
    $package_destination = $row['package_destination'];
//    echo $package_destination;
    $cost = $row['package_price'];
    $num = mysqli_num_rows($result_set);
    $package_deisciption = $row['package_description'];
//    echo $package_deisciption;
    $date = $row['date'];
    $add_image_1 = $row["add_image_1"];
    $add_image_2 = $row["add_image_2"];
    $add_image_3 = $row["add_image_3"];
    
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
        
        <div class="static-package-top-section">
           
           <div class="tour-short-info">
            <h2><?php echo $package_destination; ?></h2>
            <div class="content-title-underline" style="width:150px;"></div>
            <h4><?php echo "INR per person $cost"; ?></h4>
               <p><?php echo "Date: $date "?></p>
               <p><?php echo "Number of Days: $num_days "?> </p>
       
        </div>
        
            <div class="slider-section">
                <div class="top-container">
              <!--SLIDE SHOW CONTAINER-->
                   <div class="slide-show-container">
                    <!--IMAGES-->
                     <?php
    $id =  mysqli_insert_id($connection);
           $query = "SELECT add_image_1,add_image_2, add_image_3 FROM static_packages WHERE package_id = $id ";
                   $result = mysqli_query($connection, $query);
//                   echo $result;
                
                    ?>
                      
                        <?php
//                       $slide_count = 1;        
//                         while($row = mysqli_fetch_array($result)){
//                          echo "<div class=\"slides\" id=\"slide$slide_count\">";
//                          echo '<img src=\"data:image/jpeg;base64,  '.base64_encode( $row['add_image_1'] ).'\" />';
//                             echo "</div>";
//                            $slide_count++;
//                        }
                          
                      
                      echo "<div class=\"slides\" id=\"slide1\" style=\"background:url('img/static_packages/$add_image_1'); box-sizing:border-box;\">
                      </div>";
          
          
                      echo "<div class=\"slides\" id=\"slide2\" style=\"background:url('img/static_packages/$add_image_2'); box-sizing:border-box;\">
                      </div>";
          
                      echo "<div class=\"slides\" id=\"slide3\" style=\"background:url('img/static_packages/$add_image_3'); box-sizing:border-box;\">
                      </div>";
                          
                          ?>
          <!--END OF IMAGES-->
          
                   </div>
       <!--SLIDE SHOW CONTAINER-->
       
           <div class="links">
               <a href="#slide1" class="slide-change" id="slide1-img">1</a>
               <a href="#slide2" class="slide-change" id="slide2-img">2</a>
               <a href="#slide3" class="slide-change" id="slide3-img">3</a>
           </div>        
           </div>
           
        </div><!--end of slider section-->
        
        </div><!--end of static package top section-->
        
        
        <hr>
        
        
        <div class='example'>
        <div class='tabsholder1'>
            <div data-tab="Itenary">
               
              <?php
                $query="
select p.package_id,p.package_day,p.package_description,s.package_no_of_days,s.package_destination,s.package_price, s.flight_id,s.hotel_id_1,s.hotel_id_2,s.hotel_id_3,s.hotel_id_4,s.hotel_id_5,s.hotel_id_6,s.hotel_id_7,s.hotel_id_8 from static_packages s,package_day p where p.package_id=s.package_id and p.package_id=$package_id";
    $result_set=mysqli_query($connection,$query);
//    $row = mysqli_fetch_assoc($result_set);
//    $package_destination = $row['package_destination'];
////    echo $package_destination;
//    $cost = $row['package_price'];
//    $num = mysqli_num_rows($result_set);
//    $package_deisciption = $row['package_description'];
//    echo $package_deisciption;
                
                $count =0;
                    while($num != $count){
                    $row1 = mysqli_fetch_assoc($result_set);
                    
                    $package_deisciption = $row1['package_description'];
//                    echo $package_deisciption;
                    $count = $count+1;
                echo "<div class=\"dayvise-description\">
                    <div class=\"day\">Day $count </div>
                    
                    <div style=\"margin-right:20px;\" class=\"day-description\">
                        <p>$package_deisciption</p>
                    </div>
                </div>";
                
                }
            ?>    
            </div>
            
            
            
            <div data-tab="Inclusions & Exclusions">
                <div class="inclusion-and-exlusion">
                 
                    <div class="inclusion">
                       <h3 style="margin-left:40px;">Inclusions :</h3> 
                       <div class="content-title-underline" style="margin-left:40px;"></div> 
                        <ul>
                            <li>
                                <p><i class="fa fa-check"></i> All Transfers & Sightseeing by Bus.</p>
                            </li>
                            <li>
                                <p><i class="fa fa-check"></i> Service of Tour Manager.</p>
                            </li>
                            <li>
                                <p><i class="fa fa-check"></i> BreakFast and Dinner Included.</p>
                            </li>
                        </ul>
                        
                        <h3 style="margin-left:40px;">Note :</h3>
                        <div class="content-title-underline" style="margin-left:40px;"></div> 
                        <ul>
                            <li><p><i class="fa fa-check"></i> Passengers opting for Innova or any other vehicle will not get any kind of extra facility, also they will have to stay in touch and follow the instruction of tour manager.</p></li>
                            
                            <li><p><i class="fa fa-check"></i> The usage of vehicle will be subject to the rules of local unions & also the passengers have to be on time for breakfast, Lunch & Dinner</p></li>
                            
                            <li><p><i class="fa fa-check"></i> Airport / Station Pickup – Drop is included.</p></li>
                        </ul>  
                        
                        <h3 style="margin-left:40px;">Travel Tips :</h3>
                        <div class="content-title-underline" style="margin-left:40px;"></div> 
                        <ul>
                        <li>
                                <p><i class="fa fa-check"></i> Carry your Regular Basic medicines & Basic First Aid Kit with you.</p>
                            </li>
                            <li>
                                <p><i class="fa fa-check"></i> Valid Photo Id (Aadhar Card/Driving License/Voter Id/Passport).</p>
                            </li>
                            <li>
                                <p><i class="fa fa-check"></i> Carry Sun Glasses, Sun’s screen, Moisturizer, Hand Gloves, Monkey Cap, Cotton, Sport Shoes.</p>
                            </li>
                            </ul>
                    </div><!--inclusion-->       
                    
                    <div class="exclusion">
                        <h3 style="margin-left:100px;">Exclusions :</h3>
                        <div class="content-title-underline" style="margin-left:100px;"></div> 
                        <ul>
                            <li>
                                <p><i class="fa fa-check"></i> Air / Train Fares</p>
                            </li>
                            <li>
                                <p><i class="fa fa-check"></i> Any Kind Of Personal Expenses like Drinks, Phone Calls, Laundry, Etc.</p>
                            </li>
                            <li>
                                <p><i class="fa fa-check"></i> Any other item not specified in cost includes.</p>
                            </li>
                            <li>
                                <p><i class="fa fa-check"></i> 5% GST Extra.(Tax Subject to Change as Per Govt Regulations)</p>
                            </li>
                            <li>
                                <p><i class="fa fa-check"></i> Tours & Travels will not be responsible if the flight is delayed or cancelled.</p>
                            </li>
                                <li>
                                <p><i class="fa fa-check"></i> Before booking the tour please read instructions and facilities carefully. </p>
                            </li>
                                <li>
                                <p><i class="fa fa-check"></i> Air / Train Fares </p>
                            </li>
                                
                        </ul>
                    </div>
                </div>
            </div>
	        
            <div data-tab="Hotel Info">
            
            <?php
                if($hotel_1 != 0){
                    $query = "Select * from hotel where hotel_id = $hotel_1";
                    $result_set = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result_set);
                    $name = $row['hotel_name'];
                    $address = $row['hotel_address'];
                    $city = $row['hotel_city'];
                    $star = $row['hotel_star'];
                    echo "<p>Hotel Name: $name</p>";
                    echo "<p>Hotel Address: $address</p>";
                    echo "<p>Hotel City: $city</p>";
                    echo "<p>Rating: $star</p>";
                    echo "<hr>";
                }
                if($hotel_2 != 0){
                    $query = "Select * from hotel where hotel_id = $hotel_2";
                    $result_set = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result_set);
                    $name = $row['hotel_name'];
                    $address = $row['hotel_address'];
                    $city = $row['hotel_city'];
                    $star = $row['hotel_star'];
                    echo "<p>Hotel Name: $name</p>";
                    echo "<p>Hotel Address: $address</p>";
                    echo "<p>Hotel City: $city</p>";
                    echo "<p>Rating: $star</p>";
                    echo "<hr>";
                }
                if($hotel_3 != 0){
                    $query = "Select * from hotel where hotel_id = $hotel_3";
                    $result_set = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result_set);
                    $name = $row['hotel_name'];
                    $address = $row['hotel_address'];
                    $city = $row['hotel_city'];
                    $star = $row['hotel_star'];
                    echo "<p>Hotel Name: $name</p>";
                    echo "<p>Hotel Address: $address</p>";
                    echo "<p>Hotel City: $city</p>";
                    echo "<p>Rating: $star</p>";
                    echo "<hr>";
                }
                if($hotel_4 != 0){
                    $query = "Select * from hotel where hotel_id = $hotel_4";
                    $result_set = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result_set);
                    $name = $row['hotel_name'];
                    $address = $row['hotel_address'];
                    $city = $row['hotel_city'];
                    $star = $row['hotel_star'];
                    echo "<p>Hotel Name: $name</p>";
                    echo "<p>Hotel Address: $address</p>";
                    echo "<p>Hotel City: $city</p>";
                    echo "<p>Rating: $star</p>";
                    echo "<hr>";
                }
                if($hotel_5 != 0){
                    $query = "Select * from hotel where hotel_id = $hotel_5";
                    $result_set = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result_set);
                    $name = $row['hotel_name'];
                    $address = $row['hotel_address'];
                    $city = $row['hotel_city'];
                    $star = $row['hotel_star'];
                    echo "<p>Hotel Name: $name</p>";
                    echo "<p>Hotel Address: $address</p>";
                    echo "<p>Hotel City: $city</p>";
                    echo "<p>Rating: $star</p>";
                    echo "<hr>";
                }
                if($hotel_6 != 0){
                    $query = "Select * from hotel where hotel_id = $hotel_6";
                    $result_set = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result_set);
                    $name = $row['hotel_name'];
                    $address = $row['hotel_address'];
                    $city = $row['hotel_city'];
                    $star = $row['hotel_star'];
                    echo "<p>Hotel Name: $name</p>";
                    echo "<p>Hotel Address: $address</p>";
                    echo "<p>Hotel City: $city</p>";
                    echo "<p>Rating: $star</p>";
                    echo "<hr>";
                }
                if($hotel_7 != 0){
                    $query = "Select * from hotel where hotel_id = $hotel_7";
                    $result_set = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result_set);
                    $name = $row['hotel_name'];
                    $address = $row['hotel_address'];
                    $city = $row['hotel_city'];
                    $star = $row['hotel_star'];
                    echo "<p>Hotel Name: $name</p>";
                    echo "<p>Hotel Address: $address</p>";
                    echo "<p>Hotel City: $city</p>";
                    echo "<p>Rating: $star</p>";
                    echo "<hr>";
                }
                if($hotel_8 != 0){
                    $query = "Select * from hotel where hotel_id = $hotel_8";
                    $result_set = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result_set);
                    $name = $row['hotel_name'];
                    $address = $row['hotel_address'];
                    $city = $row['hotel_city'];
                    $star = $row['hotel_star'];
                    echo "<p>Hotel Name: $name</p>";
                    echo "<p>Hotel Address: $address</p>";
                    echo "<p>Hotel City: $city</p>";
                    echo "<p>Rating: $star</p>";
                    echo "<hr>";
                }
            ?>
            
            </div>
            <div data-tab="Book" class="dept-and-cost">
              <form action ="book_package.php" method="get" >
               <label>Total Number of Persons</label>
                <input type="number" min="1" name="number_of_person" style="width:100px;">
                
                <div>
                    <button type="submit" value=<?php echo $package_id; ?> name="check" style="margin-left:500px; margin-top: 70px; color:#fff; background:red; padding:12px; text-decoration:none; margin-bottom:1px;">Book Package</button>
                </div>
                </form>
                
            </div>
            <div data-tab="Cancellation" class="cancellation">
                <div>
                    <h3>Easy Cancellation</h3>
                    <div class="content-title-underline" style="margin-left:40px;"></div> 
                    <p>
                        But we actually don't want you to see this - We believe you deserve holidays.. <br>
                        Before 30 Days, of Tour Departure  - Rs. 5000/= per person
                    </p>
                    <p>Between 15 to 30 Days – 25% of the Tour Cost</p>

                    <p>Between 10 to 15 Day – 50% of the Tour Cost</p>

                    <p>Between 5 to 10 Days – 75% of the Tour Cost</p>

                    <p>Within 5 days – 100% of the Tour Cost.</p>
                </div>
            </div>
        </div>
        </div>     
        
        </div><!--whole-middle-content-->
    </div><!--whole-content-->
    
    
    
    <?php
//    include_once("includes/about.php");
    ?>
    <!--contact section-->
     <?php
        include_once("includes/contact.php");
    ?>
    <!--end of contact section-->
    <!--footer-->
    <?php
    include_once("includes/footer.php");
    ?>
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