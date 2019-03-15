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
    
        
      
      <link rel="stylesheet" href="vendors/animate/animate.css">
       
        <link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        
        
        <link rel="stylesheet" href="vendors/bootstrap-toastr/toastr.min.css">
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
<!--
    <div class="myacc-info">
        <div class="account-details">
            
        </div>
    </div>
-->
    
    
    <!--HOLIDAY SECTION 1 carousel-->
    <section id="holiday-section-1">
<!--        <div class="container">-->
<!--           <div class="under-holiday-section owl-carousel owl-theme">-->
           
            <div class="bg-parallax carousel-images container">
               <div class="inner">
<!--
                <div class="content-photo-1">
                    <div class="photo-explanation">
                        <h2>THAILAND SPECIAL OFFER</h2>
                        <p>Special Price Rs <span>30,000</span> </p>
                    </div>
                    <div class="button-photo-1">
                       <a href="">View</a>
                    </div>
                </div>
                
                
-->           
               <h2 style="font-size:35px; margin-top:20px; margin-left:20px; color:#222;"><span style="color:red; font-style:italic; font-size:50px;">H</span>olidayPlanning.in</h2>
               
               <div style="display:inline-block;">
<!--               <p>Lorem ipsum dolor .</p>-->
               <div class="main-container">
                <div class="search-packages animated tada wow">
                
                   <form action="static_package.php?user_id={$user_id}" method="GET">
                    <div class="search-static-package">
<!--                        <input type="text" placeholder="From">-->
                      
<!--
                       <select name="search_package_from" id="search_package_from">
                           <option></option>
                           <?php
//                           $query = "SELECT package_id,package_source FROM static_packages";
//                           $result = mysqli_query($connection, $query);
//                           while($row = mysqli_fetch_assoc($result)){
//                                $package_id = $row['package_id'];
//                                $package_source = $row['package_source'];
//                                echo "<option value='$package_id'>$package_source</option>";
//                                }
//                           
                           ?>

                       </select>        
-->
                       <h3 style="color:#fff; font-weight:400; font-size:25px; margin-top:-40px;">Book Domestic and International Holidays!</h3>
                        <select name="search_package_to" id="search_package_to">
                           <option></option>
                           <?php
                           $query = "SELECT package_id,package_destination FROM static_packages";
                           $result = mysqli_query($connection, $query);
                           while($row = mysqli_fetch_assoc($result)){
                                $package_id = $row['package_id'];
                                $package_destination = $row['package_destination'];
                                echo "<option value='$package_id'>$package_destination</option>";
                                }
                           
                           ?>

                       </select>        
                        <button type="submit" name="search" style="text-decoration:none;">Search</button>   
                    </div>
                    </form>
                    <h2>Or</h2>
                    <div class="search-custom-packages">
                        <?php echo "<a id=\"custom\">Build your own package</a>";
                        ?>
                        <div class="text" id="text"></div>
                    </div>    
                    
                </div><!--search packages-->
                
            </div><!--main container-->
                  
                   <div style="float:left; margin-left:150px; margin-top:100px; cursor:pointer;">
                   <a href="static_package.php?search_package_to=160"><img src="img/deco2.jpg" alt="" style="margin-right:20px;"></a>
                    <a href=""><img src="img/deco4.jpg" alt=""></a>
                    </div>
                   </div>
                
                 
                <div class="deco" style="height:270px; background:url('img/deco1.jpg'); margin-top:50px;">
                    
                </div>
                      
                </div>

            </div>
             
   
    </section>
    <!--END OF SECTION 1 CAROUSEL-->
    
    
    
    
    <!--START OF TOP DESTINATION SECTION-->
    <section id="top-destination">
      <div class="content-box">
          <div class="content-title">
              <h3 class="text-heading top-d-heading">TOP DESTINATIONS</h3>
              <div class="content-title-underline"></div>
          </div>
      </div><!--end of content box-->
        <div class="container">
           <div class="row">
                <div class="top-destination-1 col-3 top-d">
                   <div class="top-d-img bg-parallax">
                      <div class="top-d-content">
                          <h4>ANDAMAN</h4>
                          <p>Rs 19,300 onwards</p>
                      </div>
                   </div>
                </div>
                <div class="top-destination-2 col-3 top-d">
                    <div class="top-d-img bg-parallax">
                       <div class="top-d-content">
                          <h4>THAILAND</h4>
                          <p>Rs 29,900 onwards</p>
                      </div>
                   </div>
                </div>
                <div class="top-destination-3 col-3 top-d">
                    <div class="top-d-img bg-parallax">
                       <div class="top-d-content">
                          <h4>BALI</h4>
                          <p>Rs 31,999 onwards</p>
                      </div>
                   </div>
                </div>
                 <div class="top-destination-4 col-3 top-d">
                    <div class="top-d-img bg-parallax">
                       <div class="top-d-content">
                          <h4><a href="static_package.php?search_package_to=160" style="color:#fff; text-decoration:none;">EUROPE</a></h4>
                          <p>Rs 1,40,500 onwards</p>
                      </div>
                   </div>
                </div>
                
                
                <div class="top-destination-5 col-3 top-d">
                   <div class="top-d-img bg-parallax">
                       <div class="top-d-content">
