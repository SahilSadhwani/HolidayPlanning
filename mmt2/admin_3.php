<html>
<?php
include_once("includes/constants.php");  
?>

    <head>
        <title>Your Package</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/stylesheet.css">
        <link rel="stylesheet" href="vendors/Themeable-jQuery-Tabs-Plugin-CardTabs/css/jquery.cardtabs.css">
        <link rel="stylesheet" href="vendors/Themeable-jQuery-Tabs-Plugin-CardTabs/docs/demo.css">

        <link href="vendors/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
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
        <!--end of header-->


        <?php
    include_once("nav_bar_things.php");
    ?>



            <section id="admin-section">
                <div class="admin-rights">
                    <div class="admin-rights-container">

                        <div class='example'>
                            <div class='tabsholder1'>
                                <div data-tab="View Bookings" class="view-bookings">

                                    <div class="container">
                                        <div>
                                            <ul>
                                                <li class="packages-header" style="border-top:solid 5px red; font-size:25px; color:#222;">Packages</li>
                                                <li class="hotels-header">Customize </li>
                                                <li class="flights-header">Flights</li>
                                            </ul>
                                        </div>

                                        <div class="display-table">
                                            <div class="view-booked-packages" style="display:none;">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <th>Package Booking Id</th>
                                                            <th>Customer Name</th>
                                                            <th>Email</th>
                                                            <th>Address</th>
                                                            <th>Contact</th>
                                                            <th>Paackage Name</th>
                                                            <th>Number of Days</th>
                                                        </tr>
                                                        <?php
                            require_once("includes/db.php");
                            global $connection;
                            $query = "select c.package_booking_id,c.package_id,c.customer_id,p.package_id,p.package_destination,p.package_no_of_days,cu.user_name,cu.user_email,cu.user_address,cu.user_contact from customer_package_booking c,static_packages p,customer cu where c.package_id = p.package_id and c.customer_id = cu.user_id ";
                            $result_set = mysqli_query($connection,$query);
                            $number_of_rows = mysqli_num_rows($result_set);
                            
                            $count=0;
                            //echo $number_of_rows;
                            
                            while($number_of_rows != $count){
                                $count += 1;
                                $row = mysqli_fetch_assoc($result_set);
                                $package_id = $row['package_id'];
                                $user_name = $row['user_name'];
                                $user_email = $row['user_email'];
                                $user_address = $row['user_address'];
                                $user_contact = $row['user_contact'];
                                
                             ?>

                                                            <tr>
                                                                <td>
                                                                    <?php echo $row['package_booking_id'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['user_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['user_email'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['user_address'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['user_contact'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['package_destination'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['package_no_of_days'] ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                            }
                            ?>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--view-booked-packages-->




                                            <div class="view-booked-hotels" style="display:none;">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <th>Package Id</th>
                                                            <th>Customer Name</th>
                                                            <th>Email</th>
                                                            <th>Source</th>
                                                            <th>Destination</th>
                                                            <th>Departure Flight</th>
                                                            <th>Hotel</th>
                                                            <th>Start date</th>
                                                            <th>End date</th>
                                                        </tr>
                                                        <?php
                            require_once("includes/db.php");
                            global $connection;
                            $query = "SELECT c.customer_customize_package_id,c.user_id,c.customize_package_source_name,c.customize_package_destination_name,c.flight_id_departure,c.flight_id_arrival,c.hotel_id,c.on_date,c.off_date,u.user_name,u.user_email,f.flight_no,h.hotel_name FROM customer_customize_package c, customer u, flight f, hotel h WHERE c.user_id = u.user_id AND c.flight_id_departure = f.flight_id AND c.hotel_id = h.hotel_id";
                            $result_set = mysqli_query($connection,$query);
                            $number_of_rows = mysqli_num_rows($result_set);
                            
                            $count=0;
                            //echo $number_of_rows;
                            
                            while($number_of_rows != $count){
                                $count += 1;
                                $row = mysqli_fetch_assoc($result_set);
                                $package_id = $row['customer_customize_package_id'];
                                $user_name = $row['user_name'];
                                $user_email = $row['user_email'];
                                $source = $row["customize_package_source_name"];
                                $destination = $row["customize_package_destination_name"];
                                $dept_flight = $row["flight_no"];
                                $hotel_name = $row["hotel_name"];
                                $on_date = $row["on_date"];
                                $off_date = $row["off_date"];
                             ?>

                                                            <tr>
                                                                <td>
                                                                    <?php echo $row['customer_customize_package_id'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['user_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['user_email'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['customize_package_source_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['customize_package_destination_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['flight_no'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['hotel_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['on_date'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['off_date'] ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                            }
                            ?>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--view-booked-hotels-->




                                            <div class="view-booked-flights" style="display:none;">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <th>Flight No</th>
                                                            <th>Source</th>
                                                            <th>Destination</th>
                                                            <th>Flight Booking Id</th>
                                                            <th>Customer Name</th>
                                                            <th>Contact</th>
                                                            <th>Flight Date</th>
                                                            <th>Total persons</th>
                                                            <th>Total Price</th>
                                                        </tr>



                                                        <?php
                            $query = "SELECT f.flight_id,f.flight_no, f.company_name, s.flight_source, s.flight_destination, s.flight_departure_date, b.user_id, c.user_name, c.user_contact, b.flight_booking_id,b.total_price, b.total_no_of_travellers FROM flight f, customer c, flight_scheduling s, flight_book b WHERE f.flight_id = s.flight_id AND f.flight_id = b.flight_id AND b.user_id = c.user_id";
                            
                            $result = mysqli_query($connection,$query);
//                            echo $result;
                            
                            $number_of_rows = mysqli_num_rows($result);
//                            echo $number_of_rows;
                            $count=0;
                            //echo $number_of_rows;
                            
                            while($number_of_rows != $count){
                                $count += 1;
                                $row = mysqli_fetch_assoc($result);
                                $flight_id = $row['flight_id'];
                                $source = $row['flight_source'];
                                $destination = $row['flight_destination'];
                                $flight_booking_id = $row["flight_booking_id"];
                                $user_name = $row['user_name'];
                                $user_contact = $row['user_contact'];
                                $flight_date = $row["flight_departure_date"];
                                $total_no_of_travellers = $row["total_no_of_travellers"];
                                $price = $row["total_price"];
                                
                                
                             ?>

                                                            <tr>
                                                                <td>
                                                                    <?php echo $row['flight_id'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['flight_source'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['flight_destination'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['flight_booking_id'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['user_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['user_contact'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['flight_departure_date'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['total_no_of_travellers'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['total_price'] ?>
                                                                </td>

                                                            </tr>
                                                            <?php
                            }
                            ?>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--view-booked-flights-->


                                        </div>
                                        <!--display-table-->
                                    </div>

                                </div>
                                <div data-tab="View Flights">
                                    <div class="container">
                                        <div class="display-table">
                                            <div class="view-flights" style="display:block;">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <?php
                            $query = "SELECT flight.flight_id,flight_scheduling.flight_id, flight.flight_no,flight.company_name,static_packages.package_source,static_packages.package_destination,flight_scheduling.arrival_time,flight_scheduling.departure_time,flight_scheduling.flight_departure_date,flight_scheduling.flight_arrival_date FROM flight,static_packages,flight_scheduling WHERE flight.flight_id = flight_scheduling.flight_id AND static_packages.flight_id = flight_scheduling.flight_id";
                            $result_set = mysqli_query($connection,$query);
                            $num_of_rows = mysqli_num_rows($result_set);
                            echo "<br>";
//                            $count = 0;
//                            while($num_of_rows != $count){
//                                $count += 1;
//                                $row = mysqli_fetch_assoc($result_set);
//                            }
                               ?>
                                                                <th>Flight No</th>
                                                                <th>Company</th>
                                                                <th>Source</th>
                                                                <th>Destination</th>
                                                                <th>Departure Time</th>
                                                                <th>Arrival Time</th>
                                                                <th>Departure Date</th>
                                                                <th>Arrival Date</th>
                                                        </tr>
                                                        <tr>
                                                            <?php
                               $count = 0;
                                while($num_of_rows != $count){
                                $count += 1;
                                $row = mysqli_fetch_assoc($result_set);
                            
                                ?>
                                                                <td>
                                                                    <?php echo $row['flight_no'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['company_name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['package_source'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['package_destination'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['departure_time'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['arrival_time'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['flight_departure_date'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['flight_arrival_date'] ?>
                                                                </td>
                                                        </tr>
                                                        <?php
                                }
                                ?>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--view-booked-packages-->
                                        </div>
                                        <!--display table-->
                                    </div>

                                </div>
                                <div data-tab="View Packages">
                                    <div class="container">
                                        <div class="display-table">
                                            <div class="view-hotels" style="display:block;">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <?php
                            $query = "SELECT * FROM static_packages";
                            $result_set = mysqli_query($connection,$query);
                            $num_of_rows = mysqli_num_rows($result_set);
                            echo "<br>";
//                            $count = 0;
//                            while($num_of_rows != $count){
//                                $count += 1;
//                                $row = mysqli_fetch_assoc($result_set);
//                            }
                               ?>
                                                                <th>Pacakge Id</th>
                                                                <th>Package Name</th>
                                                                <th>No of days</th>
                                                                <th>Price</th>
                                                                <th>Date</th>
                                                        </tr>
                                                        <tr>
                                                            <?php
                               $count = 0;
                                while($num_of_rows != $count){
                                $count += 1;
                                $row = mysqli_fetch_assoc($result_set);
                            
                                ?>
                                                                <td>
                                                                    <?php echo $row['package_id']?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['package_destination']?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['package_no_of_days'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['package_price'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['date'] ?>
                                                                </td>

                                                        </tr>
                                                        <?php
                                    }
                            ?>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--view-booked-packages-->
                                        </div>
                                        <!--display table-->
                                    </div>
                                </div>
                                <div data-tab="Packages" class="work-on-packages">
                                    <div class="container">
                                        <div>
                                            <ul>
                                                <li class="packages-header">Add</li>
                                                <li class="hotels-header">Edit</li>
                                                <li class="flights-header">Delete</li>
                                            </ul>
                                        </div>

                                        <div class="display-table">

                                            <div class="view-booked-packages" style="display:none;">
                                                <div style="margin-left:20px;`margin-top:10px; font-size:20px;" class="container">
                                                    <form action="" method="GET">

                                                        <div style="margin-bottom:20px;"><label for="">Destination</label>
                                                            <input type="text" name="add_destination"></div>

                                                        <!--
                                <div style="margin-bottom:20px;">
                                   <label for="">Destination</label>
                                    <select name="add_destination" id="add_destination">
                                        <option value="0"></option>
                                        <?php
//                                        $query = "SELECT package_id,package_destination FROM static_packages";
//                                        $result = mysqli_query($connection,$query);
//                                        
//                                        while($row = mysqli_fetch_assoc($result)){
//                                    $package_id = $row['package_id'];
//                                    $package_destination = $row['package_destination'];
//                                    echo "<option value='$package_id'>$package_destination</option>";
//                                }
//                           
                                        ?>
                                    </select>
                                </div>   
-->




                                                        <!--
                                <div style="margin-bottom:20px;"><label for="">Flight Number</label>
                                <input type="text" name="add_flight"></div>
-->


                                                        <div style="margin-bottom:20px;">
                                                            <label for="">Enter Airport</label>
                                                            <select name="add_flight" id="add_flight">
                                        <option value="0"></option>
                                        <?php
                                        $query = "SELECT airport_id,airport_name FROM airport";
                                        $result = mysqli_query($connection,$query);
                                        
                                        while($row = mysqli_fetch_assoc($result)){
                                    $airport_id = $row['airport_id'];
                                    $airport_name = $row['airport_name'];
                                    echo "<option value='$airport_id'>$airport_name</option>";
                                }
                           
                                        ?>
                                    </select>
                                                        </div>




                                                        <div style="margin-bottom:30px;"><label for="">Enter city of which you want to add hotel</label>
                                                            <select style="width:150px; height:60px;" name="add_hotel_of_city" id="add_hotel_of_city">
                                        <option value=""></option>
                                        <?php
                                        $query = "SELECT * FROM hotel";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($result)){
                                            $hotel_id = $row["hotel_id"];
                                            $hotel_city = $row["hotel_city"];
                                            
                                            echo "<option value=\"$hotel_city\">$hotel_city</option>";
                                        }
                                        
                                        ?>
                                    </select></div>



                                                        <label for="">Enter number of hotels</label>
                                                        <input type="number" min="1" max="8" name="no_of_hotels" style="width:50px;">

                                                        <label style="margin-left:30px;" for="">Enter number of days</label>
                                                        <input type="number" min="1" max="13" style="width:50px;" name="no_of_days">

                                                        <button type="submit" name="proceed" style="border:none; background:red; color:#fff; padding:7px; margin-left: 20px;">Proceed</button>




                                                    </form>

                                                    <hr style="margin-top:40px;">

                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <?php
                                if(isset($_GET["proceed"])){
                                    $no_hotels = $_GET["no_of_hotels"];
                                    
                                    $no_days = $_GET["no_of_days"];
                                    ?>







                                                            <div style="margin-bottom:20px;">
                                                                <label for="">Select Flight</label>
                                                                <select name="add_flight_no" id="add_flight_no">
                                        <option value="0"></option>
                                        <?php
                                        $add_flight = $_GET["add_flight"];
                                    $query = "select f.flight_id, f.flight_no, a.airport_id FROM flight f, flight_scheduling a WHERE a.airport_id = $add_flight and a.flight_id = f.flight_id";
                                    $result = mysqli_query($connection, $query);
                                        
                                        while($row = mysqli_fetch_assoc($result)){
                                    $flight_id = $row['flight_id'];
                                    $flight_no = $row['flight_no'];
                                    echo "<option value='$flight_id'>$flight_no</option>";
                                }
                           
                                        ?>
                                    </select>
                                                            </div>










                                                            <?php
//                                    $destination = $_GET["add_destination"];
//                                    $query = "SELECT package_destination FROM static_packages WHERE package_id = $destination";
//                                    $result = mysqli_query($connection,$query);
//                                    while($row = mysqli_fetch_assoc($result)){
//                                        $package_destination = $row['package_destination'];
//                                    }
                                    
                                    
                                    
//                                    echo $package_destination;
                                    
                                    $hotel_city = $_GET["add_hotel_of_city"];
                                    
//                                    $hotel_city_count = 1;
//                                    $array = array();
//                                    foreach($hotel_city as $hotel){
//                                        array_push($array,$hotel);
////                                        $hotel_city
////                
//                            }
//                                    
//                                    echo "tp";
//                                    print_r($array);
//                                    $c = count($array);
//                                    echo $c;
                                    $count_hotel = 0;
                                    $name_count_hotel = 1;
                                    while($count_hotel!=$no_hotels){
                                        
//                                        echo "<div style=\"margin-top:50px;\"><label style=\"margin-left:30px; margin-right:50px;\" for=\"\">Hotel $name_count_hotel</label>
//                                        <input type=\"text\" style=\"width:130px; \" name=\"hotel_$name_count_hotel\"></div>";
                                        
//                                        echo "sahil";
                                        
                                        echo "<div style=\"margin-bottom:20px;\">
                                   <label for=\"\">Hotel $name_count_hotel</label>
                                    <select name=\"hotel_$name_count_hotel\" id=\"hotel_$name_count_hotel\" style=width:\"100px;\"><option></option>";
                                        
//                                        echo "hello";
//                                        echo "s";
                                        $query = "SELECT * FROM hotel WHERE hotel_city = '$hotel_city'";
//                                        echo $query;
//                                        echo "after query";
                                            
                                            
//                                        $city_c=0;
//                                        while($city_c!=$c){
////                                        $query = "SELECT * FROM hotel WHERE hotel_city IN (".implode(',',$array).")";
//                                            
//                                            $query = "SELECT * FROM hotel WHERE hotel_city = $array[$city_c]";
//                                        
//                                        echo "sssssssssss";
//                                        echo $query;
//                                        echo "s";
                                        $result = mysqli_query($connection,$query);
//                                        $city_c++;
//                                        }

                                        while($row = mysqli_fetch_assoc($result)){
                                    $hotel_id = $row['hotel_id'];
                                    $hotel_name = $row['hotel_name'];
//                                        echo $hotel_name;
                                    echo "<option value='$hotel_id'>$hotel_name</option>";
                                        }
                                        echo "</select></div>";
//                            echo "ok";
                                        
                                    
                                
                                    
                                        
                                        $name_count_hotel++;
                                        $count_hotel++;
                                    }
//                                  
                                    $count_day = 0;
                                    $name_count_day = 1;
                                    while($count_day!=$no_days){
                                        
                                        echo "<div style=\"margin-top:50px;><label style=\"margin-left:30px;\" for=\"\">Day $name_count_day</label>
                                        <textarea name=\"day_$name_count_day\" cols=\"30\" rows=\"5\"></textarea></div>";
                                        
                                        $name_count_day++;
                                        $count_day++;
                                    }
                                 ?>

                                                                <div style="margin-top:30px;">
                                                                    <label for="">Insert Images</label>
                                                                    <input type="file" accept="image/*" name="img_1">
                                                                </div>


                                                                <div style="margin-top:30px;">
                                                                    <label for="">Insert Images</label>
                                                                    <input type="file" accept="image/*" name="img_2">
                                                                </div>


                                                                <div style="margin-top:30px;">
                                                                    <label for="">Insert Images</label>
                                                                    <input type="file" accept="image/*" name="img_3">
                                                                </div>
                                                                <!--
                                    echo "<div style=\"margin-top:30px;\"><label>Insert Images</label>
                                          <input type=\"file\" accept=\"image/*\" name=\"img[]\" multiple=\"multiple\">";
                                    
                                    echo "<div style=\"margin-top:30px;\"><label>Insert Images</label>
                                          <input type=\"file\" accept=\"image/*\" name=\"img[]\" multiple=\"multiple\">";
                                    
                                    echo "<div style=\"margin-top:30px;\"><label>Insert Images</label>
                                          <input type=\"file\" accept=\"image/*\" name=\"img[]\" multiple=\"multiple\">";
                                    
-->




                                                                <div style="margin-top:40px;"><label for="">Package Price Per Person</label>
                                                                    <input type="text" name="price"></div>


                                                                <div style="margin-top:40px;"><label style="margin-bottom:0px;" for="">Date</label><input type="date" name="date_of_package"></div>


                                                                <button type="submit" style="margin-top:30px; padding:7px; margin-left:300px; border:none; background:red; color:#fff; padding:7px;" name="save_package">Save</button>

                                                                <?php
//                                   echo "<div style=\"margin-top:40px;\"><label for=\"\">Package Price per person</label>
//                                   <input type=\"text\" name=\"price\"></div>
//                                   
//                                   
//                                   
//                                <button style=\"margin-top:30px; padding:7px; margin-left:300px;\" type=\"submit\" name=\"save_package\">Save</button>
//                                   
//                                   </form>";    
                                    
                                
                                }
                                ?>

                                                    </form>






                                                    <?php
                            
                        if(isset($_POST["save_package"])){
//                            $add_destination = $_POST["add_destination"];
//                            $add_flight = $_POST["add_flight"];
//                            
//                            echo $add_destination;
//                            echo $add_flight;
                            
                            $no_of_package_days = $_GET["no_of_days"];
                            
                            $no_hotels = $_GET["no_of_hotels"];
                            $count = 1;

                            
                           if(isset($_POST["hotel_1"])){
//                               echo "as";
                                $hotel_1 = $_POST["hotel_1"];
                                }else{
                                    $hotel_1 = 0;
                                } 
//                            echo $hotel_1; 
                            
                            
                            if(isset($_POST["hotel_2"])){
                                
                                $hotel_2 = $_POST["hotel_2"];
                                }else{
                                    $hotel_2 = 0;
                                }
//                            echo $hotel_2;
                                
                                if(isset($_POST["hotel_3"])){
                                $hotel_3 = $_POST["hotel_3"];
                                }else{
                                    $hotel_3 = 0;
                                }
                                
                                if(isset($_POST["hotel_4"])){
                                $hotel_4 = $_POST["hotel_4"];
                                }else{
                                    $hotel_4 = 0;
                                }
                                
                                if(isset($_POST["hotel_5"])){
                                $hotel_5 = $_POST["hotel_5"];
                                }else{
                                    $hotel_5 = 0;
                                }
                                
                                if(isset($_POST["hotel_6"])){
                                $hotel_6 = $_POST["hotel_6"];
                                }else{
                                    $hotel_6 = 0;
                                }
                                
                                if(isset($_POST["hotel_7"])){
                                $hotel_7 = $_POST["hotel_7"];
                                }else{
                                    $hotel_7 = 0;
                                }
                                
                                if(isset($_POST["hotel_8"])){
                                $hotel_8 = $_POST["hotel_8"];
                                }else{
                                    $hotel_8 = 0;
                                }
                                
//                                echo "hey";
                            
                            
                            
                            
                            
                            
                                if(isset($_POST["day_1"])){
                                    $day_1 = $_POST["day_1"];
                                }else{
                                    $day_1 = null;
                                }
//                                echo $day_1;
                                
                                if(isset($_POST["day_2"])){
                                    $day_2 = $_POST["day_2"];
                                }else{
                                    $day_2 = null;
                                }
                                
                                if(isset($_POST["day_3"])){
                                    $day_3 = $_POST["day_3"];
                                }else{
                                    $day_3 = null;
                                }
                                
                                if(isset($_POST["day_4"])){
                                    $day_4 = $_POST["day_4"];
                                }else{
                                    $day_4 = null;
                                }
                                
                                if(isset($_POST["day_5"])){
                                    $day_5 = $_POST["day_5"];
                                }else{
                                    $day_5 = null;
                                }
                                
                               
                                
                                if(isset($_POST["day_6"])){
                                    $day_6 = $_POST["day_6"];
                                }else{
                                    $day_6 = null;
                                }
                                
                                if(isset($_POST["day_7"])){
                                    $day_7 = $_POST["day_7"];
                                }else{
                                    $day_7 = null;
                                }
                                
                                if(isset($_POST["day_8"])){
                                    $day_8 = $_POST["day_8"];
                                }else{
                                    $day_8 = null;
                                }
                                
                                if(isset($_POST["day_9"])){
                                    $day_9 = $_POST["day_9"];
                                }else{
                                    $day_9 = null;
                                }
                                
                                if(isset($_POST["day_10"])){
                                    $day_10 = $_POST["day_10"];
                                }else{
                                    $day_10 = null;
                                }
                                
                                
                                if(isset($_POST["day_11"])){
                                    $day_11 = $_POST["day_11"];
                                }else{
                                    $day_11 = null;
                                }
                                
                                if(isset($_POST["day_12"])){
                                    $day_12 = $_POST["day_12"];
                                }else{
                                    $day_12 = null;
                                }
                                
                                if(isset($_POST["day_13"])){
                                    $day_13 = $_POST["day_13"];
                                }else{
                                    $day_13 = null;
                                }
                                
                            
                            $flight_id_of_flight = $_POST["add_flight_no"];
                            
//                            echo "ok";
                            
                            $price = $_POST["price"];
                            
                            $date_of_package = $_POST["date_of_package"];
                            
                            $destination_to_be_added = $_GET["add_destination"];
//                            if($hotel_1!=null){
////                                $query = "SELECT * FROM hotel WHERE hotel_id = '$hotel_1'";
////                                $result = mysqli_query($connection,$query);
////                                echo $query;
//////                                echo $result;
////                                $row = mysqli_fetch_assoc($result);
//                                
////                                $ans1 = $row['hotel_id'];
////                                echo $ans1;
////                                echo "ss";
//                                
//                            }
//                            
//                            
//                            if($hotel_2!=null){
////                                $query = "SELECT * FROM hotel WHERE hotel_name = '$hotel_2'";
////                                $result = mysqli_query($connection,$query);
////                                echo $query;
//////                                echo $result;
////                                $row = mysqli_fetch_assoc($result);
//                                
//                                $ans2 = $row['hotel_id'];
//                             
//                            }
//                            
//                            
//                            
//                            if($hotel_3!=null){
//                                $query = "SELECT * FROM hotel WHERE hotel_name = '$hotel_3'";
//                                $result = mysqli_query($connection,$query);
//                                echo $query;
////                                echo $result;
//                                $row = mysqli_fetch_assoc($result);
//                                
//                                $ans3 = $row['hotel_id'];
//                             
//                            }
//                            
//                            
//                            if($hotel_4!=null){
//                                $query = "SELECT * FROM hotel WHERE hotel_name = '$hotel_4'";
//                                $result = mysqli_query($connection,$query);
//                                echo $query;
////                                echo $result;
//                                $row = mysqli_fetch_assoc($result);
//                                
//                                $ans4 = $row['hotel_id'];
//                             
//                            }
//                            
//                            if($hotel_5!=null){
//                                $query = "SELECT * FROM hotel WHERE hotel_name = '$hotel_5'";
//                                $result = mysqli_query($connection,$query);
//                                echo $query;
////                                echo $result;
//                                $row = mysqli_fetch_assoc($result);
//                                
//                                $ans5 = $row['hotel_id'];
//                             
//                            }
//                            
//                            if($hotel_6!=null){
//                                $query = "SELECT * FROM hotel WHERE hotel_name = '$hotel_6'";
//                                $result = mysqli_query($connection,$query);
//                                echo $query;
////                                echo $result;
//                                $row = mysqli_fetch_assoc($result);
//                                
//                                $ans6 = $row['hotel_id'];
//                             
//                            }
//                            
//                            if($hotel_7!=null){
//                                $query = "SELECT * FROM hotel WHERE hotel_name = '$hotel_7'";
//                                $result = mysqli_query($connection,$query);
//                                echo $query;
////                                echo $result;
//                                $row = mysqli_fetch_assoc($result);
//                                
//                                $ans7 = $row['hotel_id'];
//                             
//                            }
//                            
//                            if($hotel_8!=null){
//                                $query = "SELECT * FROM hotel WHERE hotel_name = '$hotel_8'";
//                                $result = mysqli_query($connection,$query);
//                                echo $query;
////                                echo $result;
//                                $row = mysqli_fetch_assoc($result);
//                                
//                                $ans8 = $row['hotel_id'];
//                             
//                            }
                            
                            
                            
                            
                            
                            
                            
                            
                        
//                                $file1name = $_FILES['img_1']['name'];    
//                                $tmp1name = $_FILES['img_1']['tmp_name'];
//                                $filetype = $_FILES['img_1']['type'];
//                                $filepath = "/img/static_packages/";
//                                if(move_uploaded_file($file1name,$filepath."$file1name")){
//                                    echo"r";
//                                }
                            
                            $uploaddir = 'img/static_packages/';
                            $uploadfile = $uploaddir . basename($_FILES['img_1']['name']);
                            $file1name = $_FILES['img_1']['name'];
                        
                            if (move_uploaded_file($_FILES['img_1']['tmp_name'], $uploadfile)) {
//                                echo "File is valid, and was successfully uploaded.\n";
//                                echo $file1name;
                            } else {
//                               echo "Upload failed";
                            }
                            
                            
                            
                            
                            
                            
                            
                            $uploaddir = 'img/static_packages/';
                            $uploadfile = $uploaddir . basename($_FILES['img_2']['name']);
                            $file2name = $_FILES['img_2']['name'];
                        
                            if (move_uploaded_file($_FILES['img_2']['tmp_name'], $uploadfile)) {
//                                echo "File is valid, and was successfully uploaded.\n";
//                                echo $file1name;
                            } else {
//                               echo "Upload failed";
                            }
                            
                            
                            
                            
                            
                            
                            $uploaddir = 'img/static_packages/';
                            $uploadfile = $uploaddir . basename($_FILES['img_3']['name']);
                            $file3name = $_FILES['img_3']['name'];
                        
                            if (move_uploaded_file($_FILES['img_3']['tmp_name'], $uploadfile)) {
//                                echo "File is valid, and was successfully uploaded.\n";
//                                echo $file1name;
                            } else {
//                               echo "Upload failed";
                            }
                            
                            
                                    
//                                if(isset($_FILES['img_2'])){
//                                $file2name = $_FILES['img_2']['name'];   
//                                $tmp2name = $_FILES['img_2']['tmp_name'];
//                                $filetype = $_FILES['img_2']['type'];
//                                if(move_uploaded_file($file2name,"C:/xampp/htdocs/mmt2/img/static-packages/"));
//                                    echo"uploded2";
//                                }       
                                
//                                if(isset($_FILES['img_3'])){
//                                $file3name = $_FILES['img_3']['name'];  
//                                $tmp3name = $_FILES['img_3']['tmp_name'];
//                                $filetype = $_FILES['img_3']['type'];
//                                if(move_uploaded_file($file3name,"C:/xampp/htdocs/mmt2/img/static-packages"));
//                                    echo"uploded3";
//                                }
                                    
                                
                                
//
//                                for($i=0; $i<=count($tmp1name)-1;$i++){
//                                    $name = addslashes(($filename[$i]));
//                                    $tmp1 = addslashes((file_get_contents($tmp1name[$i])));
//
//                                    $tmp2 = addslashes((file_get_contents($tmp2name[$i])));
//
//                                    $tmp3 = addslashes((file_get_contents($tmp3name[$i])));
//
//                                    
//                                }
//                            
                            
                            
                            
//                            $query = "INSERT INTO static_packages(add_image_1,add_image_2,add_image_3) VALUES('$tmp1','$tmp2','$tmp3')";
//                                    $result = mysqli_query($connection, $query);
//                                    echo $id;
                                
                            
                            
                            
                            
                            
                            
                        
                            
                            
                            
                            
                            
                        $query = "INSERT INTO static_packages(package_destination,package_no_of_days,flight_id,hotel_id_1,hotel_id_2,hotel_id_3,hotel_id_4,hotel_id_5,hotel_id_6,hotel_id_7,hotel_id_8,package_price,date,add_image_1,add_image_2,add_image_3) VALUES('$destination_to_be_added',$no_of_package_days,$flight_id_of_flight,$hotel_1,$hotel_2,$hotel_3,$hotel_4,$hotel_5,$hotel_6,$hotel_7,$hotel_8,$price,'$date_of_package','$file1name','$file2name','$file3name')";
                        
                        $result = mysqli_query($connection,$query);
//                        echo $query;
                            
                            
                            
                        $id = mysqli_insert_id($connection);
//                        echo $id;
                        $count_of_days = 1;
                        
                        
                        if($day_1!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,1,'$day_1')";
                            $result = mysqli_query($connection,$query);
//                            echo $query;
//                            if(!$result){
//                                die("");
//                            }
                            
                        }
                            
                        if($day_2!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,2,'$day_2')";
                            $result = mysqli_query($connection,$query);
//                            echo $day_2;
                            
                        }
                            
                        if($day_3!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,3,'$day_3')";
                            $result = mysqli_query($connection,$query);
                            
                        }
                            
                        if($day_4!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,4,'$day_4')";
                            $result = mysqli_query($connection,$query);
                            
                        }
                            
                        if($day_5!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,5,'$day_5')";
                            $result = mysqli_query($connection,$query);
                            
                        }
                            
                        if($day_6!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,6,'$day_6')";
                            $result = mysqli_query($connection,$query);
                            
                        }
                            
                            
                        if($day_7!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,7,'$day_7')";
                            $result = mysqli_query($connection,$query);
                            
                        }
                            
                        if($day_8!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,8,'$day_8')";
                            $result = mysqli_query($connection,$query);
                            
                        }
                            
                        if($day_9!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,9,'$day_9')";
                            $result = mysqli_query($connection,$query);
                            
                        }
                            
                        if($day_10!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,10,'$day_10')";
                            $result = mysqli_query($connection,$query);
                            
                        }
                            
                        if($day_11!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,11,'$day_11')";
                            $result = mysqli_query($connection,$query);
                            
                        }
                            
                        if($day_12!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,12,'$day_12')";
                            $result = mysqli_query($connection,$query);
                            
                        }
                            
                        if($day_13!=null){
                            $query = "INSERT INTO package_day(package_id,package_day,package_description) VALUES($id,13,'$day_13')";
                            $result = mysqli_query($connection,$query);
//                            echo $query;
                        }
                        
                            
                            
                            
                            
                        
                            
                    
                            
                            
                            
                            
                            
            
                                

                                
                                
                            
                            
                            
                            }
                            ?>


                                                </div>
                                            </div>


                                            <!--                    ///////EDIT PACKAGES/////////-->
                                            <!--                    /////////////////////////////-->
                                            <div class="view-booked-hotels" style="display:none;">

                                                <div class="container">
                                                    <form action="" method="GET">

                                                        <!--
                                <div style="margin-bottom:20px;"><label for="">Destination</label>
                               <input type="text" name="add_destination"></div>
                               
-->
                                                        <div style="margin-top:30px;">
                                                            <label for="" style="font-size:22px; margin-top:50px; margin-left:20px; margin-bottom:20px;">Select Package</label>
                                                            <select name="package_id" id="package_id" style="margin-right:100px;">
                                   <option value=""></option>
                                <?php
                                $query = "SELECT package_id,package_destination FROM static_packages";
                                $result = mysqli_query($connection,$query);
                                $num_of_rows = mysqli_num_rows($result);
                                $count = 0;
                                while($num_of_rows != $count){
                                $count += 1;
                                $row = mysqli_fetch_assoc($result);
                                $package_id = $row['package_id'];
                                $package_destination = $row['package_destination'];
                                    
                                    
//                                echo $package_destination;
                                    echo "<option value=\"$package_id\">$package_destination</option>";
                                
                                }
                               ?>
                                
                               </select>
                                                            <button type="submit" name="go" style="color:#fff; background:red; padding:7px; border:none;">Proceed</button>
                                                        </div>
                                                        <!--
                                <a href="admin_4.php?package_id=<?php 
//echo $package_id
?>&edit_changes=<?php
//    echo $package_id 
?>" name="edit_changes">EDIT</a>
                                
-->
                                                    </form>
                                                    <hr style="margin-top:30px;">

                                                    <?php
                                if(isset($_GET['go'])){
//                                    echo "hello";
                                    $package_id = $_GET["package_id"];
//                                     echo "<br>";
//                                    echo $package_id;
                                    
                            ?>

                                                        <?php
                                    $query = "SELECT * FROM static_packages,flight WHERE package_id = $package_id AND flight.flight_id = static_packages.flight_id";
                                    $result_set = mysqli_query($connection,$query);
//                                    
//                                    $query = "SELECT * FROM flight WHERE flight_id = $flight_id";
//                                    $result = mysqli_query($connection,$query);
                                    
//                                    $num_of_rows = mysqli_num_rows($result_set);
                                    $count = 0;
//                                    $package_id = $_GET['package_id'];
                                    
                                    while($row = mysqli_fetch_assoc($result_set)){
                                    $package_id = $row['package_id'];
                                    $package_destination = $row['package_destination'];
                                
                                    
                                    $package_no_of_days = $row['package_no_of_days'];
                                    $flight_no = $row['flight_no'];    
                                    $flight_id = $row['flight_id'];
                                    $hotel_id_1 = $row['hotel_id_1'];
                                    $hotel_id_2 = $row['hotel_id_2'];
                                    $hotel_id_3 = $row['hotel_id_3'];
                                    $hotel_id_4 = $row['hotel_id_4'];
                                    $hotel_id_5 = $row['hotel_id_5'];
                                    $hotel_id_6 = $row['hotel_id_6'];
                                    $hotel_id_7 = $row['hotel_id_7'];
                                    $hotel_id_8 = $row['hotel_id_8'];
                                    $package_price = $row['package_price'];
                                    $date = $row['date'];
//                                    $package_day = $row['package_day'];
//                                    $package_description = $row['package_description'];
//                                    $flight_no = $row['flight_no'];
//                                    $flight_name = $row['company_name'];
//                                        
                                    }
                                    ?>

                                                            <!--
//                                    $query = "SELECT hotel_id_1 FROM static_packages";
//                                    $result = mysqli_query($connection,$query);
//                                    $row = mysqli_fetch_array($result);
//                                    
//                                    $hotel_id_1 = $row['hotel_id_1'];
                                    
-->

                                                            <form method="POST" style="margin-left:20px;" class="edit_package_css">


                                                                <?php
                                    if($hotel_id_1 != 0){
                                        $query = "SELECT hotel_name,hotel_id FROM hotel WHERE hotel_id = $hotel_id_1";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_array($result)){
                                            $hotel_name = $row['hotel_name'];
                                        }
                                        echo "<label>Hotel 1</label><input type=\"text\" name=\"hotel_id_1\" value=\"$hotel_name\" style=\"padding:3px; margin-top:10px; font-size:18px;\"><br>";
                                    }
                                    if($hotel_id_2 != 0){
                                        $query = "SELECT hotel_name,hotel_id FROM hotel WHERE hotel_id = $hotel_id_2";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_array($result)){
                                            $hotel_name = $row['hotel_name'];
                                        }
                                        echo "<label>Hotel 2</label><input type=\"text\" name=\"hotel_id_2\" value=\"$hotel_name\" style=\"padding:3px; margin-top:10px; font-size:18px;\"><br>";
                                    }
                                    if($hotel_id_3 != 0){
                                        $query = "SELECT hotel_name,hotel_id FROM hotel WHERE hotel_id = $hotel_id_3";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_array($result)){
                                            $hotel_name = $row['hotel_name'];
                                        }
                                        echo "<label>Hotel 3</label><input type=\"text\" name=\"hotel_id_3\" value=\"$hotel_name\" style=\"padding:3px; margin-top:10px; font-size:18px;\"><br>";
                                    }
                                    if($hotel_id_4 != 0){
                                        $query = "SELECT hotel_name,hotel_id FROM hotel WHERE hotel_id = $hotel_id_4";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_array($result)){
                                            $hotel_name = $row['hotel_name'];
                                        }
                                        echo "<label>Hotel 4</label><input type=\"text\" name=\"hotel_id_4\" value=\"$hotel_name\" style=\"padding:3px; margin-top:10px; font-size:18px;\"><br>";
                                    }
                                    if($hotel_id_5 != 0){
                                        $query = "SELECT hotel_name,hotel_id FROM hotel WHERE hotel_id = $hotel_id_5";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_array($result)){
                                            $hotel_name = $row['hotel_name'];
                                        }
                                        echo "<label>Hotel 5</label><input type=\"text\" name=\"hotel_id_5\" value=\"$hotel_name\" style=\"padding:3px; margin-top:10px; font-size:18px;\"><br>";
                                    }
                                    if($hotel_id_6 != 0){
                                        $query = "SELECT hotel_name,hotel_id FROM hotel WHERE hotel_id = $hotel_id_6";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_array($result)){
                                            $hotel_name = $row['hotel_name'];
                                        }
                                        echo "<label>Hotel 6</label><input type=\"text\" name=\"hotel_id_6\" value=\"$hotel_name\" style=\"padding:3px; margin-top:10px; font-size:18px;\"><br>";
                                    }
                                    if($hotel_id_7 != 0){
                                        $query = "SELECT hotel_name,hotel_id FROM hotel WHERE hotel_id = $hotel_id_7";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_array($result)){
                                            $hotel_name = $row['hotel_name'];
                                        }
                                        echo "<label>Hotel 7</label><input type=\"text\" name=\"hotel_id_7\" value=\"$hotel_name\" style=\"padding:3px; margin-top:10px; font-size:18px;\"><br>";
                                    }
                                    if($hotel_id_8 != 0){
                                        $query = "SELECT hotel_name,hotel_id FROM hotel WHERE hotel_id = $hotel_id_8";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_array($result)){
                                            $hotel_name = $row['hotel_name'];
                                        }
                                        echo "<label>Hotel 8</label><input type=\"text\" name=\"hotel_id_8\" value=\"$hotel_name\" style=\"padding:3px; margin-top:10px; font-size:18px;\">";
                                    }
                                    
                                        
                            echo  " <label style=\"margin-left:20px;\">Package Price </label><input type=\"text\" name=\"package_price\" value=\"$package_price\" style=\"padding:3px; margin-top:10px; font-size:18px; margin-left:10px;\"/>";
                            echo "<br>";
                                    
                            echo  "<label style=\"margin-left:20px;>Package Date </label><input type=\"text\" name=\"package_date\" value=\"$date\" style=\"padding:3px; margin-top:10px; font-size:18px;\"/>";
                            echo  "<br>";        
                                        
                            echo  "<label>Package Name</label> <input type=\"text\" name=\"package_destination\" value=\"$package_destination\" style=\"padding:3px; margin-top:10px; font-size:18px;\"/>";
                            echo "<br><br>";        
                            echo  "<label>Flight No </label><input type=\"text\" name=\"flight_no\" value=\"$flight_no\" style=\"padding:3px; margin-top:10px; font-size:18px;\"/>";
                            echo "<br><br>";
                                    echo "<button type=\"submit\" name=\"edit_changes\">Edit Changes</button>";
                                    
                                ?>

                                                            </form>

                                                            <?php
                                    
                                    if(isset($_POST['edit_changes'])){
//                                        echo "hello";
                                        
//                                        $query = "UPDATE hotel SET hotel_name = '$hotel_name'";
//                                        $result = mysqli_query($connection,$query);
//                                        $query = "UPDATE static_packages SET package_price = $package_price,package_date= $date,package_name = '$package_destination'";
//                                        $result = mysqli_query($connection,$query);
//                                        $query = "UPDATE flight SET flight_no = '$flight_no'";
//                                        $result = mysqli_query($connection,$query);
//                                        
//                                        echo "Updations Done Successfully";
                                        $package_id = $_GET["package_id"];
//                                        echo $package_id;
                                        
                                        $hotel_id_1 = $_POST["hotel_id_1"];
//                                        echo $hotel_id_1;
                                        if($hotel_id_1!=null){
                                            $query = "SELECT hotel_id FROM hotel WHERE hotel_name = '$hotel_id_1'";
                                            $result = mysqli_query($connection,$query);
                                            
                                            $row = mysqli_fetch_assoc($result);
                                            
                                            $num = mysqli_num_rows($result);
                                            if($num>0 && $num<=1){
                                                $hotel_id_1_id = $row["hotel_id"];
                                            }
                                            else{
                                                $hotel_id_1_id = 0;
                                            }
                                            
                                        }
                                        
                                        $hotel_id_2 = $_POST["hotel_id_2"];
                                        if($hotel_id_2!=null){
                                            $query = "SELECT hotel_id FROM hotel WHERE hotel_name = '$hotel_id_2'";
                                            $result = mysqli_query($connection,$query);
                                            
                                            $row = mysqli_fetch_assoc($result);
                                            
                                            $num = mysqli_num_rows($result);
                                            if($num>0 && $num<=1){
                                                $hotel_id_2_id = $row["hotel_id"];
                                            }
                                            else{
                                                $hotel_id_2_id = 0;
                                            }
                                            
                                        }
                                        
                                        
                                        
                                        $hotel_id_3 = $_POST["hotel_id_3"];
                                        if($hotel_id_3!=null){
                                            $query = "SELECT hotel_id FROM hotel WHERE hotel_name = '$hotel_id_3'";
                                            $result = mysqli_query($connection,$query);
                                            
                                            $row = mysqli_fetch_assoc($result);
                                            
                                            $num = mysqli_num_rows($result);
                                            if($num>0 && $num<=1){
                                                $hotel_id_3_id = $row["hotel_id"];
                                            }
                                            else{
                                                $hotel_id_3_id = 0;
                                            }
                                            
                                        }
                                        
                                        $hotel_id_4 = $_POST["hotel_id_4"];
                                        if($hotel_id_4!=null){
                                            $query = "SELECT hotel_id FROM hotel WHERE hotel_name = '$hotel_id_4'";
                                            $result = mysqli_query($connection,$query);
                                            
                                            $row = mysqli_fetch_assoc($result);
                                            
                                            $num = mysqli_num_rows($result);
                                            if($num>0 && $num<=1){
                                                $hotel_id_4_id = $row["hotel_id"];
                                            }
                                            else{
                                                $hotel_id_4_id = 0;
                                            }
                                            
                                        }
                                        
                                        
                                        $hotel_id_5 = $_POST["hotel_id_5"];
                                        if($hotel_id_5!=null){
                                            $query = "SELECT hotel_id FROM hotel WHERE hotel_name = '$hotel_id_5'";
                                            $result = mysqli_query($connection,$query);
                                            
                                            $row = mysqli_fetch_assoc($result);
                                            
                                            $num = mysqli_num_rows($result);
                                            if($num>0 && $num<=1){
                                                $hotel_id_5_id = $row["hotel_id"];
                                            }
                                            else{
                                                $hotel_id_5_id = 0;
                                            }
                                            
                                        }
                                        
                                        
                                        $hotel_id_6 = $_POST["hotel_id_6"];
                                        if($hotel_id_6!=null){
                                            $query = "SELECT hotel_id FROM hotel WHERE hotel_name = '$hotel_id_6'";
                                            $result = mysqli_query($connection,$query);
                                            
                                            $row = mysqli_fetch_assoc($result);
                                            
                                            $num = mysqli_num_rows($result);
                                            if($num>0 && $num<=1){
                                                $hotel_id_6_id = $row["hotel_id"];
                                            }
                                            else{
                                                $hotel_id_6_id = 0;
                                            }
                                            
                                        }
                                        
                                        
                                        $hotel_id_7 = $_POST["hotel_id_7"];
                                        if($hotel_id_7!=null){
                                            $query = "SELECT hotel_id FROM hotel WHERE hotel_name = '$hotel_id_7'";
                                            $result = mysqli_query($connection,$query);
                                            
                                            $row = mysqli_fetch_assoc($result);
                                            
                                            $num = mysqli_num_rows($result);
                                            if($num>0 && $num<=1){
                                                $hotel_id_7_id = $row["hotel_id"];
                                            }
                                            else{
                                                $hotel_id_7_id = 0;
                                            }
                                            
                                        }
                                        
                                        
                                        
                                        $hotel_id_8 = $_POST["hotel_id_8"];
                                        if($hotel_id_8!=null){
                                            $query = "SELECT hotel_id FROM hotel WHERE hotel_name = '$hotel_id_8'";
                                            $result = mysqli_query($connection,$query);
                                            
                                            $row = mysqli_fetch_assoc($result);
                                            
                                            $num = mysqli_num_rows($result);
                                            if($num>0 && $num<=1){
                                                $hotel_id_8_id = $row["hotel_id"];
//                                                echo $hotel_id_8_id;
                                            }
                                            else{
                                                $hotel_id_8_id = 0;
                                            }
                                            
                                        }
                                        
                                        
                                        
                                        
                                        $package_price = $_POST["package_price"];
//                                        echo $package_price;
                                        $package_date = $_POST["package_date"];
//                                        echo $package_date;
                                        
                                        $package_destination = $_POST["package_destination"];
                                        
                                        $flight_no = $_POST["flight_no"];
                                        
                                        $query = "UPDATE static_packages
                                                  SET hotel_id_1 = $hotel_id_1_id,          
                                                      hotel_id_2 = $hotel_id_2_id,
                                                      hotel_id_3 = $hotel_id_3_id,
                                                      hotel_id_4 = $hotel_id_4_id,
                                                      hotel_id_5 = $hotel_id_5_id,
                                                      hotel_id_6 = $hotel_id_6_id,
                                                      hotel_id_7 = $hotel_id_7_id,
                                                      hotel_id_8 = $hotel_id_8_id,
                                                      package_price = $package_price,
                                                      date = '$package_date',
                                                      package_destination =     '$package_destination' 
                                                    WHERE package_id = $package_id    
                                                  ";
                                        $result = mysqli_query($connection,$query);
                                        
                                        
                                        $query = "SELECT * FROM flight WHERE flight_no = '$flight_no'";
                                        $result = mysqli_query($connection,$query);
                                        
                                        $row = mysqli_fetch_assoc($result);
                                        $num = mysqli_num_rows($result);
                                        
                                        if($num>0 && $num<=1){
                                            $flight_id = $row["flight_id"];
                                            
                                            $query = "UPDATE static_packages 
                                                      SET flight_id = '$flight_id'
                                                       WHERE package_id = $package_id";
                                        }
                                    }
                                    
                            ?>

                                                                <?php    
                                
                                }
                            ?>

                                                </div>
                                            </div>





                                            <!--                    //////////DELETE PACKAGES///////
                   /////////////////////////////////////////-->

                                            <div class="view-booked-flights" style="display:none;">

                                                <form action="" method="POST">
                                                    <div style="margin-bottom:30px; margin-left:20px; font-size:20px;"><label for="">Enter Package You Want To Delete</label>
                                                        <select name="package_id" id="package_id">
                                        <option value=""></option>
                                        <?php
                                        $query = "SELECT * FROM static_packages";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($result)){
                                            $package_id = $row['package_id'];
                                            $package_destination = $row['package_destination'];
                                            
                                            echo "<option value=\"$package_id\">$package_destination</option>";
                                            
                                        }
                                        
                                        ?>
                                    
                                    </select></div>




                                                    <button type="submit" name="delete" style="margin-left:100px; color:#fff; border:none; background:red; padding:7px;">Delete</button>

                                                </form>









                                                <?php
                                if(isset($_POST['delete'])){
                                    $package_id = $_POST['package_id'];
//                                    echo $package_id;
                                    $query = "DELETE FROM static_packages WHERE package_id = $package_id ";
                                    $result_set = mysqli_query($connection,$query);
//                                    echo $query;
                                }
                                    ?>


                                                    <!--                            End of delete package-->






                                            </div>






                                        </div>
                                        <!--display table
                
            
            </div>  
              
            </div><!--packages data tab-->
                                    </div>
                                </div>

                            </div>
                        </div>

            </section>
            <!--end of admin section-->





            <!--
    <?php
//    include_once("includes/about.php");      
    ?>
-->




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
