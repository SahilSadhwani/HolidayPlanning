<div class="search_hotel" style="display:none;">
        <div class="container">
        <form action="hotel.php" method="POST">
       <div class="search-hotel-content">
        <label for="">City</label>
<!--        <input type="text" placeholder="Enter City" name="hotel_city">-->
   <select name="hotel_city" id="hotel_city">
       <option value=""></option>
       <?php
       $query = "SELECT * FROM hotel";
       $result = mysqli_query($connection,$query);
       while($row = mysqli_fetch_assoc($result)){
           $hotel_city = $row["hotel_city"];
           echo "<option value=\"$hotel_city\">$hotel_city</option>";
       }
       ?>
   </select>
    
        <label for="date">Date</label>
        <input type="date" min="2018-05-10" max="2019-06-10" id="date" name="hotel_date">
    
        <label for="num">Guests</label>
        <input type="number" min="1" max="50" step="1" id="num" name="no_of_guests">
    
        <label for="num">Rooms</label>
        <input type="number" min="1" max="50" step="1" id="num" name="no_of_rooms">
    
        <button type="submit" name="search_hotel">Search</button>
<!--        <a class="cancel">X</a>-->
    </div>
    </form>
    
    </div>
    </div>
    
    
    
    <div class="search_flight" style="display:none;">
        <div class="container">
        <form action="flight.php" method="POST">
    <div class="search-flight-content">
      

       <div class="search-flight-part-left">
            <div style="margin-top:50px;"><label for="">Source</label>
<!--            <input type="text" placeholder="Enter City" name="flight_source">-->
           <select name="flight_source" id="flight_source">
               <option value=""></option>
               <?php
               $query = "SELECT * FROM flight_scheduling";
               $result = mysqli_query($connection,$query);
//               echo $query;
               while($row = mysqli_fetch_assoc($result)){
                   $flight_id = $row['flight_id'];
                   $flight_source = $row['flight_source'];
                   echo "<option value='$flight_source'>$flight_source</option>";
               }
              
               ?>
                </select></div>
           
            <br>
            <label for="date">Departure Date</label>
            <input type="date" min="2018-05-10" max="2019-06-10" id="date" name="flight_dept_date">
            <br>
            
            <div style="margin-top:50px;"><label for="num">Class</label>
<!--            <input type="number" min="1" max="50" step="1" id="num" name="flight_class">-->
           <select name="flight_class" id="flight_class">
           <option value=""></option>
           <option value="BUSINESS">BUSINESS</option>
           <option value="ECONOMY">ECONOMY</option>
                </select></div>
           
            <br>
        </div>
        <div class="search-flight-part-right">
            <div style="margin-top:50px;"><label for="">Destination</label>
<!--            <input type="text" placeholder="Enter City" name="flight_destination">-->
           <select name="flight_destination" id="flight_destination">
               <option value=""></option>
               <?php
               $query = "SELECT * FROM flight_scheduling";
               $result = mysqli_query($connection,$query);
//               echo $query;
               while($row = mysqli_fetch_assoc($result)){
                   $flight_id = $row['flight_id'];
                   $flight_destination = $row['flight_destination'];
                   echo "<option value='$flight_destination'>$flight_destination</option>";
               }
              
               ?>
                </select></div>
           
            <br>
            <label for="date">Return Date</label>
            <input type="date" min="2018-05-10" max="2019-06-10" id="date" name="flight_ret_date">
            <br>
            <label for="num">Travellers</label>
            <input type="number" min="1" max="50" step="1" id="num" name="no_of_flight_travellers">
            <br>
        </div>    
<!--        <a class="cancel" style="font-size:50px; float:left;">X</a>-->
    
