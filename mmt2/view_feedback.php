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
    
        <link rel="stylesheet" href="vendors/magnific%20popup/dist/magnific-popup.css">
<!--    owl carousel-->
<!--
        <link rel="stylesheet" href="vendors/owl-carousel/OwlCarousel2-2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/OwlCarousel2-2.3.4/assets/owl.theme.default.css">
        <link rel="stylesheet" href="vendors/owl-carousel/OwlCarousel2-2.3.4/assets/owl.theme.blue.css">
-->

      
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
    <header>
        <nav>
            <div id="mmt-menu" class="container">
                     
                      <ul class="top-bar">
<!--                         <li><a href="" style="float:left; margin-right:800px;"><span style="font-style:normal; font-weight:600; color:red;">H</span>P.com</a></li>-->
                          <li><a class="smooth-scroll" id="holiday-tp" href="index.php">Holidays</a></li>
<!--                          <li><a class="smooth-scroll" id="hotel-search" >Hotels</a></li>-->
                          <li><a class="smooth-scroll" id="flight-search">Flights</a></li>
<!--
                          <li><a class="smooth-scroll" href="#about-section">About Us</a></li>
                          <li><a class="smooth-scroll" href="#contact-section">Contact</a></li>
-->
                          <li><a class="smooth-scroll" id="account">My Account</a></li>
                      </ul>
                      <div id="text"></div>
                  </div>
                  
        </nav>
        
    </header>
    <!--END OF NAVBAR-->
    
    
    <?php
    include_once("nav_bar_things.php");
    ?>
    
   
   <?php
//    if($user_id!=1){
//        header("Location: index.php");
//    }else
//    {
    
    ?>
   
   
    <section id="feedback_section">
        <div class="container_feedback" style="margin-left:100px; margin-top:80px; font-size:22px; margin-bottom:80px;">
            
            <?php
            
//            if(isset($_POST["mail_it"])){
//                $name = $_POST["feedback_name"];
//                $email = $_POST["feedback_email"];
//                $message = $_POST["feedback_message"];
                
//                
//                echo $name;
//                echo $email;
//                echo $message;
            
            
            $query = "SELECT * FROM feedback";
            $result = mysqli_query($connection,$query);
            
            
                ?>
                
                <div>
                   <form action="" method="POST">
                    <table>
                        <tr style="font-size:22px;">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Feedback</th>
<!--                            <th>Your Reply</th>-->
<!--                            <th></th>-->
                        </tr>
                        
                        <?php
                        $num = mysqli_num_rows($result);
                        $count = 0; 
                        while($count!=$num){
//                        while($row = mysqli_fetch_assoc($result)){
//                            $user_id = $row["user_id"];
//                            $name = $row["user_name"];
//                            $email = $row["user_email"];
//                            $message = $row["user_feedback"];
//                        }
                        $row = mysqli_fetch_assoc($result);
                        $user_id = $row["user_id"];
                            $name = $row["user_name"];
                            $email = $row["user_email"];
                            $message = $row["user_feedback"];
                    ?>
                        <tr>
                            <?php
                            echo "<td>$name</td>";
                            echo "<td name=\"user_feedback_email\">$email</td>";
                            echo "<td>$message</td>";
//                            echo "<td><textarea name=\"admin_feedback_message\" id=\"\" cols=\"20\" rows=\"5\"></textarea></td>";
//                            echo "<td><button type=\"submit\" name=\"reply_to_user\" style=\"color:#fff; background:red; border:none; padding:8px; cursor:pointer; margin-left:20px;\">Reply</button></td>";
                            ?>
                        </tr>
                        <?php
                            $count++;
                        }
                            ?>
                    </table>
                    </form>
                </div>
                
                
            <?php    
//            }
//    }
            ?>
            
        </div>
    </section>
    





 
    <!--start of CONTACT SECTION-->
    <?php
//        include_once("includes/contact.php");
    ?>
    <!--end of CONTACT SECTION-->
    
    
   <!--start of footer section-->
   <section id="footer">
       <div class="container">
           <div class="footer-left">
                <p>Copyrights @ 2018 All Rights Reserved by Holiday Planning Inc.</p>
           </div><!--footer left-->
           <div class="footer-right">
              <div class="footer-links">
                            <a href="#" class="bottom-links">Holidays </a><span>| </span>
                            <a href="#" class="bottom-links">Hotels </a><span>| </span>
                            <a href="#" class="bottom-links">Flights </a><span>| </span>
                            <a href="#" class="bottom-links">About Us </a><span>| </span>
                            <a href="#" class="bottom-links">Contact </a><span> </span>
                        </div><!--footer links-->
           </div><!--footer right-->
       </div><!--end of container-->
   </section>    
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
    
    
    <!--MAGNIFIC POPUP-->
       <script src="vendors/magnific%20popup/dist/jquery.magnific-popup.min.js"></script>
       
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

 