<!--                          <h4>MANALI</h4>-->
                         <h4><a href="static_package.php?search_package_to=159" style="color:#fff; text-decoration:none;">MANALI</a></h4>
                          <p>Rs 20,000 onwards</p>
                      </div>
                   </div>
                </div>
                <div class="top-destination-6 col-3 top-d">
                    <div class="top-d-img bg-parallax">
                       <div class="top-d-content">
                          <h4>DUBAI</h4>
                          <p>Rs 31,200 onwards</p>
                      </div>
                   </div>
                </div>
                <div class="top-destination-7 col-3 top-d">
                    <div class="top-d-img bg-parallax">
                        <div class="top-d-content">
                          <h4>USA</h4>
                          <p>Rs 1,64,000 onwards</p>
                      </div>
                    </div>
                </div>
                 <div class="top-destination-8 col-3 top-d">
                    <div class="top-d-img bg-parallax">
                        <div class="top-d-content">
                          <h4>LONDON</h4>
                          <p>Rs 1,32,990 onwards</p>
                      </div>
                   </div>
                </div>
                
            </div><!--row-->
        </div><!--end of container-->
    </section>
    <!--END OF TOP DESTINATION SECTION-->
            
                
    <!--START OF RELATIONSHIP SECTION-->
    <section id="relationship-section">
        <div class="content-box">
          <div class="content-title">
              <h3 class="text-heading">A HOLIDAY FOR EVERY MOOD</h3>
              <div class="content-title-underline"></div>
          </div>
      </div><!--end of content box-->
      <div class="container">
          <div class="red-background">
              <div class="container">
                  
                  <div class="container-1 animated bounceInDown wow">
                      <div class="tp34">
                            <div class="family relation">
                              <p>Family</p>
                              <a href="">View</a>
                            </div><!--family-->
                        </div>
                  </div>
                  
                  <div class="container-2 animated bounceInDown wow">
                  <div class="tp34">
                  <div class="couple relation">
                      <p>Couple</p>
                      <a href="">View</a>
                  </div><!--couple-->
                  </div>
                  </div>
                  
                  <div class="container-3 animated bounceInDown wow">
                  <div class="tp34">
                  <div class="friends relation">
                      <p>Friends</p>
                      <a href="static_package.php?search_package_to=162">View</a>
                  </div><!--friends-->
                      </div>
                  </div>
                  
              </div><!--end of container-->
          </div><!--red-bg-->
      </div><!--end of container-->
    </section>
    <!--END OF RELATIONSHIP SECTION-->
    
    
    <!--Start of NATIONAL TRIPS SECTION-->
    <section id="national-trips">
        <div class="content-box">
          <div class="content-title">
              <h3 class="text-heading">NATIONAL TRIPS</h3>
              <div class="content-title-underline"></div>
          </div>
      </div><!--end of content box-->
      <div class="container">
          <div class="outer-box">
              
              <div class="inner-state-box">
                  <div class="inner-state-box-content">
                      <div class="inner-state-box-1-photo">
                      
                      </div>
                      <div class="inner-state-box-1-info">
                           <p>If you are looking for mountains, trekking, snow then enjoy the most adventurous part of country  <span>NORTH INDIA</span></p>
                           <a href="static_package.php?search_package_to=3">VIEW</a>
                      </div>
                  </div><!--inner-state-box-content-->
              </div><!--inner-state-box-->
              
              <div class="inner-state-box">
                  <div class="inner-state-box-content">
                      <div class="inner-state-box-2-photo">
                      
                      </div>
                      <div class="inner-state-box-2-info">
                            <p>If you are looking for western side of country or the bollywood or historic places then visit the <span>WEST INDIA</span></p>
                            <a href="">VIEW</a>   
                      </div>
                  </div><!--inner-state-box-content-->
              </div><!--inner-state-box-->
              
              <div class="inner-state-box">
                  <div class="inner-state-box-content">
                      <div class="inner-state-box-3-photo">
                         
                      </div>
                      <div class="inner-state-box-3-info">
                          <p>Looking for beaches, relaxation, also a greenery enviornment then visit beautiful part of country <span>SOUTH INDIA</span></p>
                          <a href="">VIEW</a> 
                      </div>
                  </div><!--inner-state-box-content-->
              </div><!--inner-state-box-->
              
              <div class="inner-state-box">
                  <div class="inner-state-box-content">
                      <div class="inner-state-box-4-photo">
                         
                      </div>
                      <div class="inner-state-box-4-info">
                           <p>If looking for place which is full of cultures, beautifull views then experience this side of country <span>EAST INDIA</span></p>
                           <a href="">VIEW</a>
                      </div>
                  </div><!--inner-state-box-content-->
              </div><!--inner-state-box-->
              
          </div><!--outer-box-->
      </div><!--container-->
    </section>
    <!--END OF NATIONAL TRIPS SECTION-->
    
   
    <!--Start of ABOUT SECTION-->
    <?php
    include_once("includes/about.php");
    ?>
    <!--end of ABOUT SECTION-->
    
    
    <!--start of TRAVEL CONTEST SECTION-->