<!--    <a href="">Search</a>-->
      
    <button type="submit" name="search_flight_for">Search</button>   
    </div>
    
            </form>
    </div>
    </div>
    
    
   
    
    
    
    <?php
    
    if(!isset($_SESSION["user_id"])){
        
    
    echo "<div class=\"account\" style=\"display:none;\">
        <div class=\"container\">
        <div class=\"account-popup\">
       <div class=\"tp\">
        <a id=\"login-page\" style=\"float:left;\">Login</a>
        <a id=\"signup-page\" style=\"float:left;\">SignUp</a>
        </div>
        <div id=\"text\"></div>
    </div>

    </div>
    </div>";
    }
    ?>
    
    
    <?php
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
        if($user_id!=1){
            
        ?>
        
        
        
        
        
        <div class="account" style="display:none;">
                <div class="account-details">
                    <div class="account-name">
                        <h3 style="50px;">Username : <?php 
                            
                            $user_id = $_SESSION["user_id"];
                            $query = "SELECT * FROM customer WHERE user_id = $user_id";
                            $result = mysqli_query($connection,$query);
                            $row = mysqli_fetch_assoc($result)
                            ?><?php echo $row['user_name'] ?></h3>
                        <div class="content-title-underline" style="margin-left:25px; width:50px;"></div>
                        <div>
                        <h3>View Bookings:
                            <br><br>Package Bookings
                             </h3>
                             
                            <table>
                               <tr>
                                <th>Booking Id</th>
                                <th>Package Name</th>
                                <th>Days</th>
                                <th>Date</th>
                                </tr>
                            <?php
                            $query = "SELECT cu.package_booking_id,cu.customer_id,s.package_destination,cu.customer_id,s.package_no_of_days,s.date FROM customer_package_booking cu,static_packages s,customer c WHERE s.package_id = cu.package_id AND cu.customer_id = c.user_id AND cu.customer_id = $user_id";
                            $result = mysqli_query($connection,$query);
//                            $row = mysqli_fetch_assoc($result);
                            $num_of_rows = mysqli_num_rows($result);
                            $count = 0;
                            while($num_of_rows != $count){
                                $count += 1;
                                $row = mysqli_fetch_assoc($result);

                            ?>
                            
                                <tr>
                                    <td><?php echo $row['package_booking_id'] ?></td>
                                    <td><?php echo $row['package_destination'] ?></td>
                                    <td><?php echo $row['package_no_of_days'] ?></td>
                                    <td><?php echo $row['date']?></td>
                                </tr>
                            
                            <?php
                            }
                            ?>
                            </table>
                        </div>
                        <hr>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <h3>
                        <br><br>Customize Package Bookings
                             </h3>
                             
                            <table>
                               <tr>
                                <th>Booking Id</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Start Date</th>
                                <th>Last Date</th>
                                </tr>
                                
                            <?php
                            $query = "SELECT customer_customize_package_id, customize_package_source_name, customize_package_destination_name, on_date, off_date FROM customer_customize_package WHERE user_id = $user_id";
                            $result = mysqli_query($connection,$query);
//                            $row = mysqli_fetch_assoc($result);
                            $num_of_rows = mysqli_num_rows($result);
                            $count = 0;
                            while($num_of_rows != $count){
                                $count += 1;
                                $row = mysqli_fetch_assoc($result);

                            ?>
                            
                                <tr>
                                    <td><?php echo $row['customer_customize_package_id'] ?></td>
                                    <td><?php echo $row['customize_package_source_name'] ?></td>
                                    <td><?php echo $row['customize_package_destination_name'] ?></td>
                                    <td><?php echo $row['on_date']?></td>
                                    <td><?php echo $row['off_date']?></td>
                                </tr>
                            
                            <?php
                            }
                            ?>
                            </table>
                        </div>
                        <hr>
                        
                        
                        
                        
                        
                        
                        <div>
                            <h3>   Flight Bookings</h3>        
                            <table>
                                <tr>
                                    <th>Flight Number</th>
                                    <th>Flight Name</th>
                                    <th>Flight Date</th>
                                    <th>Flight Price</th>
                                </tr>
                                <?php
                                $query = "SELECT f.flight_id,f.flight_no,f.company_name,fb.flight_date,fb.flight_price,fb.flight_booking_id FROM flight f,flight_book fb WHERE fb.flight_id = f.flight_id AND fb.user_id = $user_id";
                                 $result = mysqli_query($connection,$query);
//                            $row = mysqli_fetch_assoc($result);
                                $num_of_rows = mysqli_num_rows($result);
                                $count = 0;
                                while($num_of_rows != $count){
                                $count += 1;
                                $row = mysqli_fetch_assoc($result);

                                ?>
                                <tr>
                                    <td><?php echo $row['flight_no'] ?></td>
                                    <td><?php echo $row['company_name'] ?></td>
                                    <td><?php echo $row['flight_date'] ?></td>
                                    <td><?php echo $row['flight_price'] ?></td>
                                </tr>
                                  <?php
                            }
                            ?>
                            </table>
                        </div>
<!--                        <a href="">Contact Us</a>-->
                    </div>
                    
                    
                    <?php
                    $user_id = $_SESSION["user_id"];
                    echo "<div><a style=\"text-decoration:none; color:#41464B;
                    border:solid 1px #41464B; margin-top:100px;
                        padding:10px;\" href=\"unset.php?user_id={$user_id}\">Logout</a></div>";
                        
                        ?>
                </div>
                
<!--            </div>-->
        
        
        
        
        
        
        
        
        <?php
    }else{
            ?>
            
            <div class="account" style="display:none;">
                <form action="admin_3.php">
                   
                   <button style="background:transparent; color:#41464B;
                   padding:8px; margin-left:300px; margin-top:40px; cursor:pointer" type="submit">Go to Admin page</button>
                   <a href="view_feedback.php" style="text-decoration:none; color:41464B; border:solid 1px #41464B; padding:8px; margin-left:100px;">View Feedbacks</a>
                  <a href="unset.php" style="text-decoration:none; color:41464B; border:solid 1px #41464B; padding:8px; margin-left:100px;">Logout</a>    
                    
                </form>
                </div>
                
                
            <?php    
        }
        
    }
        ?>
    
    
    <div class="login" style="display:none;">
        <div>
    <div class="container">
       <form action="login.php" method="POST">
        <div class="login-info">
           <label for="">Email</label>
           <input type="email" name="user_email" placeholder="enter email">
           <label for="">Password</label>
           <input type="password" name="user_password" placeholder="enter password">
           <button type="submit" name="login_btn">Login</button>
           
        </div>
        </form>
    </div>
