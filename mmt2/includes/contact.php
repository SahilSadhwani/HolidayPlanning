<?php
//require_once("PHPMailerAutoload.php");
//require("PHPMailer-master/PHPMailer-master/src/PHPMailer.php");
//require("PHPMailer-master/PHPMailer-master/src/SMTP.php");

?>

       <section id="contact-section">
        <div class="container">
            <div class="contact-section-body">
                <div class="contact-section-left">
                   <div class="website-description">
                       <h3>HOLIDAY PLANNING</h3>
                       <p>We believe in Happiness of our customers and offer trips with full of fun and memories.Browse amazing offers of our company.</p>
                   </div><!--end of website description-->
                    <div class="map-photo">
<!--
                        <div class="contact-information">
                            
                                <strong>Headquarters:</strong>
                                <p>313, Evergreen CHS. <br>
                                Airoli Sector 15,<br>
                                New Bombay,<br>
                                Mumbai - 55.
                                </p>
                        </div>
-->
                        <div class="phone-fax-email">
                                <p>
                                    <strong>Phone:</strong> <span>(719)-778-8804</span>
                                    <br/>
                                    <strong>Fax:</strong> <span>(719)-778-8804-8890</span>
                                    <br/>
                                    <strong>Email:</strong> <span>info@whitegraphics.com</span>
                                    <br/>
                                </p>
                            </div>
    
                            
                                                    
                            <div id="map" style="width:300px; height:200px; display:block;"></div>                                              
    <script>
// Initialize and add the map
function initMap() {
 
  var uluru = {lat: 19.051400, lng: 72.889810};
  
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLZ5J-tAJr3cdiZZCYzpzkSrn_ipCAU4M&callback=initMap">
    </script>
                                                                            
<!--
                            <div id="map" style="width:300px; height:200px; display:block;"></div>
                            
                             <script src="vendors/jQuery/jquery-3.3.1.min.js"></script>
    <script src="sensor.js"></script>
    <script src="map.js"></script>
    <script src="map_custom.js"></script>
-->
                            
                    </div>
                </div><!--end of contact section left-->
                <form action="" method="POST">
                <div class="contact-section-right">
                    <div class="contact-form">
                        <h3>CONTACT US</h3>
                        <input type="text" class="full-name" placeholder="Name" style="color:#fff;" name="feedback_name">
                        <input type="email" class="email-address" placeholder="Email Address" style="color:#fff;" name="feedback_email">
                        <textarea name="feedback_message" id="" cols="30" rows="4" placeholder="Your Message..." class="text-to-send" style="color:#fff;"></textarea>
                        
                        <button style="background:none;" type="submit" name="mail_it">Submit</button>
                    </div>
                </div><!--end of contact section right-->
                </form>
            </div><!--end of contact section body-->
        </div><!--container-->
    </section>
    
   
   
   
<?php
if(isset($_POST["mail_it"])){
//    $user_id = $_GET["user_id"];
//    echo $user_id;
    $name = $_POST["feedback_name"];
    $email = $_POST["feedback_email"];
    $message = $_POST["feedback_message"];
    
//    echo $name;
//    echo $email;
//    echo $message;
    
    $query = "INSERT INTO feedback(user_id,user_name,user_email,user_feedback) VALUES($user_id,'$name','$email','$message')";
    $result = mysqli_query($connection,$query);
}

?>
  
<?php

//if(isset($_POST["mail_it"])){
//
//    $password = $_POST["feedback_password"];
//    $email = $_POST["feedback_email"];
//    $message = $_POST["feedback_message"];
//
//$mail = new PHPMailer();    
//
//$mail->Host = 'smtp.gmail.com';
//$mail->Port = '587';
//$mail->isSMTP();
//$mail->SMTPAuth = true;
//$mail->SMTPSecure = 'tsl';
//
//
//
//$mail->Username = $email;
//$mail->Password = $password;  
//$mail->SetFrom($email, 'Sahil Sadhwani');
//$mail->Subject = 'Feedback';
//$mail->Body = $message;
//$mail->AddAddress('2016.sahil.sadhwani@ves.ac.in');
//$mail->isHTML(true);
////$mail->SMTPDebug = 2;
//$mail->Send();
//
//if(!$mail->Send()) {
//   echo 'Message could     not be sent.';
//   echo 'Mailer Error: ' . $mail->ErrorInfo;
//   exit;
//}
//
//}

?>