<!--
    <section id="travel-contest-section">
        <div class="container">
            
            <div class="travel-text love-travel">
                <h3>Love to Travel?</h3>
                <h4>Share your amazing travel stories and tell us why u love to travel!</h4>
            </div>
            
            <div class="travel-text story-form">
                <textarea name="" id="" cols="80" rows="10" placeholder="Share your experiences..." class=""></textarea>
                <a href="">SUBMIT</a>
            </div>
        </div>
    </section>
-->
    <!--end of TRAVEL CONTEST SECTION-->
    
    
    
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
   
    <!--jquery ui-->
    <script src="../jQuery%20UI/js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script></script>
    <script src="vendors/fontawesome-free-5.3.1-web/fontawesome-free-5.3.1-web/js/fontawesome.min.js"></script>
    
    
   
        <script src="vendors/bootstrap-toastr/toastr.min.js"></script>
       
    <script src="vendors/select2/js/select2.full.min.js"></script>
    
    <srcipt src="vendors/jquery-validation/js/jquery.validate.min.js"></srcipt>
    <script src="vendors/jquery-validation/js/additional-methods.min.js"></script>
    
    <!--WOW JS-->
        <script src="vendors/wow/dist/wow.min.js"></script>
    <!--counter up-->
<!--    <script src="vendors/counter-up/jquery.counterup.min.js"></script>-->
    <script src="vendors/counter-up/jquery.counterup.js"></script>  
  
    <script src="vendors/wavepoints/jquery.waypoints.min.js"></script>
<!--    <script src="register.js"></script>-->
    <script src="js/script.js"></script>
    
    <!--SCRIPTS END HERE-->

    <?php

    if(isset($_GET["status"])){
        
    $status = $_GET["status"];
    
    if($status == "loginfailure"){
    ?>
    <script>
        
        toastr["warning"]("Invalid username or password.Please try again!")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
    </script>
    
    <?php
       unset($_GET["status"]);
//        //        unset($_SESSION["Login_process"]); 
    }
    }
    
    ?>
    
    
    
    
    
    
    
    
    
    <?php

    if(isset($_GET["status"])){
        
    $status = $_GET["status"];
    
    if($status == "registerfailure"){
    ?>
    <script>
        
        toastr["warning"]("Register Error! Invalid details!")
        
        toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
    </script>
    
    <?php
       unset($_GET["status"]);
//        //        unset($_SESSION["Login_process"]); 
    }
    }
    
    ?>
    
    
    
    
    
    
    
    
    
    <?php

    if(isset($_GET["status"])){
        
    $status = $_GET["status"];
    
    if($status == "registered"){
    ?>
    <script>
        
        toastr["warning"]("Registered successfully!")
        
        toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
    </script>
    
    <?php
       unset($_GET["status"]);
//        //        unset($_SESSION["Login_process"]); 
    }
    }
    
    ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     <?php

    if(isset($_GET["flight_book_status"])){
        
    $status = $_GET["flight_book_status"];
    
    if($status == "success"){
    ?>
    <script>
        
        toastr["success"]("Booked Successfully!")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
    </script>
    
    <?php
       unset($_GET["flight_book_status"]);
//        //        unset($_SESSION["Login_process"]); 
    }
    }
    
    ?>
    
    
    
    
    
    
    
     <?php

    if(isset($_GET["package_book_status"])){
        
    $status = $_GET["package_book_status"];
    
    if($status == "success"){
    ?>
    <script>
        
        toastr["success"]("Booked Successfully!")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
    </script>
    
    <?php
       unset($_GET["package_book_status"]);
//        //        unset($_SESSION["Login_process"]); 
    }
    }
    
    ?>
    
    
    
    
    
    
    
    
</body>

</html>