</div>
    </div>
    
    
    
    <div class="signup" style="display:none">
        <div class="container">
           <form action="register.php" method="POST" id="add_customer_form">
<!--
           <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
-->
            <div class="signup-info">
               
               <div class="signup-row-1">
<!--                   <div class="form-group">-->
                    <label for="">Name</label><input type="text" name="user_name" id="user_name" placeholder="enter name">
                    <label for="" style="margin-left:10px; font-size:15px; color:red; display:none;" class="error">Name required</label>
<!--                   </div>-->
                   
<!--                   <div class="form-group">-->
                    <label for="">Email</label><input type="email" name="user_email" id="user_email" placeholder="enter email">
                    <label for="" style="margin-left:10px; font-size:15px; color:red; display:none;" class="error">email required</label>
<!--                   </div>-->
                   
<!--                   <div class="form-group">-->
                    <label for="">Password</label><input type="password" name="user_password" id="user_password" placeholder="enter password">
                    <label for="" style="margin-left:10px; font-size:15px; color:red; display:none;" class="error">password required</label>
<!--                   </div>-->
                    
                </div>
                
                <div class="signup-row-2">
                   
<!--                   <div class="form-group">-->
<!--                   <div>-->
                    <label for="">Address</label><input type="textarea" name="user_address" id="user_address" placeholder="enter address">
                    <label for="" style="margin-left:10px; font-size:15px; color:red; display:none;" class="error">address required</label>
<!--                    </div>-->
<!--                    </div>-->
                    
<!--                    <div class="form-group">-->
                    <label for="">Contact</label><input type="text" name="user_contact" id="user_contact" placeholder="enter contact" maxlength="10">
                    <label for="" style="margin-left:10px; font-size:15px; color:red; display:none;" class="error">contact required</label>
<!--                    </div>-->
                    
<!--                    <div class="form-group">-->
                    <label for="">Aadhar No</label><input type="text" name="user_aadhar" id="user_aadhar" placeholder="enter aadhar no" maxlength="10">
                    <label for="" style="margin-left:10px; font-size:15px; color:red; display:none;" class="error">aadhar no required</label>
<!--                    </div>-->
                    
                </div>
                <button type="submit" style="" name="register_btn" id="register_btn" >Register</button> 
            </div>
            </form>
            
            
        </div>
    </div>
    

    
    